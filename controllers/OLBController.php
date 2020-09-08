<?php

class OLBController extends Controller
{

    public function index()
    {
        $user = $this->model("User");
        session_start();

        //如果使用者有登入過且SSESSION時效未過期，將使用者自動傳送到交易頁面
        if (isset($_SESSION["uid"])) {
            header("Location:transaction");
        }

        /*
         *使用者按下「登入」按鈕
         */
        if (isset($_POST["btnLogin"])) {
            $user->userName = $_POST["inputUid"];
            $user->userPwd = hash('sha256', "{$_POST["inputPwd"]}");
            if ($user->userName && $user->userPwd) {
                require_once("sql/connDB.php");
                $sql = "select * from tbl_users where user_name = '$user->userName' and password='$user->userPwd'";
                $result = mysqli_query($link, $sql);
                $rows = mysqli_fetch_array($result);
                if ($rows) {
                    $_SESSION["uid"] = $rows["user_name"];
                    $_SESSION["msgStatus"] = 1; //己登入，進入訊息頁面會顯示登入提示。
                    header("Location:status");
                    exit();
                } else {
                    $user->error = true;
                }
            }
            mysqli_close($link);

        }
        $this->view("OLB/index", $user);
    }

    public function register()
    {
        session_start();
        $registerPage = $this->model("register");
        /*
         *使用者按下「註冊」按鈕
         */
        if (isset($_POST["btnRegister"])) {

            //檢查使用者輸入的使用者名稱是否已被註冊。
            require_once "sql/connDB.php";
            $sql = "select user_name from tbl_users;";
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_row($result)){
                $rows[]=$row;
            }
            $rows[] =array("{$_POST["inputUserName"]}");
            $rows1d = array_column($rows,0);
            if (count($rows1d) != count(array_unique($rows1d))) {
                echo "<script> alert('輸入的使用者名稱己被使用！'); </script>";
            }else{

                //新增使用者帳號
                $registerPage ->surname = $_POST["inputSurname"];
                $registerPage ->givenName = $_POST["inputGivenName"];
                $registerPage ->userName = $_POST["inputUserName"];
                $registerPage ->email = $_POST["inputEmail"];
                $registerPage ->gender = $_POST["radioGender"];
                $registerPage ->phone = $_POST["inputPhoneNumber"];
                $registerPage ->password = hash('sha256', $_POST["inputPassword"]);
                $bdate = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
                $sqlSTMT =<<<sqlSTMT
                INSERT INTO `tbl_users` (`surname`, `given_name`, `user_name`, `email`, `password`, `gender`, `phone`, `bdate` )
                VALUES
                ('{$registerPage ->surname}', '{$registerPage ->givenName}', '{$registerPage ->userName}', '{$registerPage ->email}', '{$registerPage ->password}','{$registerPage ->gender}', '{$registerPage ->phone}', '{$bdate}');
                sqlSTMT;
                mysqli_query($link, $sqlSTMT) or die(mysqli_error($link));      

                //亂數產生一個銀行帳戶號碼
                while($AccoSuccess = 1){
                    for ($i = 0; $i < 12; $i++) {
                        $addNumber = strval(rand(0,9)) ;
                        echo "<br/>";
                        $newAccount = $newAccount.$addNumber;
                    }
                    //檢查亂數產生的帳戶號碼是否已被使用。
                    $sql = "select acc_no from tbl_accounts;";
                    $result = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_row($result)){
                    $rows[]=$row;
                    }
                    $rows[] =array("{$newAccount}");
                    $rows1d = array_column($rows,0);
                    if (count($rows1d) != count(array_unique($rows1d))) {

                    }else{
                        break; //沒有重複，跳出迴圈。
                    }
                }
                //新增新註冊使用者的銀行帳戶
                $registerPage ->accNo = $newAccount;
                $registerPage ->balance = 0;
                $registerPage ->accStatus = "ACTIVE";
                $bdate = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
                //取得新註冊使用者的帳號編號
                $sqlSTMT = "select id from tbl_users where user_name = '{$_POST["inputUserName"]}' ;";

                $result = mysqli_query($link, $sqlSTMT) or die(mysqli_error($link));
                $addAcconUid = mysqli_fetch_array($result);
                $sqlSTMT =<<<sqlSTMT
                INSERT INTO `tbl_accounts` ( `user_id`, `acc_no`, `balance`, `status`, `bdate`)
                VALUES
                ({$addAcconUid["id"]}, '{$registerPage ->accNo}', {$registerPage ->balance}, '{$registerPage ->accStatus}', '{$bdate}');
                sqlSTMT;
                mysqli_query($link, $sqlSTMT) or die(mysqli_error($link));
                mysqli_close($link);      

                $_SESSION["msgStatus"] = 5; //註冊成功，進入訊息頁面會顯示註冊完成提示。
                header("Location:status");
                exit();
            }
    

            
        }


        $this->view("OLB/register", $user);

    }

    public function transaction()
    {
        session_start();
        $transactionPage = $this->model("service");
        $user = $this->model("User");
        $user->userName = $_SESSION["uid"];
        require_once "sql/connDB.php";
        $sql = "select balance from tbl_accounts where user_id = (select id from tbl_users where user_name = '$user->userName')";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_array($result);
        $transactionPage->balance = $rows["balance"];
        mysqli_close($link);

        if (!isset($_SESSION["uid"])) //使用者沒有登入的話將會被跳轉至登入首頁。
        {
            header("Location: index");
            exit();
        }

        if (isset($_POST["deposit_service"])) {
            header("Location:deposit");
        }

        if (isset($_POST["withdrawal_service"])) {
            header("Location:withdrawal");
        }

        if (isset($_POST["details_service"])) {
            header("Location:details");
        }

        if (isset($_POST["logout"])) {
            unset($_SESSION['uid']);
            $_SESSION["msgStatus"] = 2; //己登出，進入訊息頁面會顯示登出提示。
            header("Location:status");
            

        }

        $this->view("OLB/transaction", $transactionPage);
    }

    public function deposit()
    {
        $depositPage = $this->model("service");
        session_start();
        require_once "sql/connDB.php";

        $sqlSTMT =<<<sqlSTMT
        select balance, acc_no ,id
        from tbl_accounts 
        where user_id = 
        (select id from tbl_users where user_name = '{$_SESSION["uid"]}');
        sqlSTMT;
        $result = mysqli_query($link, $sqlSTMT);
        $rows = mysqli_fetch_array($result);
        $depositPage->balance = $rows["balance"];
        $depositPage->account = $rows["acc_no"];
        $depositPage->accId = $rows["id"];//取得使用者欲存款帳戶現在的餘額以及帳戶號碼跟其編號。

        if (isset($_POST["btnCancel"])) {
            header("Refresh:0.1; url=transaction");
            mysqli_close($link);
            exit();
        }

        if (isset($_POST["btnDeposit"])) {
            $depositPage->balance += $_POST["inputDeposit"];
            $sqlSTMT =<<<sqlSTMT
            UPDATE tbl_accounts
            SET balance={$depositPage->balance}
            WHERE user_id = 
            (select id from tbl_users where user_name = '{$_SESSION["uid"]}'); 
            sqlSTMT;//更新使用者存款的新餘額。
            mysqli_query($link, $sqlSTMT) or die(mysqli_error($link));
            if(mysqli_affected_rows($link) >0 ){

                $date = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
                $sqlSTMT =<<<sqlSTMT
                INSERT INTO `tbl_transaction` ( `accno_id`, `tx_type`, `amount`, `date`, `to_accno`, `status`, `comments`)
                VALUES
                ($depositPage->accId, 'credit', {$_POST["inputDeposit"]}, '$date', '$depositPage->account', 'SUCCESS', '' );
                sqlSTMT;//新增該筆存款成功的交易明細資料。
                mysqli_query($link, $sqlSTMT);
                mysqli_close($link);

                $_SESSION["msgStatus"] = 3; //存款成功，進入訊息頁面會顯示成功提示。
                $_SESSION["balance"] = $depositPage->balance;
                header("Location:status");
                exit();
    
            }
            

        }
        $this->view("OLB/deposit", $depositPage);

    }

    public function withdrawal()
    {
        $withdrawalPage = $this->model("service");
        session_start();
        require_once "sql/connDB.php";

        $sqlSTMT =<<<sqlSTMT
        select balance, acc_no ,id
        from tbl_accounts 
        where user_id = 
        (select id from tbl_users where user_name = '{$_SESSION["uid"]}');
        sqlSTMT;
        $result = mysqli_query($link, $sqlSTMT);
        $rows = mysqli_fetch_array($result);
        $withdrawalPage->balance = $rows["balance"];
        $withdrawalPage->account = $rows["acc_no"];
        $withdrawalPage->accId = $rows["id"];//取得使用者欲提款帳戶現在的餘額以及帳戶號碼跟其編號。

        if (isset($_POST["btnCancel"])) {
            header("Refresh:0.1; url=transaction");
            mysqli_close($link);
            exit();
        }

        if (isset($_POST["btnWithdrawal"])) {
            if($_POST["inputWithdrawal"] > $withdrawalPage->balance){
                echo "<script> alert('發生錯誤，欲提款金額大於帳戶餘額！請再次確認。'); 
                </script> ";
                header("Refresh:0.1; url=transaction");
                mysqli_close($link);
                exit();
            }
            $withdrawalPage->balance -= $_POST["inputWithdrawal"];
            $sqlSTMT =<<<sqlSTMT
            UPDATE tbl_accounts
            SET balance={$withdrawalPage->balance}
            WHERE user_id = 
            (select id from tbl_users where user_name = '{$_SESSION["uid"]}'); 
            sqlSTMT;//更新使用者存款的新餘額。
            mysqli_query($link, $sqlSTMT) or die(mysqli_error($link));
            if(mysqli_affected_rows($link) >0 ){
                $date = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
                $sqlSTMT =<<<sqlSTMT
                INSERT INTO `tbl_transaction` ( `accno_id`, `tx_type`, `amount`, `date`, `to_accno`, `status`, `comments`)
                VALUES
                ($withdrawalPage->accId, 'debit', {$_POST["inputWithdrawal"]}, '$date', '$withdrawalPage->account', 'SUCCESS', '' );
                sqlSTMT;//新增該筆提款成功的交易明細資料。
                mysqli_query($link, $sqlSTMT);
                mysqli_close($link);

                $_SESSION["msgStatus"] = 4; //提款成功，進入訊息頁面會顯示成功提示。
                $_SESSION["balance"] = $withdrawalPage->balance;
                header("Location:status");
                exit();

            }

        }
        $this->view("OLB/withdrawal", $withdrawalPage);

    }



    public function details()
    {
        $detailsPage = $this->model("details");
        session_start();
        require_once "sql/connDB.php";

        $sqlSTMT =<<<sqlSTMT
        select CONCAT('TX', LPAD(t.id,6,0)) as tx_id, tx_type, amount, `date`, 	balance
        from tbl_transaction as t
        left join tbl_accounts as a
        on t.accno_id = a.id
        where a.user_id = 
        (select id from tbl_users where user_name = '{$_SESSION["uid"]}')
        order by tx_id desc
        sqlSTMT;
        $result = mysqli_query($link, $sqlSTMT);//取得使用者交易明細資料。
        $detailsPage ->details = $result;
        $row = mysqli_fetch_assoc($result);
        $detailsPage ->balance = $row["balance"];
        mysqli_data_seek($result,0);
        if (isset($_POST["btnToTxn"])) {
            header("Location:transaction");
            mysqli_close($link);
            exit();
        }


        $this->view("OLB/details", $detailsPage);
    }







    public function status()
    {
        $information = $this->model("pageMessage");
        session_start();
        /*
         *根據session的login記錄判斷在提醒訊息頁面中要顯示什麼提示訊息。
         *提示完成功訊息後會將session的login的值設定爲「0」，讓使用者下一次到達此頁面時好以讓
         *提醒訊息頁面判斷，顯示出已登出的提示訊息。
         */

        switch ($_SESSION["msgStatus"]){
            case 1:
                $information->message = "登入成功，2秒後自動跳轉到龬路銀行頁面";
                header("Refresh:2; url=transaction");
                $this->view("OLB/status", $information);
                exit();

            case 2:
                $information->message = "已登出，2秒後回到登入頁面";
                header("Refresh:2; url=index");
                $this->view("OLB/status", $information);
                exit();

            case 3:
                $_SESSION["balance"] = number_format($_SESSION["balance"]);
                $information->message = "存款成功！，您最新的餘額為{$_SESSION["balance"]}<br/>2秒後回到龬路銀行頁面";
                header("Refresh:2; url=transaction");
                $this->view("OLB/status", $information);
                exit();

            case 4:
                $_SESSION["balance"] = number_format($_SESSION["balance"]);
                $information->message = "提款成功！，您最新的餘額為{$_SESSION["balance"]}<br/>2秒後回到龬路銀行頁面";
                header("Refresh:2; url=transaction");
                $this->view("OLB/status", $information);
                exit(); 
                
            case 5:
                $_SESSION["balance"] = number_format($_SESSION["balance"]);
                $information->message = "註冊成功，2秒後回到登入頁面";
                header("Refresh:2; url=index");
                $this->view("OLB/status", $information);
                exit(); 
        }
        
    }

}

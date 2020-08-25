<?php

class OLBController extends Controller
{

    public function index()
    {
        $user = $this->model("User");
        session_start();
        echo "fStYx6nP <br />";
        var_dump($_SESSION);

        // $sqlStatement =<<<sqlSTMT
        // SELECT * FROM `tbl_users`;
        // sqlSTMT;
        // $result =mysqli_query($link, $sqlStatement);
        // print_r($result);

        //如果使用者有登入過且SSESSION時效未過期，將使用者自動傳送到交易頁面
        if (isset($_SESSION["uid"])) {
            header("Location:transaction");
        }

        /*
         *使用者按下「登入」按鈕，在確認使用者至少有輸入一個字元後讓使用者登入，
         *並在SESSION中記錄登入成功的狀態(Value = 1)。
         */
        if (isset($_POST["btnLogin"])) {
            $user->userName = $_POST["inputUid"];
            $user->userPwd = hash('sha256', "{$_POST["inputPwd"]}");
            if ($user->userName && $user->userPwd) {
                require_once "sql/connDB.php";
                $sql = "select * from tbl_users where user_name = '$user->userName' and password='$user->userPwd'";
                $result = mysqli_query($link, $sql);
                $rows = mysqli_fetch_array($result);
                if ($rows) {
                    $_SESSION["uid"] = $rows["user_name"];
                    $_SESSION["login"] = 1; //己登入，進入訊息頁面會顯示登入提示。
                    header("Location:status");
                    exit();
                } else {
                    echo "<script> alert('帳號或密碼錯誤！'); </script>";
                }
            }
            mysqli_close();

        }
        $this->view("OLB/index", $user);
    }

    public function login()
    {
        session_start();
        $user = $this->model("User");
        /*
         *使用者按下「登入」按鈕，在確認使用者至少有輸入一個字元後讓使用者登入，
         *並在SESSION中記錄登入成功的狀態(Value = 1)。
         */
        if (isset($_POST["btnOK"])) {
            $user->sUserName = $_POST["txtUserName"];
            if (trim($user->sUserName) != "") {
                $_SESSION["uid"] = $user->sUserName;
                $_SESSION["login"] = 1;
                header("Location:status");
                exit();

            }
        }

        //使用者按下「回首頁」 的按鈕後，回到首頁。
        if (isset($_POST["btnHome"])) {
            header("Location:index");
            exit();
        }

        $this->view("Member/login", $user);

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

        if (isset($_POST["service1"])) {
            header("Location:deposit");
        }

        if (isset($_POST["service2"])) {
            header("Location:withdrawal");
        }

        if (isset($_POST["service3"])) {
            echo "<script> alert('您目前帳戶的餘額爲：{$transactionPage->balance}'); </script>";

        }

        if (isset($_POST["service4"])) {
            echo "查詢明細";
        }

        $this->view("OLB/transaction", $transactionPage);
    }

    public function deposit()
    {
        $depositPage = $this->model("service");
        session_start();
        require_once "sql/connDB.php";

        $sqlSTMT =<<<sqlSTMT
        select balance, acc_no
        from tbl_accounts 
        where user_id = 
        (select id from tbl_users where user_name = '{$_SESSION["uid"]}');
        sqlSTMT;
        $result = mysqli_query($link, $sqlSTMT);
        $rows = mysqli_fetch_array($result);
        $depositPage->balance = $rows["balance"];
        $depositPage->account = $rows["acc_no"];//取得使用者欲存款的帳戶現在的餘額以及帳戶號碼。

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
                echo "<script> alert('存款成功！您目前帳戶的餘額爲：{$depositPage->balance} 關閉頁面後將回到銀行首頁'); 
                
                </script> ";
            }
            header("Refresh:0.1; url=transaction");
            mysqli_close($link);
            exit();

        }
        $this->view("OLB/deposit", $depositPage);

    }

    public function withdrawal()
    {
        $withdrawalPage = $this->model("service");
        session_start();
        require_once "sql/connDB.php";

        $sqlSTMT =<<<sqlSTMT
        select balance, acc_no
        from tbl_accounts 
        where user_id = 
        (select id from tbl_users where user_name = '{$_SESSION["uid"]}');
        sqlSTMT;
        $result = mysqli_query($link, $sqlSTMT);
        $rows = mysqli_fetch_array($result);
        $withdrawalPage->balance = $rows["balance"];
        $withdrawalPage->account = $rows["acc_no"];//取得使用者欲存款的帳戶現在的餘額以及帳戶號碼。

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
                echo "<script> alert('提款成功！您目前帳戶的餘額爲：{$withdrawalPage->balance}  關閉頁面後將回到銀行首頁'); 
                
                </script> ";
            }
            header("Refresh:0.1; url=transaction");
            mysqli_close($link);
            exit();

        }
        $this->view("OLB/withdrawal", $withdrawalPage);

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

        if ($_SESSION["login"] == 1) {
            $_SESSION["login"] = 0;
            $information->message = "登入成功!，2秒後自動跳轉到龬路銀行頁面";
            header("Refresh:2; url=transaction");
            $this->view("OLB/status", $information);
            exit();
        } else {
            $_SESSION["uid"] = "Guest";
            $information->message = "已登出，2秒後回到到登入頁面";
            $_SESSION["lastPage"] = null;
            header("Refresh:2; url=index");
            $this->view("OLB/status", $information);
            exit();
        }

    }

}

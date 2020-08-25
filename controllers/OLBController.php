<?php

class OLBController extends Controller
{

    public function index()
    {
        require_once("sql/connDB.php");
        $user = $this->model("User");
        session_start();

        $sqlStatement =<<<mulity
        SELECT * FROM `tbl_users`;
        mulity;
        $result =mysqli_query($link, $sqlStatement);
        print_r($result);

        //如果使用者有登入過且SSESSION時效未過期，將使用者自動傳送到交易頁面
        if (isset($_SESSION["uid"])) {
          header("Location:transaction");
        }

        /*
         *使用者按下「登入」按鈕，在確認使用者至少有輸入一個字元後讓使用者登入，
         *並在SESSION中記錄登入成功的狀態(Value = 1)。
         */
        if (isset($_POST["btnOK"])) {
            $user->userName = $_POST["inputUid"];
            $user->userPwd = $_POST["inputPwd"];
            if (trim($user->sUserName) != "") {
                $_SESSION["uid"] = $user->sUserName;
                $_SESSION["login"] = 1;
                header("Location:transaction");
                exit();

            }
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



    public function secret()
    {
        session_start();
        /*
         *使用者在未登入的狀態下點選「會員專區」的按鈕，爲了讓使用者在登入會員後
         *直接跳轉會員專區頁面因此session中留下了一筆lastPage的記錄。
         */
        if($_SESSION["uid"] == "Guest")
        {
            $_SESSION["lastPage"] = "secret";
            header("Location: login");
            exit();
        }

        $this->view("Member/secret");
    }


    public function status()
    {
        $page = $this->model("LastPage");
        session_start();
        /*
         *根據session的login記錄及lastPage記錄判斷在提醒訊息頁面中要顯示什麼提示訊息。
         *提示完成功訊息後會將session的login的值設定爲「0」，讓使用者下一次到達此頁面時好以讓
         *提醒訊息頁面判斷，顯示出已登出的提示訊息。
         */
        if (isset($_SESSION["lastPage"]) and $_SESSION["login"] == 1) {
            $_SESSION["login"] = 0;
            $page->pageMessage = "登入成功!，2秒後自動跳轉到會員專區";
            header("Refresh:2; url=secret");
            $this->view("Member/status", $page);
            exit();
        }elseif($_SESSION["login"] == 1){
            $_SESSION["login"] = 0;
            $page->pageMessage = "登入成功!，2秒後自動跳轉到首頁";
            header("Refresh:2; url=index");
            $this->view("Member/status", $page);
            exit();
        }else{
            $_SESSION["uid"] = "Guest";
            $page->pageMessage = "已登出，2秒後自動跳轉到首頁";
            $_SESSION["lastPage"] = NULL;
            header("Refresh:2; url=index");
            $this->view("Member/status", $page);
            exit();
        }
        
        
       
    }


}
?>
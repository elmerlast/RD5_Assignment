<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>線上網銀</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/RD5_Assignment/CSS/signin.css">

</head>

<body class="text-center" background="/RD5_Assignment/img/index_backgorund.jpg">
 <div class="card " style="width: 42rem;">
  <form class="form-signin " id="form_sign_in" name="form_sign_in" method="post" action="">
    <img class="mb-4" src="../img/olbicon.jpeg">
    <h1 class="h3 mb-3 font-weight-normal">歡迎來到線上網銀！</h1>
    <label for="inputEmail" class="sr-only">使用者名稱</label>
    <input type="text" id="inputUid" name="inputUid" class="form-control" placeholder="請輸入使用者名稱" required autofocus>
    <label for="inputPassword" class="sr-only">密碼</label>
    <input type="password" id="inputPwd" name="inputPwd" class="form-control" placeholder="請輸入密碼" required>
    <div class="checkbox mb-3">
      <label>
        <?php if($data->error){echo('<label style="color: red;" >※帳號或密碼錯誤</label>');} ?>
        <p>還沒有帳號嗎 ? <a href="/RD5_Assignment/OLB/register"> 點我註冊</a></p>
      </label>
    </div>
    <button class="btn btn-lg btn-info btn-block" type="submit" name="btnLogin" id="btnLogin" value="登入">登入
    </button>
  </form>
 </div>
</body>

</html>
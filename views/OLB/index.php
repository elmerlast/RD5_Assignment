<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>線上網銀</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="/RD5_Assignment/CSS/signin.css">






</head>

<body class="text-center">
  <form class="form-signin" id="form_sign_in" name="form_sign_in" method="post" action="">
    <img class="mb-4" src="/RD5_Assignment/img/olbicon.jpeg">
    <h1 class="h3 mb-3 font-weight-normal">歡迎來到線上網銀！</h1>
    <label for="inputEmail" class="sr-only">使用者名稱</label>
    <input type="text" id="inputUid" name="inputUid" class="form-control" placeholder="請輸入使用者名稱" required autofocus>
    <label for="inputPassword" class="sr-only">密碼</label>
    <input type="password" id="inputPwd" name="inputPwd" class="form-control" placeholder="請輸入密碼" required>
    <!-- <span class="input-group-addon col-sm-1">
      <i class="glyphicon glyphicon-info-sign" style="font-size:20px; vertical-align: middle;"></i>
    </span>
    <div class="form-group row">
      <div class="col-12">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-map-pin"></i>
            </div>
          </div>
          <input id="text" name="inputPIN" id="inputPIN" placeholder="請輸入PIN碼" type="text" class="form-control">
        </div>
      </div>
    </div> -->
    <div class="checkbox mb-3">
      <label>
        <p>還沒有帳號嗎 ? <a href="page-register.php"> 點我註冊</a></p>
      </label>
    </div>
    <!-- 08/24 17:38 目前做到這 -->
    <button class="btn btn-lg btn-info btn-block" type="submit" name="btnOK" id="btnOK" value="登入">登入
    </button>
  </form>
</body>

</html>
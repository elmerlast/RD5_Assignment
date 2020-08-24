

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="signin.css">
  <style>
    html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


  </style>


  </head>

  <body class="text-center">
    <form class="form-signin" id="form_sign_in" name="form_sign_in" method="post" action=""> 
      <img class="mb-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTP0bT4aNrM2SqIkcRcFZgY3uRNA2jiRtagrw&usqp=CAU" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">歡迎來到線上網銀！</h1>
      <label for="inputEmail" class="sr-only">使用者名稱</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="請輸入使用者名稱" required autofocus>
      <label for="inputPassword" class="sr-only">密碼</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="請輸入密碼" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> 記住我
        </label>
      </div>
      <!-- 目前做到這 -->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnOK" id="btnOK" value="登入">登入
      </button>
    </form>
  </body>
</html>

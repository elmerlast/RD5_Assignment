<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>歡迎提款</title>

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
    <img class="mb-4" src="/RD5_Assignment/img/withdraw.png">
    <h1 class="h3 mb-3 font-weight-normal">從您的帳戶提款</h1>
    <label for="inputEmail">目前帳戶號碼：</label>
    <input type="text" readonly="readonly" name="account" id="account" value="<?=$data->account; ?>" class="form-control"  required autofocus>
      <label for="inputPassword" class="sr-only">欲提款金額</label>
      <input type="number"  min="0" max="30000" id="inputWithdrawal" name="inputWithdrawal" class="form-control" placeholder="請輸入提款金額" required>


      <button class="btn btn-lg btn-warning btn-block" type="submit" name="btnWithdrawal" id="btnWithdrawal" value="確認提款">確認提款
      </button>
  </form>
</body>

</html>
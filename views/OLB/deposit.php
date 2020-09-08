<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>歡迎存款</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/RD5_Assignment/CSS/signin.css">

</head>

<body class="text-center" background="/RD5_Assignment/img/index_backgorund.jpg">
 <div class="card " style="width: 26rem;">
  <form class="form-signin" id="form_deposit" name="form_deposit" method="post" action="">
    <img class="mb-4" src="/RD5_Assignment/img/deposit.png"  width="150" style="margin-left:-25px;">
    <h1 class="h3 mb-3 font-weight-normal">存款至您的帳戶</h1>
    <label for="inputEmail">目前帳戶號碼：</label>
    <input type="text" readonly="readonly" name="account" id="account" value="<?=$data->account; ?>" class="form-control"  required autofocus>
      <label for="inputPassword" class="sr-only">欲存款金額</label>
      <input type="number"  min="0" max="30000" id="inputDeposit" name="inputDeposit" class="form-control" placeholder="請輸入存款金額" required>


      <button class="btn btn-lg btn-info btn-block" type="submit" name="btnDeposit" id="btnDeposit" value="確認存款">確認存款
      </button>
      <button class="btn btn-lg btn-danger btn-block" type="submit" name="btnCancel" id="btnCancel" value="取消" formnovalidate>取消
      </button>
  </form>
 </div>

</body>

</html>
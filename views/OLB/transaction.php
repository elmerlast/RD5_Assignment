

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>會員專區</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body background="/RD5_Assignment/img/index_backgorund.jpg">
<div class="container card" style="margin-top:40px;">
      <h1>歡迎來到線上網路銀行！</h1>

      <div class="row"><div class="col-12"><p id="textBalance">帳戶餘額：<?php echo(number_format($data->balance));?></p></div></div>

      <h3>選擇您要進行的服務</h3>
      <div class="row"><div class="col-12"></div></div>
      <div class="row">
        <div class="col-1"><img class="mb-4" src="/RD5_Assignment/img/deposit.png"  width="50" style="margin-left:5px;"></div>
        <div class="col-2"><form id="deposit_service" name="deposit_service" method="post" action="">
          <button class="btn  btn-info " type="submit" name="deposit_service" id="deposit_service" value="deposit">&emsp;存款&emsp;
          </button></form></div>

        <div class="col-1"><img class="mb-4" src="/RD5_Assignment/img/withdraw.png" width="50" ></div>
        <div class="col-2"><form id="withdrawal_service" name="withdrawal_service" method="post" action="">
        <button class="btn  btn-warning " type="submit" name="withdrawal_service" id="withdrawal_service" value="withdrawal">&emsp;提款&emsp;
          </button></form></div>

        <div class="col-1"><img class="mb-4" src="/RD5_Assignment/img/details.png"  width="40" style="margin-left:5px;"></div>
        <div class="col-2"><form id="details_service" name="details_service" method="post" action="">
        <button class="btn  btn-success " type="submit" name="details_service" id="details_service" value="details">查詢明細
          </button></form></div>

        <div class="col-1"><img class="mb-4" src="/RD5_Assignment/img/logout.png"  width="40" style="margin-left:5px;"></div>
        <div class="col-2"><form id="logout" name="logout" method="post" action="">
        <button class="btn  btn-primary " type="submit" name="logout" id="logout" value="logout">&emsp;登出&emsp;
          </button></form></div>

      </div>
      <div class="row"><div class="col-12">&nbsp</div></div>
    </div> 


</body>
</html>
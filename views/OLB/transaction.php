

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>會員專區</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <!-- <link rel="stylesheet" type="text/css" href="/RD5_Assignment/CSS/grid.css"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>

<div class="container">
      <h1>歡迎來到線上網路銀行！</h1>
      <p class="lead">您好！佐博，銀行頁面將會在不進行任何操作180秒後登出</p>

      <div class="row"><div class="col-12"><p id="textBalance">帳戶餘額：<?php echo $data->balance;?></p></div></div>

      <h3>選擇您要進行的服務</h3>
      <div class="row"><div class="col-12"></div></div>
      <div class="row">

        <div class="col-1">.col-1</div>
        <div class="col-2"><form id="service1" name="service1" method="post" action="">
          <button class="btn  btn-info " type="submit" name="service1" id="service1" value="deposit">&emsp;存款&emsp;
          </button></form></div>

        <div class="col-1">.col-2</div>
        <div class="col-2"><form id="service2" name="service2" method="post" action="">
        <button class="btn  btn-warning " type="submit" name="service2" id="service2" value="Withdrawal">&emsp;提款&emsp;
          </button></form></div>

          <div class="col-1">.col-2</div>
        <div class="col-2"><form id="service3" name="service3" method="post" action="">
        <button class="btn  btn-danger " type="submit" name="service3" id="service3" value="Balance">查詢餘額
          </button></form></div>

        <div class="col-1">.col-2</div>
        <div class="col-2"><form id="service4" name="service4" method="post" action="">
        <button class="btn  btn-success " type="submit" name="service4" id="service4" value="details">查詢明細
          </button></form></div>

        

      </div>



    </div> 


</body>
</html>
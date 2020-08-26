

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>交易明細</title>
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
    <h1>以下為您所有的交易明細</h1>
    <table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">交易編號</th>
      <th scope="col">增加金額</th>
      <th scope="col">減少金額</th>
      <th scope="col">交易日期</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($data ->details)){?>
      <tr>
        <th scope="row"><?=$row["tx_id"] ?></th>
        <?php if($row["tx_type"] == "credit"){?>
           <td><?=$row["amount"] ?></td>
           <td><?="" ?></td>  
        <?php }else{ ?>
           <td><?="" ?></td>
           <td><?=$row["amount"] ?></td>  
        <?php } ?>        
        <td><?=$row["date"] ?></td>
      </tr>
    <?php } ?>

  </tbody>
</table>

<div class="row">
    <div class="col-10"></div>
    <div class="col-2"><form id="btnToTxn" name="btnToTxn" method="post" action=""><button class="btn  btn-info " type="submit" name="btnToTxn" id="btnToTxn" value="btnToTxn">&emsp;返回首頁&emsp;
          </button></form></div>
</div>



  </div> 


</body>
</html>
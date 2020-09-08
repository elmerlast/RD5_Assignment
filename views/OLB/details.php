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

<body background="/RD5_Assignment/img/index_backgorund.jpg">

  <div class="container card" style="margin-top:40px;">
      <h1>以下為您所有的交易明細</h1>
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">交易編號</th>
            <th scope="col">增加金額</th>
            <th scope="col">減少金額</th>
            <th scope="col">交易日期</th>
            <th scope="col">帳戶餘額</th>
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
            <td>
                <?php 
                  if($row["tx_type"] == "credit"){
                      echo($data ->balance);
                      $data ->balance -= $row["amount"];
                      $skipSt += 1;
                  }else{
                      echo($data ->balance);
                      $data ->balance += $row["amount"];
                      $skipSt += 1;
                  }
                ?>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>

      <div class="row">

        <div class="col">
          <form id="btnToTxn" name="btnToTxn" method="post" action=""><button class="btn  btn-info pull-right" type="submit"
              name="btnToTxn" id="btnToTxn" value="btnToTxn">&emsp;返回首頁&emsp;
            </button></form>
        </div>
      </div>
      <div class="row"><div class="col-12">&nbsp</div></div>



  </div>


</body>

</html>
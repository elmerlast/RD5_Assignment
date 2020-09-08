<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>會員登入</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
	
		<div class="container">
			<br>
			<p class="text-center">歡迎註冊線上網銀</a></p>
			<hr>


			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<header class="card-header">
							<div class="row" style="position: relative;">
								<div class="col-6"><h4 class="card-title mt-2">註冊會員</h4></div>
								<!-- <div class="col-6" style="position: absolute; bottom: 0; right: 0;" ><p>己經有帳號了嗎 ? <a href="page-register.php"> 現在就登入！</a></p></div> -->
							</div>
						</header>
						<article class="card-body">
							<form id="registerForm" name="registerForm" method="post" action="">
								<div class="form-row">
									<div class="col form-group">
										<label>姓氏 </label>
										<input type="text" id="inputSurname" name="inputSurname" class="form-control" placeholder="">
									</div> <!-- form-group end.// -->
									<div class="col form-group">
										<label>名字</label>
										<input type="text" id="inputGivenName" name="inputGivenName" class="form-control" placeholder=" ">
									</div> <!-- form-group end.// -->
								</div> <!-- form-row end.// -->
								<div class="form-row">
								<div class="col form-group">
										<label>使用者名稱</label>
										<?php if(isset($_POST["userError"])) { echo '&nbsp;<label style="color: red;">輸入的使用者名稱己被使用！</label>'; } ?>
										<input type="text" id="inputUserName" name="inputUserName" class="form-control" placeholder="請輸入英文或數字">
									</div> <!-- form-group end.// -->
									<div class="col form-group">
									<label>電子郵件</label>
									<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="">
									<?php if(isset($_POST["emailError"])) { echo '&nbsp;<label style="color: red; ">輸入的電子郵件己被使用！</label>'; } ?>
									</div> <!-- form-group end.// -->
								</div> <!-- form-row end.// -->

								<div class="form-group">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="radioGender" value="Male">
										<span class="form-check-label"> 男 </span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="radioGender" value="Female">
										<span class="form-check-label"> 女</span>
									</label>
								</div> <!-- form-group end.// -->
								<div class="form-row">
								<div class="col form-group">
								        <label>電話</label>
										<input type="tel" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" required pattern="[0-9]{9,10}">
									</div> <!-- form-group end.// -->
									<div class="col form-group">
									<label>請輸入密碼</label>
									<input class="form-control" type="password" id="inputPassword" name="inputPassword" >
									</div> <!-- form-group end.// -->
								</div> <!-- form-row end.// -->

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" name="btnRegister" id="btnRegister" value="btnRegister"> 註冊 </button>
								</div> <!-- form-group// -->

							</form>
						</article> <!-- card-body end .// -->
						<div class="border-top card-body text-center">己經有帳號了嗎 ? <a href="/RD5_Assignment/OLB/index">現在就登入！</a></div>
					</div> <!-- card.// -->
				</div> <!-- col.//-->

			</div> <!-- row.//-->


		</div>
		<!--container end.//-->
	
</body>

</html>
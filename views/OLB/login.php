<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>會員登入</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="300" border="7" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 登入</font></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">帳號</td>
      <!-- 使用Regular Expression 限制使用者不可輸入空白字元且至少輸入一個字元-->
      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" pattern="[^ \t\r\n\f]{1,}"/></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">密碼</td>
      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
      <input type="reset" name="btnReset" id="btnReset" value="重設" />
      <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>

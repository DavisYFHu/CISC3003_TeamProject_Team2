<?php
// start session·
session_start();
//Introducing database connection files
include '../conn.php';
// When the login form is submitted
if ($_POST) {
    // Receive CAPTCHA
    $code = trim($_POST["captcha"]);
    // Receiving Account Number
    $stuid = $_POST['stuid'];
    // Receive password
    $password = md5($_POST['password']);
    if(strtolower($code)==strtolower($_SESSION['captcha_code'])){
        // sql query statement
    $sql = "select * from students where stuid = '{$stuid}' and password = '{$password}'";
    // Execute query, verify login
    $state = $pdo->query($sql);
    // Getting the data in the result set
    $row = $state->fetch(PDO::FETCH_ASSOC);
    // If the current user name and password exist in the database, the login is successful, otherwise it fails!
    if ($row) {
        // Successful login, store user account in session
        $_SESSION['name'] = $row['name'];
        $_SESSION['stuid'] = $row['stuid'];
        $_SESSION['tel'] = $row['tel'];
        $_SESSION['sfzh'] = $row['sfzh'];
        echo "<script>alert('Log in successfully!');window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('The username or password is incorrect!');window.location.href='login.php'</script>";
    }
}
else{
  echo "<script>alert('Captcha error!');window.location.href='login.php'</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Exam Booking System</title>
        <link rel="stylesheet" href="../assets/css/layui.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body style="background-image: url(../img/3.jpg);background-repeat: no-repeat;background-size: 100%;width:100%;height: 100%;overflow-y:hidden;">
    	<form class="layui-form" action="login.php" method="post">
    		<div class="container" style="width: 450px;margin: 170px auto;border: 1px  solid;border-radius:20px; background-color:rgba(255,255,255,0.8);">
    			<div class="layui-form-mid layui-word-aux" style="text-align: center;width: 100%;margin-top: 25px;">
    				<p style="display: block;font-size: 24px;text-align: center;margin-bottom: 30px;width: 100%;font-family: 'Microsoft Yahei';color: #757575;">Exam Booking System<span> Student Login<span></p>
    			</div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">Account</label>
			    <div class="layui-input-block">
			      <input type="text" name="stuid" required placeholder="Input Account" autocomplete="off" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">Password</label>
			    <div class="layui-input-inline">
			      <input type="password" name="password" required placeholder="Input Password" autocomplete="off" class="layui-input">
			    </div>
			  </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CAPTCHA <i class="layui-icon layui-icon-vercode" style="font-size: 15px;"></i></label>
            <div>
                <input type="text" name="captcha" placeholder="Input Captcha" autocomplete="off" style="width:100px; height:30px;" >
                <img src="code.php" alt="" id="code_img">
				<a href="" id="change">Change it</a>
            </div>
        </div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
          <button class="layui-btn layui-btn-radius" type="submit" id="denglu">Login</button>
          <button class="layui-btn layui-btn-radius layui-btn-primary" type="reset">Reset</button>
          <a class="layui-btn layui-btn-radius layui-btn-normal" href="../index.php">Back Home</a>
			    </div>
			  </div>

			</div>
		</form>
    </body>
</html>
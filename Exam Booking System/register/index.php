<?php
// Introducing the database link file
include '../conn.php';
// Determine whether a modification form is submitted or not
if ($_POST) {
    // Receive form parameters
    $name = $_POST['name'];
    $stuid = $_POST['stuid'];
    $sfzh = $_POST['sfzh'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $create_time = date("Y-m-d",time());
    // Assembly update sql statement
    $sql = "INSERT INTO students(name,stuid,sfzh,tel,address,password,create_time) VALUES ('{$name}','{$stuid}','{$sfzh}','{$tel}','{$address}','{$password}','{$create_time}')";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determining Success
    if ($row) {
        echo "<script>alert('Registration was successful! Please login');window.location.href='../student/login.php'</script>";
    } else {
        echo "<script>alert('Registration failed!');window.location.href='index.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <title>Exam Booking System</title>
        <link rel="stylesheet" href="../assets/css/layui.css" />
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body style="background-image: url(../img/3.jpg);background-repeat: no-repeat;background-size: 100%;width:100%;height: 100%;overflow-y:hidden;">
		<div class="layui-container">

			<div class="layui-row">
				<div class="layui-col-md8 layui-col-md-offset2" style="margin-top: 120px;background-color: #fff;padding-left: 15px;padding-right: 15px;border-radius: 15px;">
					<blockquote class="layui-elem-quote" style="margin-top: 20px;margin-bottom: 20px;">Student Account Registration</blockquote>
					<form class="layui-form layui-form-pane" action="index.php" method="post">
						<div class="layui-form-item">
							<label class="layui-form-label">Name</label>
							<div class="layui-input-block">
								<input type="text" name="name" required="" lay-verify="required" placeholder="Please input name" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">Student ID</label>
							<div class="layui-input-block">
								<input type="text" name="stuid" required="" lay-verify="required" placeholder="Please input student ID" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">Personal ID</label>
							<div class="layui-input-block">
								<input type="text" name="sfzh" required="" lay-verify="required" placeholder="Please input personal ID" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">Phone</label>
							<div class="layui-input-block">
								<input type="text" name="tel" required="" lay-verify="required" placeholder="Please input phone number" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">Address</label>
							<div class="layui-input-block">
								<input type="text" name="address" required="" lay-verify="required" placeholder="Please input address" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">Password</label>
							<div class="layui-input-block">
								<input type="password" name="password" required="" lay-verify="required" placeholder="please input password" autocomplete="off" class="layui-input">
							</div>
						</div>
						<div class="layui-form-item" style="text-align: center;">
                            <button class="layui-btn layui-btn-fluid" style="width: 60%;margin-top: 15px;" type="submit">Register</button>
                        </div>
						<a href="../index.php" class="back-home-btn">Back Home</a>
					</form>
      
				</div>
			</div>
		</div>

        <script src="../assets/layui.js">
        </script>
        <script>
            layui.use(['element', 'layer', 'form'],
            function() {
                var element = layui.element,
                layer = layui.layer,
                form = layui.form,
                $ = layui.$;
            });
        </script>
    </body>

</html>
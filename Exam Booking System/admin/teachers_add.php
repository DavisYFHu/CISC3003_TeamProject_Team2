<?php
// start session·
session_start();
// Introducing the database link file
include '../conn.php';
// Detecting whether the login is logged in or not
if (!isset($_SESSION["username"])) {
    echo "<script>alert('Please Login')</script>";
    header('Location: login.php');
}

// Determine whether a modification form is submitted or not
if ($_POST) {
    // Receive form parameters
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $sfzh = $_POST['sfzh'];
    $tid = $_POST['tid'];
    $password = md5($_POST['password']);
    $tel = $_POST['tel'];
    // Assembly update sql statement
    $sql = "INSERT INTO teachers(name,address,sfzh,tid,password,tel) VALUES ('{$name}','{$address}','{$sfzh}','{$tid}','{$password}','{$tel}')";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determining Success
    if ($row) {
        echo "<script>alert('Add Successfully！');window.location.href='teachers.php'</script>";
    } else {
        echo "<script>alert('Add Failed！');window.location.href='teachers_add.php'</script>";
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
<body>
<div class="layui-layout layui-layout-admin">
    <?php include 'header.php'; ?>
    <div class="layui-side layui-bg-black">
        <?php include 'menu.php'; ?>
    </div>
    <div class="layui-body">
        

        <div class="layui-container">
            <blockquote class="layui-elem-quote" style="margin-top: 15px;">Add Teacher</blockquote>
            <div class="layui-row">
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="teachers_add.php" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label">Teacher ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="tid" value="" required autocomplete="off" placeholder="Please input teacher ID" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Name</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" value="" required autocomplete="off" placeholder="Please input name" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Address</label>
                            <div class="layui-input-block">
                                <input type="text" name="address" value="" required autocomplete="off" placeholder="Please input address" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Personal ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="sfzh" value="" required autocomplete="off" placeholder="Please input Personal ID" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Phone</label>
                            <div class="layui-input-block">
                                <input type="text" name="tel" value="" required autocomplete="off" placeholder="Please input phone number" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Password</label>
                            <div class="layui-input-block">
                                <input type="text" name="password" value="" required autocomplete="off" placeholder="Please input password" class="layui-input">
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">Add</button>
                            <a href="teachers.php" class="layui-btn">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<script src="../assets/layui.js">
</script>
<script>
    layui.use(['element', 'layer', 'util'],
        function() {
            var element = layui.element,
                layer = layui.layer,
                util = layui.util,
                $ = layui.$;
        });
</script>
</body>

</html>
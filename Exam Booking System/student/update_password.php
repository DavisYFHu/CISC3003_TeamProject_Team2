<?php
// start session·
session_start();
// Introducing the database link file
include '../conn.php';
// Detecting whether the login is logged in or not
if (!isset($_SESSION["stuid"])) {
    echo "<script>alert('Please Login')</script>";
    header('Location: login.php');
}
// Assembling sql statements
$stuid = $_SESSION['stuid'];
$sql = "select * from students where stuid = '{$stuid}'";

// perform a search
$state = $pdo->query($sql); 
// Get the data in the result set and display it in the form.
$result = $state->fetch(PDO::FETCH_ASSOC);



// Determine whether a modification form is submitted or not
if ($_POST) {
    // Receive form parameters
    $stuid = $_POST['stuid'];
    $password = md5($_POST['password']);
    $new_password = md5($_POST['new_password']);
    $re_new_password = md5($_POST['re_new_password']);
    if ($password != $result['password']) {
        echo "<script>alert('Original password incorrect！');window.location.href='update_password.php'</script>";
        return;
    }
    
    if ($new_password != $re_new_password) {
        echo "<script>alert('The passwords entered twice do not match!');window.location.href='update_password.php'</script>";
    }else{
        // Assembly update sql statement
        $sql = "UPDATE students SET password='{$new_password}' WHERE stuid='{$stuid}'";
        // Execute sql
        $row = $pdo->exec($sql);
        // Determine whether or not it was successful!
        if ($row) {
            // empty session
            $_SESSION = array();
            // delete session file
            session_destroy();
            echo "<script>alert('Changed successfully! Please login again!');window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('Changed failed!');window.location.href='update_password.php'</script>";
        }
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

            <div class="layui-row">
                <br>    <br>
                <blockquote class="layui-elem-quote">Change Passowrd</blockquote>
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="update_password.php" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label">Original</label>
                            <div class="layui-input-block">
                                <input type="text" name="password" value="" required autocomplete="off" placeholder="Please input original password" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">New</label>
                            <div class="layui-input-block">
                                <input type="text" name="new_password" value="" required autocomplete="off" placeholder="Please input new password" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Confirmed</label>
                            <div class="layui-input-block">
                                <input type="text" name="re_new_password" value="" required autocomplete="off" placeholder="Please confirmed input new password" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <input type="hidden" name="stuid" value="<?php echo $_SESSION['stuid']; ?>">
                            <button class="layui-btn" type="submit">Change</button>
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
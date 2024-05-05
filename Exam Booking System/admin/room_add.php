<?php
// start session·
session_start();
// Introducing the database link file
include '../conn.php';
// Detecting whether the login is logged in or notv
if (!isset($_SESSION["username"])) {
    echo "<script>alert('Please Login')</script>";
    header('Location: login.php');
}

// Determine whether a modification form is submitted or not
if ($_POST) {
    // Receive form parameters
    $roomid = $_POST['roomid'];
    $clean = $_POST['clean'];
    // Assembly update sql statement
    $sql = "INSERT INTO room(roomid,clean) VALUES ('{$roomid}','{$clean}')";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determining Success
    if ($row) {
        echo "<script>alert('Add Successfully！');window.location.href='room.php'</script>";
    } else {
        echo "<script>alert('Add Failed！');window.location.href='room_add.php'</script>";
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
            <blockquote class="layui-elem-quote" style="margin-top: 15px;">Add Room Information</blockquote>
            <div class="layui-row">
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="room_add.php" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label">Room ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="roomid" value="" required autocomplete="off" placeholder="Please input room ID" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Is it clean</label>
                            <div class="layui-input-block">
                                <input type="text" name="clean" value="" required autocomplete="off" placeholder="Please input is it clean" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" type="submit">Add</button>
                            <a href="room.php" class="layui-btn">Back to list</a>
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
<?php
// start session·
session_start();
// Detecting whether the login is logged in or not
if (!isset($_SESSION["stuid"])) {
    echo "<script>alert('Please Login')</script>";
    header('Location: login.php');
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
                <!-- Content subject area -->
                <div style="padding: 15px;background:#F0F2F5;">
                    <span class="layui-breadcrumb">
                        <a href="">Home</a>
                        <a href="">System Info</a>
                        <a><cite>Content</cite></a>
                    </span>

                    <div class="layui-content">
                        <h1>Welcome to Exam Booking System !
                        
                        </h1>
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
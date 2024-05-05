<div class="layui-header"style="background:#009688;">
    <div class="layui-logo layui-hide-xs layui-bg-black" style="background:#000;font-weight: bold;">Exam Booking System</div>
    <ul class="layui-nav layui-layout-right layui-bg-cyan">
        <li class="layui-nav-item layui-hide layui-show-md-inline-block">
        <i class="layui-icon layui-icon-face-smile"></i>
            <a href="javascript:;">Welcome, Admin <?php echo $_SESSION['username']; ?> !</a>
            <dl class="layui-nav-child">
                <dd><a href="update_password.php">Change Password</a></dd>
                <dd><a href="logout.php">Logout</a></dd>
            </dl>
        </li>
    </ul>
</div>
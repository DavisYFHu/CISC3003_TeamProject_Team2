<div class="layui-side-scroll" style="background:#009688;">
    <ul class="layui-nav layui-nav-tree layui-bg-green" lay-filter="test" lay-shrink="all">
        <li class="layui-nav-item">
            <a href="index.php">
                System Information
            </a>
        </li>
        <li class="layui-nav-item layui-nav-itemed">
            <a href="javascript:;">
                Teacher Management
            </a>
            <dl class="layui-nav-child">
                <dd>
                    <a href="teachers.php">
                        Teacher Information&nbsp&nbsp<i class="layui-icon layui-icon-list" style="font-size: 15px;"></i>
                    </a>
                </dd>
                <dd>
                    <a href="teachers_add.php">
                        Add Teacher&nbsp&nbsp<i class="layui-icon">&#xe61f;</i>  
                    </a>
                </dd>
                <dd>
                    <a href="teachersearch.php">
                        Search Teacher&nbsp&nbsp<i class="layui-icon layui-icon-search" style="font-size: 15px;"></i>  
                    </a>
                </dd>
            </dl>
        </li>
        
        <li class="layui-nav-item layui-nav-itemed">
            <a href="javascript:;">
                Student Management
            </a>
            <dl class="layui-nav-child">
                <dd>
                    <a href="agree_yuyue.php">
                        Student Booking&nbsp&nbsp<i class="layui-icon">&#xe770;</i>
                    </a>
                </dd>
                <dd>
                    <a href="score_list.php">
                        Student Score&nbsp&nbsp<i class="layui-icon">&#xe629;</i>
                    </a>
                </dd>
            </dl>
        </li>

        <li class="layui-nav-item layui-nav-itemed">
            <a href="javascript:;">
                Room Management
            </a>
            <dl class="layui-nav-child">
                <dd>
                    <a href="room.php">
                        Room Information&nbsp&nbsp<i class="layui-icon">&#xe63c;</i>
                    </a>
                </dd>
                <dd>
                    <a href="room_add.php">
                        Add Room&nbsp&nbsp<i class="layui-icon">&#xe61f;</i>
                    </a>
                </dd>
                <dd>
                    <a href="roomsearch.php">
                        Search Room&nbsp&nbsp<i class="layui-icon layui-icon-search" style="font-size: 15px;"></i>  
                    </a>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="update_password.php">
                Change Password&nbsp&nbsp<i class="layui-icon">&#xe673;</i>
            </a>
        </li>
        <li class="layui-nav-item">
            <a href="logout.php">
                Logout&nbsp&nbsp<i class="layui-icon">&#xe65c;</i>
            </a>
        </li>
    </ul>
</div>
<script>

    layui.use('element', function () {
        var element = layui.element;
    });
</script>

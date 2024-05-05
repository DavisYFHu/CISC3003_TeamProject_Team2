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
// Determine if there exists a description of the id passed through the get method that needs to be modified, then query for the data
if (!empty($_GET['id'])) {
    // Receive the id of the data to be modified
    $id = $_GET['id'];
    // Query the current data to be modified according to the id.
    // Assembling sql statements
    $sql = "select * from teachers where id = {$id}";
    // perform a search
    $state = $pdo->query($sql); 
    // Get the data in the result set and display it in the form.
    $result = $state->fetch(PDO::FETCH_ASSOC);
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
    $sql = "UPDATE teachers SET name='{$name}', address='{$address}', sfzh='{$sfzh}', tid='{$tid}', password='{$password}', tel='{$tel}' WHERE id=$id";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determine whether or not it was successful!
    if ($row) {
        echo "<script>alert('Edit Successfully！');window.location.href='teachers.php'</script>";
    } else {
        echo "<script>alert('Edit Failed！');window.location.href='teachers.php'</script>";
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
            	<br><br>
            	<blockquote class="layui-elem-quote">Edit Teacher Information</blockquote>
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="teachers_edit.php" method="post">

                        <div class="layui-form-item">
                            <label class="layui-form-label">Teacher ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="tid" value="<?php echo $result['tid']; ?>" required autocomplete="off" placeholder="Please input teacher ID" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Name</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" required autocomplete="off" placeholder="Please input name" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Personal ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="sfzh" value="<?php echo $result['sfzh']; ?>" required autocomplete="off" placeholder="Please input Personal ID" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Phone</label>
                            <div class="layui-input-block">
                                <input type="text" name="tel" value="<?php echo $result['tel']; ?>" required autocomplete="off" placeholder="Please input phone" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Address</label>
                            <div class="layui-input-block">
                                <input type="text" name="address" value="<?php echo $result['address']; ?>" required autocomplete="off" placeholder="Please input address" class="layui-input">
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">Password</label>
                            <div class="layui-input-block">
                                <input type="text" name="password" value="" required autocomplete="off" placeholder="Please input password" class="layui-input">
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <button class="layui-btn" type="submit">Edit</button>
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
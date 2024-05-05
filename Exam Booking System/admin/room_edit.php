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
// Determine if there is an id description passed via get that needs to be modified, then query the data.
if (!empty($_GET['id'])) {
    // Receive the id of the data to be modified
    $id = $_GET['id'];
    // Query the data that needs to be modified based on the id.
    // Assemble the sql statement
    $sql = "select * from room where id = {$id}";
    // Execute the query
    $state = $pdo->query($sql); 
    // Get the data in the result set and display it in the form.
    $result = $state->fetch(PDO::FETCH_ASSOC);
}



// Determine if the modification form was submitted
if ($_POST) {
    // Receive form parameters
    $id = $_POST['id'];
    $roomid = $_POST['roomid'];
    $clean = $_POST['clean'];
    // Assemble the update sql statement
    $sql = "UPDATE room SET roomid='{$roomid}', clean='{$clean}' WHERE id=$id";
    // execute sql
    $row = $pdo->exec($sql);
    // Determine if it was successful!
    if ($row) {
        echo "<script>alert('Edit Successfully！');window.location.href='room.php'</script>";
    } else {
        echo "<script>alert('Edit Failed！');window.location.href='room.php'</script>";
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
                <blockquote class="layui-elem-quote">Edit Room Information</blockquote>
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="room_edit.php" method="post">
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">Room ID</label>
                            <div class="layui-input-block">
                                <input type="text" name="roomid" value="<?php echo $result['roomid']; ?>" required autocomplete="off" placeholder="Please input room ID" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">Is it clean</label>
                            <div class="layui-input-block">
                                <input type="text" name="clean" value="<?php echo $result['clean']; ?>" required autocomplete="off" placeholder="Please input is it clean" class="layui-input">
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <button class="layui-btn" type="submit">Edit</button>
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
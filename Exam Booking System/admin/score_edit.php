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
    $sql = "select * from score where id = {$id}";
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
    $km = $_POST['km'];
    $score = $_POST['score'];
    $tel = $_POST['tel'];
    // Assembly update sql statement
    $sql = "UPDATE score SET name='{$name}', km='{$km}', tel='{$tel}', score='{$score}' WHERE id=$id";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determine whether or not it was successful!
    if ($row) {
        echo "<script>alert('Edit Successfully！');window.location.href='score_list.php'</script>";
    } else {
        echo "<script>alert('Edit Failed！');window.location.href='score_list.php'</script>";
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
            <br><br>
            <blockquote class="layui-elem-quote">Edit Student Score</blockquote>
            <div class="layui-row">
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="score_edit.php" method="post">

                        <div class="layui-form-item">
                            <label class="layui-form-label">Name</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" required autocomplete="off" placeholder="Please input name" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Subject</label>
                            <div class="layui-input-block">
                                <select name="km" lay-verify="required">
                                    <option value="" disabled selected>Please select a subject</option>
                                    <option value="Compiler Construction" <?php if ($result['km']=='Compiler Construction') { echo "selected"; }; ?>>Compiler Construction</option>
                                    <option value="Calculus" <?php if ($result['km']=='Calculus') { echo "selected"; }; ?>>Calculus</option>
                                    <option value="Data Structure" <?php if ($result['km']=='Data Structure') { echo "selected"; }; ?>>Data Structure</option>
                                    <option value="PHPWeb Programming" <?php if ($result['km']=='PHPWeb Programming') { echo "selected"; }; ?>>PHPWeb Programming</option>
                                    <option value="Computer Network" <?php if ($result['km']=='Computer Network') { echo "selected"; }; ?>>Computer Network</option>
                                    <option value="Compilation Principles" <?php if ($result['km']=='Compilation Principles') { echo "selected"; }; ?>>Compilation Principles</option>
                                    <option value="other" <?php if ($result['km']=='other') { echo "selected"; }; ?>>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Score</label>
                            <div class="layui-input-block">
                                <input type="text" name="score" id="score" value="<?php echo $result['score']; ?>" required autocomplete="off" placeholder="Please input score" class="layui-input">
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">Phone</label>
                            <div class="layui-input-block">
                                <input type="text" name="tel" value="<?php echo $result['tel']; ?>" required autocomplete="off" placeholder="Please input phone" class="layui-input">
                            </div>
                        </div>
                       
                        
                        <div class="layui-form-item">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <button class="layui-btn" type="submit">Edit</button>
                            <a href="agree_yuyue.php" class="layui-btn">Back to list</a>
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
    layui.use(['element', 'layer', 'laydate','form'],
        function() {
            var element = layui.element,
                layer = layui.layer,
                laydate = layui.laydate,
                form = layui.form,
                $ = layui.$;
            laydate.render({
                elem: '#pxdate' //Specify the element
              });
        });
</script>
</body>

</html>
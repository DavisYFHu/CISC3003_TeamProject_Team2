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

// Determine whether a modification form is submitted or not
if ($_POST) {
    // Receive form parameters
    $pxdate = $_POST['pxdate'];
    $teachers = $_POST['teachers'];
    $km = $_POST['km'];
    $sfzh = $_POST['sfzh'];
    $tel = $_POST['tel'];
    $name = $_POST['name'];
    // Assembly update sql statement
    $sql = "INSERT INTO yuyue(pxdate,teachers,km,sfzh,tel,name) VALUES ('{$pxdate}','{$teachers}','{$km}','{$sfzh}','{$tel}','{$name}')";
    // Execute sql
    $row = $pdo->exec($sql);
    // Determining Success
    if ($row) {
        echo "<script>alert('Booking successfully!');window.location.href='yuyue.php'</script>";
    } else {
        echo "<script>alert('Booking failed!');window.location.href='yuyue_add.php'</script>";
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
            <blockquote class="layui-elem-quote" style="margin-top: 15px;">Exam Booking</blockquote>
            <div class="layui-row">
                <div class="layui-col-md8 layui-col-md-offset1">
                    <form class="layui-form layui-form-pane" action="yuyue_add.php" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label">Time</label>
                            <div class="layui-input-block">
                                <input type="text" name="pxdate" id="pxdate" value="" required autocomplete="off" placeholder="Please select" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Teacher</label>
                            <div class="layui-input-block">
                                <select name="teachers" lay-verify="required">
                                    <option value="" disabled selected>Please select a teacher</option>
                                    <?php
                                    // sql query statement
                                        $sql = "select * from teachers";
                                        // Execute the query statement
                                        $state = $pdo->query($sql); 
                                        //Get all the data in the result set
                                        $res = $state->fetchAll(PDO::FETCH_ASSOC);
                                        // Loop over the result set to display it in a table
                                        foreach ($res as $key => $value) {
                                    ?>

                                        <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">Subjects</label>
                            <div class="layui-input-block">
                                <select name="km" lay-verify="required">
                                    <option value="" disabled selected>Please select a subject</option>
                                    <option value="Compiler Construction">Compiler Construction</option>
                                    <option value="Calculus">Calculus</option>
                                    <option value="Data Structure">Data Structure</option>
                                    <option value="PHPWeb Programming">PHPWeb Programming</option>
                                    <option value="Computer Network">Computer Network</option>
                                    <option value="Compilation Principles">Compilation Principles</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="layui-form-item">
                            <input type="hidden" name="name" value="<?php echo $_SESSION['name']; ?>">
                            <input type="hidden" name="tel" value="<?php echo $_SESSION['tel']; ?>">
                            <input type="hidden" name="sfzh" value="<?php echo $_SESSION['sfzh']; ?>">
                            <button class="layui-btn" type="submit">Submit</button>
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
    layui.use(['element', 'layer', 'laydate','form'],function() {
            var element = layui.element,
                layer = layui.layer,
                form = layui.form,
                laydate = layui.laydate,
                $ = layui.$;
          //Execute a laydate instance
              laydate.render({
                elem: '#pxdate' //Specify the element
              });
        });
</script>
</body>

</html>
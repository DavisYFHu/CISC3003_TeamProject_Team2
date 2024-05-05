<?php
error_reporting(0);
// start session·
session_start();
// Introducing the database link file
include '../conn.php';
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
        <div class="layui-container">
<form class="layui-form" action="scoresearch.php" method="post" style="">
    <div class="layui-col-md12" style="padding: 15px;border: 1px solid #ccc;">
        <div class="layui-form-item">
            <label class="layui-form-label">Exam Subject:</label>
            <div class="layui-input-block">
                <input type="text" name="keywords" required lay-verify="required" placeholder="Please input exam subject" maxlength="11"
                       autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" type="submit" lay-submit lay-filter="formDemo"><i class="layui-icon layui-icon-search" style="font-size: 10px; color: #fff;"></i>Search Score</button>
                <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
            </div>
        </div>
    </div>
</form>
    <table class="layui-table layui-table-hover">
        <tr>
            <td>Exam Subject</td>
            <td>Teacher</td>
            <td>Score</td>
            <td>Status</td>
        </tr>
        <?php
    $uid = $_SESSION['name'];
	$keywords=$_POST['keywords'];
	$sql="select * from score where km like '%".$keywords."%' AND name = '$uid'";
	$state = $pdo->query($sql);
    $res = $state->fetchAll(PDO::FETCH_ASSOC);
    $total = 0;
	foreach ($res as $key => $row) {
        $total++;
        ?>

<tr bgColor="#ffffff">
                    <td><?php echo $row['km']; ?></td>
					<td><?php echo $row['teachers']; ?></td>
					<td><?php echo $row['score']; ?></td>
					<td>
						<?php 
						if ($row['status'] == '0') {
							echo "<span style='color:red;font-weight:bold;padding: 0px 5px;border-radius: 4px;border: 1px solid red;background-color: #fff;'>Unconfirmed</span>";
						} else {
							echo "<span class='agree'>Confirmed</span>";
						}

					  ?>
					</td>


            </tr>
            <?php
        }
        if ($total == 0) {
            echo "No record";
        }
        ?>

    </table>
    </div>
    </div>
</div>
</body>
</html>

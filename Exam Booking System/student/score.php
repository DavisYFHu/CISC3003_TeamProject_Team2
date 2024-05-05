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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Exam Booking System</title>
    <link rel="stylesheet" href="../assets/css/layui.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <style>
	    .noagree{
			color:red;
			font-weight:bold;
			padding: 0px 5px;
		    border-radius: 4px;
		    border: 1px solid red;
		    background-color: #fff;
	    }
		.agree{
			color:green;
			font-weight:bold;
			padding: 0px 5px;
		    border-radius: 4px;
		    color: #458B00;
		    border: 1px solid #458B00;
		    background-color: #fff;
		}
	</style>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <?php include 'header.php'; ?>
    <div class="layui-side layui-bg-black">
        <?php include 'menu.php'; ?>
    </div>
    <div class="layui-body">
        <div class="layui-container">
        	<blockquote class="layui-elem-quote" style="margin-top: 15px;">My Scores</blockquote>
			<table class="layui-table">
			  <thead>
			    <tr>
			      <th style="text-align: center;">Exam Subject</th>
			      <th style="text-align: center;">Teacher</th>
			      <th style="text-align: center;">Scores</th>
			      <th style="text-align: center;">Status</th>
			    </tr> 
			  </thead>
			  <tbody>

				<?php
				// sql query statement
					$uid = $_SESSION['name'];
					$sql = "select * from score where name = '$uid'";
					// Execute the query statement
					// query executes a SQL statement, and if it passes, it returns a PDOStatement object, 
					//which can be traversed directly in the returned record set (query is used for select).
			        $state = $pdo->query($sql); 
			        //Get all the data in the result set
			        $res = $state->fetchAll(PDO::FETCH_ASSOC);
			        // Loop over the result set to display it in a table
			        foreach ($res as $key => $value) {
				?>

				<tr align="center">
					<td><?php echo $value['km']; ?></td>
					<td><?php echo $value['teachers']; ?></td>
					<td><?php echo $value['score']; ?></td>
					<td>
						<?php 
						if ($value['status'] == '0') {
							echo "<span style='color:red;font-weight:bold;padding: 0px 5px;border-radius: 4px;border: 1px solid red;background-color: #fff;'>Unconfirmed</span>";
						} else {
							echo "<span class='agree'>Confirmed</span>";
						}

					  ?>
					</td>
				</tr>
				<?php
					// loop end
					}
				?>
			  </tbody>
			</table>
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
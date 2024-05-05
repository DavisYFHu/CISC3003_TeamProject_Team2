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
        	<blockquote class="layui-elem-quote" style="margin-top: 15px;">Student Score Information</blockquote>
			<table class="layui-table">
			  <thead>
			    <tr>
			      <th style="text-align: center;">Student Name</th>
			      <th style="text-align: center;">Subject</th>
			      <th style="text-align: center;">Score</th>
			      <th style="text-align: center;">Student Phone</th>
			      <th style="text-align: center;">Status</th>
			      <th style="text-align: center;">Vetting</th>
			      <th style="text-align: center;">Opearion</th>
			    </tr> 
			  </thead>
			  <tbody>

				<?php
					$name = $_SESSION["username"];
					//Total number of queries
					$sql1 = "SELECT COUNT(*) FROM score where teachers = '$name'";
					$count = $pdo -> query($sql1) -> fetchColumn();
					// Current page
					$page = isset($_GET['page']) ? $_GET['page'] : 1;
					//Number of items per page
					$size = 9;
					//Total pages (end pages)
					$last = ceil($count/$size);
					// Previous page
					$prev_page = $page - 1 < 1 ? 1 : $page - 1;
					//Next page
					$next_page = $page + 1 > $last ? $last : $page + 1;
					// offset
					$offset = ($page - 1) * $size;
					// sql query statement
					$sql = "select * from score where teachers = '$name' limit $offset,$size";
					// Execute the query statement
					// query executes a SQL statement, and if it passes, it returns a PDOStatement object, 
					// which can be traversed directly in the returned record set (query is used for select).
			        $state = $pdo->query($sql); 
			        //Get all the data in the result set
			        $res = $state->fetchAll(PDO::FETCH_ASSOC);
			        // Loop over the result set to display it in a table
			        foreach ($res as $key => $value) {
				?>

				<tr align="center">
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['km']; ?></td>
					<td><?php echo $value['score']; ?></td>
					<td><?php echo $value['tel']; ?></td>
					<td>
						<?php 
						if ($value['status'] == 0) {
							echo "<span class='noagree'>Unconfirmed</span>";
						} else {
							echo "<span class='agree'>Confirmed</span>";
						}

					  ?>
					</td>
					<td>
						<?php
							if ($value['status'] == 0) {

								echo "<a class='layui-btn layui-btn-warm layui-btn-xs' href=qr.php?id="
								.$value["id"].">Confirm</a>";
							} else {
								echo "<a class='layui-btn layui-btn-warm layui-btn-xs' href='javascript:;' style='cursor:not-allowed;'>Confirm</a>";
							}
						?>
					</td>
					<td>
						<a class="layui-btn layui-btn-sm" href="score_edit.php?id=<?php echo $value['id']; ?>">Edit<i class="layui-icon">&#xe642;</i></a>
						<a class="layui-btn layui-btn-primary layui-btn-sm" onclick="return confirm('Confirm Delete?');" href="score_del.php?id=<?php echo $value['id']; ?>">Delete<i class="layui-icon">&#xe640;</i></a>
					</td>
				</tr>
				<?php
					// loop end
					}
				?>
				<tr>
					<td colspan="7">
						<a href="score_list.php?page=<?php echo 1?>">Home Page</a>&nbsp;&nbsp;
					    <a href="score_list.php?page=<?php echo $prev_page?>">Prev Page</a>&nbsp;&nbsp;
					    <a href="score_list.php?page=<?php echo $next_page?>">Next Page</a>&nbsp;&nbsp;
					    <a href="score_list.php?page=<?php echo $last?>">End Page</a>&nbsp;&nbsp;
					</td>
				</tr>
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
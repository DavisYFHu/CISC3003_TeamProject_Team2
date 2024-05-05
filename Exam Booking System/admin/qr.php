<?php 
// Confirmation of Candidates' Results
// Introducing database connection files
include '../conn.php';
// Receive the id of the desired data
$id = $_GET['id'];
// Assembling sql statements
$sql = "UPDATE score SET status=1 WHERE id=$id";
// fulfillment
$row = $pdo->exec($sql);
if ($row) {
	echo "<script>alert('Confirm Successfully！');window.location.href='score_list.php'</script>";
} else {
	echo "<script>alert('Confirm Failed！');window.location.href='score_list.php'</script>";
}
?>
<?php 
// Deletion of Candidate Results
// Introducing database connection files
include '../conn.php';
// Receive the id of the data to be deleted
$id = $_GET['id'];
// Assembling delete sql statements
$sql = "DELETE FROM score WHERE id=$id";
// Perform deletion
$row = $pdo->exec($sql);
if ($row) {
	echo "<script>alert('Delete Successfully！');window.location.href='score_list.php'</script>";
} else {
	echo "<script>alert('Delete Failed！');window.location.href='score_list.php'</script>";
}
?>
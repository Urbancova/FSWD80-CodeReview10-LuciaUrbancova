<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'cr10_lucia_urbancova_biglibrary') or die (mysqli_error($mysqli));

$author_id = 0;
$update = false;

$first_name = '';
$last_name = '';
$title = '';
$type = '';
$publish_date = '';
$publisher = '';
$ISBN = '';

if (isset($_POST['save'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$publish_date = $_POST['publish_date'];
	$publisher = $_POST['publisher'];
	$ISBN = $_POST['ISBN'];


	$mysqli->query("INSERT INTO author (first_name, last_name, title, type, publish_date, publisher, ISBN) VALUES ('$first_name','$last_name','$title', '$type', '$publish_date', '$publisher','$ISBN')") or die($mysqli->error); 

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: index.php");

}

if (isset($_GET['delete'])){
	$author_id = $_GET['delete'];
	$mysqli->query("DELETE FROM author WHERE author_id=$author_id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if (isset($_GET['edit'])) {
	$author_id = $_GET['edit'];

	$update = true;

	$result = $mysqli->query("SELECT * FROM author WHERE author_id=$author_id") or die($mysqli->error());
	if(count($result)==1){
		$row = $result->fetch_array();
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$title = $row['title'];
		$type = $row['type'];
		$publish_date = $row['publish_date'];
		$publisher = $row['publisher'];
		$ISBN = $row['ISBN'];
	}

}

if (isset($_POST['update'])){
	$author_id = $_POST['author_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$publish_date = $_POST['publish_date'];
	$publisher = $_POST['publisher'];
	$ISBN = $_POST['ISBN'];

	$mysqli->query("UPDATE author SET first_name='$first_name', last_name='$last_name', title='$title', type='$type', publish_date='$publish_date', publisher='$publisher', ISBN='$ISBN' WHERE author_id='$author_id'") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php");

}
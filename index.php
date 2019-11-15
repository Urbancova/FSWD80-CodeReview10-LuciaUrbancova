<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP-CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php 

	if(isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">

		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>	
		
	<!-- <div class="container"> -->


	<?php
	$mysqli = new mysqli('localhost', 'root', '', 'cr10_lucia_urbancova_biglibrary') or die (mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM author") or die($mysqli->error);
	// pre_r($result);

	// pre_r($result->fetch_assoc());	//if create a while loop on pre_r($result->fetch_assoc());, it will keep fetching the records from the database
	?>

	<div class="row justify-content-center p-5">
		<table class="table">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Title</th>
					<th>Type</th>
					<th>Date</th>
					<th>Publisher</th>
					<th>ISBN</th>
					<<th colspan="2">Action</th>
				</tr>
			</thead>
	<?php 
		while ($row = $result->fetch_assoc()): ?>
			<tr>
				<td><?php echo $row['first_name']; ?></td>
				<td><?php echo $row['last_name']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['publish_date']; ?></td>
				<td><?php echo $row['publisher']; ?></td>
				<td><?php echo $row['ISBN']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['author_id']; ?>" class="btn btn-info">Edit</a>
					<a href="process.php?delete=<?php echo $row['author_id']; ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endwhile; ?>
			
		</table>


	</div>

	<?php

	function pre_r( $array ) {   //to pull these data from the object use fetch_assoc
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

	?>

	<div class="row justify-content-center p-5">
	<form action="process.php" method="POST">
		<input type="hidden" name="author_id" value="<?php echo $author_id; ?>">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Author's first name</label>
				<input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
			</div>
			<div class="form-group col-md-6">
				<label>Author's last name</label>
				<input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
			</div>
			<div class="form-group col-md-6">
				<label>Title of the media</label>
				<input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
			</div>
			<div class="form-group col-md-6">
				<label>Type of media</label>
				<input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
			</div>
		</div>	
		<div class="form-row">	
			<div class="form-group col-md-4">
				<label>Date of publishing</label>
				<input type="text" name="publish_date" class="form-control" value="<?php echo $publish_date; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Publisher</label>
				<input type="text" name="publisher" class="form-control" value="<?php echo $publisher; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>ISBN</label>
				<input type="text" name="ISBN" class="form-control" value="<?php echo $ISBN; ?>">
			</div>
		</div>	
			<div class="form-group">
			<?php
			if ($update == true):
			?>
				<button type="submit" name="update" class="btn btn-info">Update</button>
			<?php else : ?>
				<button type="submit" name="save" class="btn btn-primary">Insert</button>
			<?php endif; ?>
			</div>
	</form>
	</div>
	
</body>
</html>
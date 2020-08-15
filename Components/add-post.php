<!DOCTYPE html>
<html>
<head>
	<title>Add post</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	 
	 <style>
	 	

	 </style>
</head>
	<body>

		<?php

			$user_id = $_GET['u_id'];
			include "../include/connection.php" ;
			session_start();
		?>

		
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<form action="save-post.php" method="post" enctype="multipart/form-data">
						<div class="add-post-box">
							<div class="user-id-box" hidden>
								<input type="text" name="user-id" value="<?php echo $user_id ?>">
							</div>
							<div class="add-post-title">
								<label>Caption</label>
								<input type="text" name="post-title" value="" required>
							</div>
							<div class="add-post-pic">
								<label>Choose photo</label>
								<input type="file" name="post-pic" required>
							</div>
							<button class="btn btn-outline-primary" type="submit" name="add-post">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	
	</body>
</html>
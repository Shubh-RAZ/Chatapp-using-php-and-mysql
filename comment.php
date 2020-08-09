<?php
	
	include "include/connection.php";
	session_start();
	$p_id = $_GET['p-id'];
	$u_id = $_GET['u-id'];
	$type = $_GET['t'];


	$sql = "select * from mythought where topic_id = $p_id";
	$result = mysqli_query($con , $sql) or die("failed");
	while($row=mysqli_fetch_assoc($result)){

		$content = $row['topic_content'];
		$pic = $row['topic_content'];

		if($type==''){
		echo "<div class='container'>
				<div class='col-md-3'></div>
					<div class='col-md-6'>
						<div class='post'>
							$content
						</div>
					</div>
				
			</div>";
		}
		else{
			echo "<div class='container'>
				<div class='col-md-3'></div>
					<div class='col-md-6'>
						<div class='post'>
							<img src='../new/upload/$pic'>
						</div>
					</div>
				
			</div>";

		}
	}
?>

		<div class="container">
				<div class="col-md-3"></div>
					<div class="col-md-6">
						<form action="save-comment.php" method="post">
						<div class="hidden" hidden>
							<input name="u-id" value = "<?php echo $u_id ;?>">
							<input name="p-id" value = "<?php echo $p_id ; ?>">
							<input name="t" value = "<?php echo $type ; ?>">
						</div>
							<div class="add-comment">
								<label>Add your comment</label>
								<input type="type" name="comment">
							</div>
							<div class="add-comment-btn">
								<button class="btn btn-outline-primary" type="submit" name="add-com-btn">Add</button>
							</div>
						</form>
					</div>
			</div>

	<?php 

		$sql1 = "select * from comments where post_id = $p_id";
		$result1 = mysqli_query($con , $sql1) or die("failed 1");
			while($row1=mysqli_fetch_assoc($result1)){

				$com = $row1['comment'];
				$user_id = $row1['user_id'];
				$date = $row1['comment_date'];

				$sql2 = "select * from users where user_id = $user_id";
				$result2 = mysqli_query($con , $sql2) or die("failed 2");
					while($row2=mysqli_fetch_assoc($result2)){

						$user_name = $row2['user_name'];


				echo "<div class='container'>
						<div class='col-md-3'></div>
						<p>$user_name</p>
						<p>$date</p>
						<div class='col-md-6'>
							$com
						</div>
					  </div>";

					}

			}

	?>



	

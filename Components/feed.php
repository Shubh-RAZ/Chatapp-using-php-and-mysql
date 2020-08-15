<?php 

    include("../include/connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Feed</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<style>
		.status-list{
			list-style: none;
		}
		.statusBar{
			border: 2px  solid black;
		}
		.add-sts-btn{
			width: 100%;

		}
		.add-btn{
			margin-top: 1%;
			margin-bottom: 1%;
		}
		.post-wrapper{
			border: 1px  solid black;			
		}
		.users-info{
			display: inline-flex;
		}

	</style>
</head>

	<body>
				

		<div class="container">
			<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6 statusBar">
						<form method="post">
							<input type="text" name="id" value="<?php echo $_GET['u_id']?>" hidden>
							<label>Add something...</label><br>
							<input type="text" name="topicName" value="" style="width: 100%" placeholder="topic"><br><br>
								<div class="writingArea">
									<textarea type="text" name="topicContent" style="width: 100%" rows="4" placeholder="write something..."></textarea>
								</div>
								<div class="add-btn">
									<button class="btn btn-outline-info add-sts-btn" name="submit">Add</button>
								</div>
						</form>
					</div>
			</div>
		</div>
	
			<?php

				$u_id = $_GET['u_id'];
				$select = "select * from mythought order by 1 desc";
				$query = mysqli_query($con , $select) or die("failed");
				while($result = mysqli_fetch_array($query)){
					$user_id = $result['user_id'];
					$topic = $result['topic_name'];
					$type = $result['type'];
					$pic = $result['topic_content'];
					$content = $result['topic_content'];
					$date = $result['topic_date'];
					$post_id = $result ['topic_id'];

					$sql ="select * from users where user_id ='$user_id'";
					$query1 = mysqli_query($con , $sql) or die("sql querry failed");
					while($result1 = mysqli_fetch_array($query1)){
						$user_name  = $result1['user_name'];
					}


			?>			
					<div class="container">
						<div class="row">
							<div class="col-md-3"></div>
								<div class="post-wrapper col-md-6">

						<?php	

							 if($type==''){
								echo "
									<li class='status-list'>
										<div class='container'>
											<div class='row'>
												<div class='col-md-3'></div>
												<div class='col-md-6'>
													<div class='users-info'> 
														<div class='user-name'>$user_name &nbsp</div>
														<div class='date'>$date</div>
													</div>
													<div class='all-feed'>
														 <div>$topic</div>
														 <div>$content</div>
													</div>
												</div>
											</div>
										</div>
									</li>";

									echo "<div><a href='comment.php?u-id=$u_id&&p-id=$post_id&&t=$type'>comment</a></div>";

							}


							if($type){

								echo "	<li class='status-list'>
										<div class='container'>
											<div class='row'>
												<div class='col-md-3'></div>
												<div class='col-md-6'>
													<div class='users-info'> 
														<div class='user-name'>$user_name &nbsp</div>
														<div class='date'>$date</div>
													</div>
													<div class='all-feed'>
														 <div>$topic</div>
														 <div>
															<img src='../new/upload/$pic' >
														 </div>
													</div>
												</div>
											</div>
										</div>
									</li>
								";
									echo "<div><a href='comment.php?u-id=$u_id&&p-id=$post_id&&t=$type'>comment</a></div>";
							}
						?>

						</div>

					</div>

				</div>		

				<?php

					}

				 ?>


			<?php 

				if(isset($_POST['submit'])){
		    		$user_id=htmlentities(mysqli_real_escape_string($con , $_GET['u_id']));
		    		$get_user = "select * from users where user_id = '$user_id' ";
		    		$run_query = mysqli_query ( $con , $get_user);
		    		$row = mysqli_fetch_array ($run_query);


		    		$topic_name = $_POST['topicName'];
		    		$topic_content = $_POST['topicContent'];

		    		if($topic_content==''){
		    			echo "<script>alert('Write something')</script>";
		    			echo "<script>window.open('feed.php?u_id=$user_id','_self')</script>";
		    		}

		    		else{
		    			
			    		$update = "insert into mythought (user_id, topic_name , topic_content , topic_date) values ('$user_id','$topic_name' , '$topic_content',NOW())";
			    		$query = mysqli_query($con,$update);


				    	if($query){
					    			echo "<script>alert('Status Added')</script>";
			    			echo "<script>window.open('feed.php?u_id=$user_id','_self')</script>";
			    		}

			    		else{
			    			echo "<script>alert('Can't update ,Please try later!)</script>";
				    	}

		    		}

				}
			?>

	</body>
</html>
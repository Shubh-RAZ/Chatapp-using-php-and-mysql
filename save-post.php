<?php

			if(isset($_POST['add-post'])){
			include "include/connection.php";
			 
			

				$error = array();

				$filename = $_FILES['post-pic']['name'];
				$filesize = $_FILES['post-pic']['size'];
				$filetmp = $_FILES['post-pic']['tmp_name'];
				$filetype = $_FILES['post-pic']['type'];
				$fileext = end(explode('.',$filename));
				$extentions = array("jpeg" , "jpg" , "png");


				if(in_array($fileext,$extentions)== false){
					$error[] = "This file is not allowed please choose a jpg , jpeg or png file";
				}

				if($filesize>2097152){
					$error[] = "File size should be less than 2mb";
				}

				if(empty($error)== true){
					move_uploaded_file($filetmp, "upload/".$filename );
				}

				else{
					print_r($error);
					die();
				}

				$post_title = $_POST['post-title'];
				$user_id = $_POST['user-id'];

				$sql = "insert into mythought ( user_id , topic_name , topic_content , topic_date,type) values ('$user_id','$post_title ','$filename',NOW(),'$fileext')";
				$result = mysqli_query($con , $sql) or die("query failed");

				if($result){
					echo "<script>window.open('feed.php?u_id=$u_id' , '_self' )</script>";
					echo "<script>alert('new post added')</script>";
				}
			}else{
				echo "can't add posts now.Try later!";
			}

		?>
<?php 
include "include/connect.php";

if (isset($_POST['post'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$image = $_FILES['image']['name'];
	$temp_image = $_FILES['image']['tmp_name'];

	move_uploaded_file($temp_image,"images/$image");

	$insert_sql = "insert into `post` (post_title,post_content,post_image,create_date)values
	('$title','$content','$image',NOW())";
	$insert_result = mysqli_query($con,$insert_sql);
	if ($insert_result) {
		echo "post created";
	}else{
		die(mysqli_error($con));
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>create a post</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<div class="post-element">		
		<label>Title</label>
		<input type="text" name="title" placeholder="post title">
		<input type="file" name="image">
		<textarea rows="20" cols="30" name="content" placeholder="write a post..."></textarea>
		<input type="submit" id="post" name="post" value="post">
		</div>

	</form>

</body>
</html>
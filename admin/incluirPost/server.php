<?php 
	// connect to database
	$db = mysqli_connect("localhost", "root", "andersom11", "netrix");

	// retrieve posts from database
	//$result = mysqli_query($db, "SELECT * FROM tab_posts");
	//$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

/*
// if 'upload image' buttton is clicked
if (isset($_POST['uploading_file'])) {
	// Get image name
  	$image = $_FILES['post_image']['name'];

  	// image file directory
  	$target = "images/" . basename($image);

  	if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target)) {
  		echo "http://localhost/ckeditor-images/" . $target;
  		exit();
  	}else{
  		echo "Failed to upload image";
  		exit();
  	}
}*/

// if form save button is clicked, save post in the database
if (isset($_POST['enviado'])) {

	$title = mysqli_real_escape_string($db, $_POST['title']);
	$body = htmlentities(mysqli_real_escape_string($db, $_POST['body']));

	$sql = "INSERT INTO `tab_posts` (`title`, `body`, `post_user`, `post_user_edicao`, `post_data`) ";
	$sql.= "VALUES ('".$title."', '".$body."', '".$_SESSION['id']."', '', CURRENT_TIMESTAMP )";

	mysqli_query($db, $sql);
	//header("location: index.php?go=IncluirPostagem");


	$sucesso= '	<div class="col-12 col-md-10 col-lg-10 offset-md-1 offset-lg-1 p-2">';
	$sucesso.='		<div class="alert alert-success alert-dismissible fade show" role="alert">';
	$sucesso.='			<strong>Sucesso!</strong> A Noticia "'.$title.'" foi inserida no sistema.';
	$sucesso.='			<button type="button" class="close btn" data-dismiss="alert" aria-label="Close">';
	$sucesso.='				<span aria-hidden="true">×</span>';
	$sucesso.='			</button>';
	$sucesso.='		</div>';
	$sucesso.='	</div>';


	//var_dump($sql);
	echo $sucesso;
}
?>
<?php 
if (isset($_GET['idnoticia'])) {
	$post=pegaNoticia($_GET['idnoticia']);

//	var_dump($post);
}

?>
<div class="row no-gutters"> <!-- row -->
	<div class="col-12 col-md-6 col-lg-12 p-2"> <!-- col -->
		<div class="card">
			<div class="card-header bg-white">
				<h3><?php echo $post["title"]; ?></h3>
			</div>
			<div class="card-body">
				<p><?php echo html_entity_decode($post['body']); ?></p>
				<p><small><?php echo "Por ".pegaUsuario($post['post_user'])." a ".tempo_corrido($post['post_data']) ?></small></p>
			</div>
		</div>
	</div>
</div>
<?php

//fetch_user.php

include('../chat/database_connection.php');
include('../functions.php');

session_start();

$query = "
SELECT * FROM tab_usuario
WHERE id != '".$_SESSION['id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '<div class="list-group list-group-flush list-group-search border-bottom scroll" style="max-height: 520px;">';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['id'], $connect);

	if($user_last_activity > $current_timestamp){
		$status = 'online';
	}else{
		$status = 'offline';
	}

	$output.= '	<a href="#" class="list-group-item list-group-item-action start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['nome'].'">';
	$output.= '		<div class="media">';
	//$output.= '			<img class="mr-3 img-fluid h-35px rounded-circle" src="http://localhost:8090/help_int/images/avatar/image-1.png" alt="Generic placeholder image">';
	$output.= '			<img class="mr-3 img-fluid h-35px rounded-circle" src="user_img/thumb-'.pegaFoto($row['id']).'" alt="Generic placeholder image">';
	$output.= '			<div class="status-user-notification status-user-'.$status.'"></div>';
	$output.= '			<div class="media-body d-flex justify-content-between align-items-center align-self-center">';
	$output.= '				<div class="mt-0">'.$row['nome'].' '.fetch_is_type_status($row['id'], $connect).'</div>';
	$output.= '				<div class="d-flex flex-column"><small>09:22</small>';
	$output.= '					'.count_unseen_message($row['id'], $_SESSION['id'], $connect);
	$output.= '				</div>';
	$output.= '			</div>';
	$output.= '		</div>';
	$output.= '	</a>';

}

$output.= '</div>';

echo $output;

?>
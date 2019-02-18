<?php

//fetch_user.php

include('../chat/database_connection.php');
include_once('../functions.php');

session_start();

$query = "
SELECT * FROM tab_usuario
WHERE id != '".$_SESSION['id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output2 = '<div class="row">';

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
/*
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
*/
$output2.= '<div class="col-sm-12 col-md-6 col-lg-4 p-3">';
$output2.= '  <div class="card mb-3 shadow-1 border-0 rounded-0">';
$output2.= '    <div class="card-avatar">';
//$output2.= '    <img class="card-img-top rounded-0" src="../../../images/bg-sidebar.jpg" alt="Card image cap" style="height: 180px;">';
$output2.= '    <div class="card-body-top p-2">';
$output2.= '      <img class="card-img-avatar-left" src="user_img/thumb-'.pegaFoto($row['id']).'" style="height: 100px; width: 100px;">';
$output2.= '      <div class="card-avatar-body">';
$output2.= '        <b class="card-title">'.$row['nome'].'</b>';
$output2.= '        <div class="card-text">Web Developer</div>';
$output2.= '      </div>';
$output2.= '    </div>';
$output2.= '    </div>';
$output2.= '      <ul class="list-group list-group-flush">';
$output2.= '        <li class="list-group-item d-flex align-items-center"><span class="bg-primary rounded-circle text-white p-2 mr-4">CPF</span><div>'.$row['nome'].'</div></li>';
$output2.= '        <li class="list-group-item d-flex align-items-center"><span class=bg-primary rounded-circle text-white p-2 mr-4">Super</span> <div>'.$row['nome'].'</div></li>';
$output2.= '        <li class="list-group-item d-flex align-items-center text-wrap"><span class="gg-icon material-icons bg-primary rounded-circle text-white p-2 mr-4">'.$row['email'].'</li>';
$output2.= '      </ul>';
$output2.= '  </div>';
$output2.= '</div>';

}

$output2.= '</div>';

echo $output2;






?>
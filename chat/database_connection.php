<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=netrix;charset=utf8mb4", "root", "andersom11");

date_default_timezone_set('America/Sao_Paulo');

function tempoExibe($time) { // mostra tempo da postagem de forma amigável
date_default_timezone_set('America/Sao_Paulo');
$now = strtotime(date('m/d/Y H:i:s'));
	$time = strtotime($time);
	$diff = $now - $time;
	$seconds = $diff;
	$minutes = round($diff / 60);
	$hours = round($diff / 3600);
	$days = round($diff / 86400);
	$weeks = round($diff / 604800);
	$months = round($diff / 2419200);
	$years = round($diff / 29030400);
	if ($seconds <= 60) return "Agora pouco";
	else if ($minutes <= 60) return $minutes==1 ?'1 minuto atrás':$minutes.' minutos atrás';
	else if ($hours <= 24) return $hours==1 ?'1 hora atrás':$hours.' horas atrás';
	else if ($days <= 7) return $days==1 ?'1 dia atras':$days.' dias atrás';
	else if ($weeks <= 4) return $weeks==1 ?'1 semana atrás':$weeks.' semanas atrás';
	else if ($months <= 12) return $months == 1 ?'1 mês atrás':$months.' meses atrás';
	else return $years == 1 ? 'um ano atrás':$years.' anos atrás';
}

function fetch_user_last_activity($user_id, $connect){
	$query = "
	SELECT * FROM login_details 
	WHERE user_id = '$user_id' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row){
		return $row['last_activity'];
	}
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect){
	$query = "
	SELECT * FROM chat_message 
	WHERE (from_user_id = '".$from_user_id."' 
	AND to_user_id = '".$to_user_id."') 
	OR (from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."') 
	ORDER BY timestamp ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();/*
	$output = '<ul class="list-unstyled">';*/
	$output = '';
	foreach($result as $row)
	{
		$user_name = '';
		if($row["from_user_id"] == $from_user_id)
		{
			$output.= '	<div class="media mb-2">
							<div class="media-body ml-50px">
								<div class="bg-primary text-white p-1 rounded d-inline-block float-right">'.$row["chat_message"].'
									<small class="d-block text-right text-opc_5">'.tempoExibe($row['timestamp']).'</small>
								</div>
							</div>
						</div>';
		}
		else
		{
			//$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$output.= '	<div class="media mb-2"> <!-- right -->
							<div class="media-body mr-50px">
								<div class="bg-opc p-1 rounded d-inline-block">'.$row["chat_message"].'
									<small class="d-block text-right text-muted">'.tempoExibe($row['timestamp']).'</small>
								</div>
							</div>
						</div>';
		}
		/* $output .= '
		<li style="border-bottom:1px dotted #ccc">
			<p>'.$user_name.' - '.$row["chat_message"].'
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		'; */

		
	}
	//$output .= '</ul>';

	$query = "
	UPDATE chat_message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT nome FROM tab_usuario WHERE id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['nome'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if($count > 0)
	{
		$output = '<span class="badge badge-pill badge-primary ml-2">'.$count.'</span>';
	}
	return $output;
}

function fetch_is_type_status($user_id, $connect)
{
	$query = "
	SELECT is_type FROM login_details 
	WHERE user_id = '".$user_id."' 
	ORDER BY last_activity DESC 
	LIMIT 1
	";	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		if($row["is_type"] == 'yes')
		{
			$output = ' - <small><em><span class="text-muted">Escrevendo...</span></em></small>';
		}
	}
	return $output;
}

function fetch_group_chat_history($connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE to_user_id = '0'  
	ORDER BY timestamp DESC
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		if($row["from_user_id"] == $_SESSION["id"])
		{
			$user_name = '<b class="text-success">You</b>';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
		}

		$output .= '

		<li style="border-bottom:1px dotted #ccc">
			<p>'.$user_name.' - '.$row['chat_message'].' 
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	return $output;
}


?>
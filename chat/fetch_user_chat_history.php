<?php

//fetch_user_chat_history.php

include('../c3/database_connection.php');

session_start();

echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id'], $connect);

?>
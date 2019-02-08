<?
//include 'cnn.php';

switch(@$_REQUEST['go']) 
{
//---------------------------------------------------------------------------------------------
//--------------------------------Paginas Administrativas--------------------------------------
//---------------------------------------------------------------------------------------------
	
	case 'CriarUsuario':		include 'admin/makeuser.php'; 			break;
	case 'IncluirPostagem':		include 'admin/incluirPost.php'; 		break;
	case 'versessaousuario':	include 'admin/sessionvw.php';			break;

	case 'testchat':	include '../c3/teste.php';			break;

	default: 				include 'pages/404.php';				break;
}

?>
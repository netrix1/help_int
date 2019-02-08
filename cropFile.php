<?php
require_once 'config.php';
require_once 'functions.php';

if (empty($_POST))
    exit(header('Location: ../recorte_de_imagens/'));
else {
    sleep(1);
    $fileType = $_POST['imgType'];
    $imgName  = $_POST['imgName'];
    define('OUTPUT', PASTA_UP_FOTO_REC. '/thumb-' . $imgName);
    if ($fileType == 'image/png')
        $img = imagecreatefrompng(PASTA_UP_FOTO.'/Original-' . $imgName);
    else
        $img = imagecreatefromjpeg(PASTA_UP_FOTO.'/Original-' . $imgName);
    
    $imgWidth  = imagesx($img);
    $imgHeight = imagesy($img);
    
    $newImage = imagecreatetruecolor(160, 160);
    imagecopyresampled($newImage, $img, 0, 0, $_POST['x'], $_POST['y'], 160, 160, $_POST['w'], $_POST['h']);
    if ($fileType == 'image/png'){
        $finalImage = imagepng($newImage, OUTPUT);
    }
    else{
        $finalImage = imagejpeg($newImage, OUTPUT);
    }
    if ($finalImage){
        //echo 'Imagem criada com sucesso<img id="thumbnail" src="' . OUTPUT . '" />';
        echo '<input type="hidden" id="foto" name="foto" value="'.$imgName.'">';
        echo '  <div class="info-box-3 shadow-1 bg-blue">
                    <div class="info-box-icon ">
                        <!--i class="gg-icon material-icons">cloud_upload</i-->
                        <img src="' . OUTPUT . '" class="rounded-circle img-avatar-header" style="height: 100%; width: auto;">
                    </div>
                    <div class="info-box-body">
                        <div class="info-box-subtitle">Sucesso!</div>
                        <div class="info-box-title">A Foto do Usuário foi anexada.</div>
                    </div>
                </div>';
    }else{
        echo 'Ocorreu um erro ao tentar criar a nova imagem';
        echo '<input type="hidden" id="foto" name="foto" value="">';
    }
}       
?>
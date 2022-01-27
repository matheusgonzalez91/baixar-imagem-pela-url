<?php
//Verificando se existe: downloadBtn
if(isset($_POST['downloadBtn'])){
    //Verificando se existe: file
    $getURL = $_POST['file'];
    $regPattern = '/\.(jpe?g|png|gif|bmp)$/i';
    //Pesquisando as strings com preg_match
    if(preg_match($regPattern, $getURL)){
        //Iniciando a requisão da url com curl_init
        $initCURL = curl_init($getURL);
        //Definindo os parâmetro da requisição
        curl_setopt($initCURL, CURLOPT_RETURNTRANSFER, true);
        //Executando a requisição
        $downloadImgLink = curl_exec($initCURL);
        curl_close($initCURL);
        //Definindo cabeçalho HTPP
        header('Content-type: image/jpg');
        header('Content-Disposition: attachment;filename="image.jpg"');
        echo $downloadImgLink;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="preview-box">
            <div class="cancel-icon"><i class="far fa-window-close"></i></div>
            <div class="img-preview"></div>
            <div class="content">
                <div class="img-icon"><i class="fas fa-images"></i></div>
                <div class="text">Cole a URL abaixo e faça o download :)</div>
            </div>
        </div>
        <form action="index.php" method="POST" class="input-data">
            <input type="text" id="field" name="file" placeholder="Cole a URL da imagem..." autocomplete="off">
            <input type="submit" id="button" name="downloadBtn" value="Download">
        </form>
    </div>
    
    <script src="./app.js"></script>
</body>
</html>

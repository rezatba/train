<?php
require_once 'configFiles.php';
require_once 'DirectoryFiles.php';
if (isset($_GET['path']) && !empty($_GET['path'])){
    $path = ROOT_PATH . OS . str_replace(["../","./"],'',$_GET['path']);
    //$path = ROOT_PATH . OS . $_GET['path'];
    $backPath = dirname($_GET['path']);
}else{
    $path = ROOT_PATH;
}
$files = DirectoryFiles::getFileLists($path);
/*echo "<pre>";
var_dump($files); //Show all Files
echo "</pre>";*/
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Directory of Projects</title>
</head>
<body>
<main>
    <h1>Train File Manager(TFM)</h1>
    <ul>
        <?php
        if (isset($backPath) and !empty($backPath)){
        ?>
            <li>
                <i>
                    <img class="icons" src="img/back.png" alt="back">
                    <a href="<?= URL . "?path=" . $backPath ?>" class="folder-item">Tops</a>
                </i>
            </li>
        <?php
        }
            if (isset($files) and count($files) > 0){
                foreach ($files as $item){
                    echo "<li>";
                    if ($item['is_folder']){
        ?>
                            <img class="icons" src="img/folder.png" alt="folder">
                            <a href="<?= URL . "?path=" . $item['relative_path']?>" class="icons"><?= $item['title'] ?></a>
                        </li>
        <?php
                    }else{
        ?>
                            <img class="icons" src="<?= $item['path_icon'] ?>" alt="file">
                            <a href="<?= URL . "?path=" . $item['relative_path']?>" class="icons"><?= $item['title'] ?></a>
                        </li>
        <?php
                    }
                }

            }else{
                echo "<li>It's empty...!</li>";
            }
        ?>
    </ul>
</main>
</body>
</html>
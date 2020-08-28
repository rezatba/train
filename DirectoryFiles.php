<?php


class DirectoryFiles
{
    public static function getFileLists($path)
    {
        $out = array();
        if (!empty($path) and is_dir($path)){
            $files = scandir($path);
            array_shift($files);
            array_shift($files);
            foreach ($files as $item) {
                $info = [];
                if (is_dir($path . OS . $item)){
                    $info['title'] = $item;
                    $info['is_folder'] = true;
                    $info['path'] = ROOT_PATH . OS . $item;
                    $info['path_icon'] = URL . 'img/folder.png';
                    $info['relative_path'] = substr($path . OS . $item, strlen(ROOT_PATH) + 1);
                }else{
                    $info['title'] = $item;
                    $info['is_folder'] = false;
                    $info['path'] = ROOT_PATH . OS . $item;
                    //$info['path_icon'] = URL . 'img/file.png'; //If i want that all files show with similar icon, write this code
                    $info['extension'] = pathinfo(ROOT_PATH . OS . $item , PATHINFO_EXTENSION);
                    switch ($info['extension']){
                        case "php":
                            $info['path_icon'] = URL . 'img/php.png';
                            break;
                        case "css":
                            $info['path_icon'] = URL . 'img/css.png';
                            break;
                        case "html":
                            $info['path_icon'] = URL . 'img/html.png';
                            break;
                        case "js":
                            $info['path_icon'] = URL . 'img/js.png';
                            break;
                        case "png":
                            $info['path_icon'] = URL . 'img/png.png';
                            break;
                        case "jpg":
                            $info['path_icon'] = URL . 'img/jpg.png';
                            break;
                        case "jpeg":
                            $info['path_icon'] = URL . 'img/jpeg.webp';
                            break;
                        case "svg":
                            $info['path_icon'] = URL . 'img/svg.png';
                            break;
                        default:
                            $info['path_icon'] = URL . 'img/file.png';
                    }
                    $info['relative_path'] = substr($path . OS . $item, strlen(ROOT_PATH) + 1);
                }
                $out[] = $info;
            }
        }
        return $out;
    }
}
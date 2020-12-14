<?php
        $url = (isset($_GET['url'])) ? $_GET['url']:'home_page';
        $url = array_filter(explode('/',$url));
        
        $file = 'view/'.$url[0].'.php';

        if(is_file($file)){
            include $file;
        } else{           
            include 'view/404.php'; 
        }           
?>
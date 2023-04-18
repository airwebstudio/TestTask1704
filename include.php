<?php
function load_phps($directory) {
    if(!is_dir($directory)) {
        throw new Exception('Invalid app dir!');
    }
    $scan = scandir($directory);
    unset($scan[0], $scan[1]);

    foreach($scan as $file) {
        if(is_dir($directory."/".$file)) {
            load_phps($directory."/".$file);
            continue;
        } 
        include_once($directory."/".$file);
    }
}

load_phps('./app');
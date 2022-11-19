<?php

require_once __DIR__ . '/vendor/autoload.php';

function loadPhpFiles($dir, $recursive = true) {
    $items = scandir($dir);
    foreach($items as $item) {
        if ($recursive && strpos( $item, '.') !== 0 && is_dir($dir . '/' . $item)) {
            loadPhpFiles($dir . '/' . $item);
        } else {
            $file_parts = pathinfo($item);
            if($file_parts['extension'] == 'php') {
                require_once $dir . '/' . $item;
            }
        }
    }
}

loadPhpFiles( __DIR__ . '/app');

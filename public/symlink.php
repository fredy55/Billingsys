<?php 
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/jacoapp/storage/app/public/uploads';
    $linkFolder = 'storage';
    
    if(symlink($targetFolder,$linkFolder)){
        echo 'Symlink process successfully completed';
        echo '<br />'.$targetFolder;
        echo '<br />'.$linkFolder;

    }else{
        echo 'Symlink process FAILED';
    }
    
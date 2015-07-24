<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 03/06/15
 * Time: 16:18
 */
    $gc = new ControllerGallery();
    $image = $gc->getAllImages();

    foreach($images as $img) {
        var_dump($img);
        echo '<br>TEST<br>';
        $gc->getNbLike('/photo/'.$img['id_photo']);
    }
?>
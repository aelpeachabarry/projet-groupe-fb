<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 01/06/15
 * Time: 18:10
 */
include 'app/Facebook/AlbumManager.php';
include 'app/Facebook/UploadPhoto.php';
include 'app/Facebook/imageManager.php';
include 'controller/controller_upload.php';
?>
<div class="row col-lg-offset-2 col-lg-8">
    <div id="upload" class="col-lg-12">

    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <input type="file" name="mon_fichier" id="mon_fichier" /><br />
    <input type="submit" name="submit" value="Envoyer" />
</form>
<form class="form-horizontal" method="POST">
    <fieldset>

        <!-- Form Name -->
        <legend>Select Image From your album</legend>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Albums</label>
            <div class="col-md-4">
                <select id="selectbasic" name="selectbasic" class="form-control">
                    <option value="default"></option>
                    <?php
                    $albums = new AlbumManager($connect->getSession());
                    var_dump($albums);
                    foreach($albums->getAlbums() as $data){
                        echo '<option value="'.$data->id.'">'.$data->name.'</option>';
                    }
                    ?>
                    <input type="submit" name="findImg" value="rechercher mes Images" />
                </select>
            </div>
        </div>

    </fieldset>
</form>
<?php
if(isset($_POST['findImg'])){
    if($_POST['selectbasic']=="default"){
        echo "<p>Veuillez Selectionnez un album</p>";
    }else{
        $images = new ImageManager($connect->getSession());
        $tempArrayImg = $images->getImagesFromAlbum($_POST['selectbasic']);
        if(!empty($tempArrayImg)){
            echo '<select class="image-picker show-labels show-html">';
            foreach($tempArrayImg as $image){
                /*var_dump($image);*/
                echo "<option data-img-src='".$image->source."' value='".$image->id."'>".$user->getName()."</option>";
                /*echo "<img src='".$image->source."'>";*/
            }
            echo '</select>';
        }
    }
}
if(isset($_POST['submit'])){
    if($_POST['submit'] && $_FILES){

        $uploaded = new UploadPhoto($connect->getSession());

        $uploaded->upload($_FILES['mon_fichier']);
        $error = $uploaded->getError();
        if(empty($error)){
            $imgController = new ControllerUpload();
            $imgController->insertImage($uploaded->getImgId(),$user->getId());
        }

        echo $uploaded->getError();
    }else{
        echo "probleme fichier";
    }
}
?>
    </div>
</div>
<script type="text/javascript" src="assets/plugins/image-picker.min.js"></script>

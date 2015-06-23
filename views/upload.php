<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 01/06/15
 * Time: 18:10
 */
require_once 'app/Facebook/AlbumManager.php';
require_once 'app/Facebook/UploadPhoto.php';
require_once 'app/Facebook/imageManager.php';
?>
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
        $images = new ImageManager($connect->getSession(),$_POST['selectbasic']);
        echo '<select class="image-picker show-labels show-html">';
        foreach($images->getImages() as $image){
            /*var_dump($image);*/
            echo "<option data-img-src='".$image->source."' value='".$image->id."'>".$image->name."</option>";
            /*echo "<img src='".$image->source."'>";*/
        }
        echo '</select>';
    }
}
if(isset($_POST['submit'])){
    if($_POST['submit'] && $_FILES){

        $uploaded = new UploadPhoto($connect->getSession());
        $uploaded->upload($_FILES['mon_fichier']);
        echo $uploaded->getError();

    }else{
        echo "probleme fichier";
    }
}

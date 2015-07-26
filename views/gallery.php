<?php
include 'app/Facebook/AlbumManager.php';
use App\Facebook\ImageManager;
include 'app/Facebook/UploadPhoto.php';
include 'controller/ControllerGallery.php';
?>

<div id="fb-root"></div>
<div class="row col-lg-offset-2 col-lg-8">

    <!--caroussel-->
    <div id="galerie-concours" class="carousel slide col-lg-12">
        <?php
        $galController = new ControllerGallery();
        $ImageManager = new ImageManager($connect->getSession());

        //var_dump($galController->getAllImages());
        foreach($galController->getAllImages() as $image){
            $title=('Title of Your iFrame Tab');
            $url=('http://www.aaarentcars.fr/sites/default/files/styles/image_article/public/field/image/image-presentation-aaa-luxury-2.png');
            $summary=('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
            ?>
            <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall"]'>
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Thumbnail Headline</h4>
                        <p>short thumbnail description</p>
                        <p><a href="photo/<?php echo $image['id_photo']; ?>" class="label label-danger photo-infos" >Zoom</a>
                        </p>
                    </div>
                    <img class="lazy img-responsive" data-original="<?php echo $image['url'] ?>" src="<?php echo $image['url'] ?>" alt="">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<!-- le modal pour l'upload d'image -->
<div class="modal fade" id="upload-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="image-gallery-title">Uploadez votre photo</h4>
            </div>
            <div class="modal-body">
                <!--body-->
                <form form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="mon_fichier" id="mon_fichier">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group" id="upload">
                        <label class="col-md-4 control-label" for="selectbasic">Albums</label>
                        <select id="selectbasic" name="selectbasic" class="form-control">
                            <option value="default"></option>
                            <?php
                            $albums = new AlbumManager($connect->getSession());
                            foreach($albums->getAlbums() as $data){
                                echo '<option value="'.$data->id.'">'.$data->name.'</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <!--affichage des images d'un album-->
                    <div class="row">
                        <div id="galerie-album" class="col-lg-12">

                        </div>
                    </div>
                    <!--end body-->
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-default" value="envoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    if($_POST['submit'] && $_FILES){
        $uploaded = new UploadPhoto($connect->getSession());
        $img = new ImageManager($connect->getSession());
        $uploaded->upload($_FILES['mon_fichier']);
        if(empty($error)){
            $imgObj = $img->getImage($uploaded->getImgId());
            $imgController = new ControllerGallery();
            echo $imgController->insertImage($uploaded->getImgId(),$user->getId(),$imgObj->getProperty('source'));
        }
        echo $uploaded->getError();
    }else{
        echo "probleme fichier";
    }
}
?>

<script src="./assets/node_modules/jquery-lazyload/jquery.lazyload.js"></script>
<script src="./assets/js/gallery.js"></script>
<script type="text/javascript" src="assets/plugins/image-picker.min.js"></script>



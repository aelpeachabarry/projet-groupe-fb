<?php
include 'app/Facebook/AlbumManager.php';
use App\Facebook\ImageManager;
include 'app/Facebook/UploadPhoto.php';
include 'controller/ControllerGallery.php';
?>



<div class="row col-lg-offset-2 col-lg-8">

    <!--caroussel-->
    <div id="galerie-concours" class="carousel slide col-lg-12">

        <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall]'>
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger photo-infos" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <?php
        $galController = new ControllerGallery();
        $ImageManager = new ImageManager($connect->getSession());
        //var_dump($galController->getAllImages());
        foreach($galController as $imageObj){
            var_dump($ImageManager->getImage($imageObj['id_photo']));
        }

        ?>
        <!--<div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall]'>
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger photo-infos" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall]'>
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger photo-infos" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall]'>
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <div class="thumbnail">
                <div class="caption">
                    <h4>Thumbnail Headline</h4>
                    <p>short thumbnail description</p>
                    <p><a href="#" class="label label-danger" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">Zoom</a>
                        <a href="#" class="label label-default">Like</a></p>
                </div>
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </div>
        </div>-->
    </div>
</div>


<!-- le modal qui sert de lightbox -->
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                </div>

                <div class="col-md-8 text-justify" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2">
                    <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                </div>
            </div>
        </div>
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
                    <button type="submit" name="submit" class="btn btn-default" value="envoyer">Envoyer</button>
                </form>
                <form form method="post" action="#" enctype="multipart/form-data">
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
                    <button type="submit" name="submit" class="btn btn-default" value="envoyer">Envoyer</button>
                </form>
                <!--affichage des images d'un album-->
                <div class="row">
                    <div id="galerie-album" class="col-lg-12">

                    </div>
                </div>
                <!--end body-->
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    if($_POST['submit'] && $_FILES){

        $uploaded = new UploadPhoto($connect->getSession());

        $uploaded->upload($_FILES['mon_fichier']);
        $error = $uploaded->getError();
        if(empty($error)){
            $imgController = new ControllerGallery();
            $imgController->insertImage($uploaded->getImgId(),$user->getId());
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


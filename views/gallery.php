<?php
include 'app/Facebook/AlbumManager.php';
use App\Facebook\ImageManager;
include 'app/Facebook/UploadPhoto.php';
include 'controller/ControllerGallery.php';
?>

<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '384491318402733',
            xfbml      : true,
            version    : 'v2.0'
        });
    };
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.4&appId=384491318402733";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script>
    $(document).ready(function() {
        $('#button_share').click(function() {

            console.log($(this));

            var img = $(this).closest('.thumbnail').find('img');
            console.log(img);
            var lien = img.data('original');
            console.log(lien);

            FB.ui(
                {
                    method: 'feed',
                    name: 'Facebook Dialogs',
                    link: 'https://projet-groupe-fb.herokuapp.com/photo-1',
                    //picture: lien,
                    caption: 'Reference Documentation',
                    description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
                    message: 'Facebook Dialogs are easy!'
                },
                function(response) {
                    if (response && response.post_id) {
                        alert('Post was published.');
                    } else {
                        alert('Post was not published.');
                    }
                }
            );
        });
    });
</script>
<div class="row col-lg-offset-2 col-lg-8">

    <!--caroussel-->
    <div id="galerie-concours" class="carousel slide col-lg-12">
        <?php
        $galController = new ControllerGallery();
        $ImageManager = new ImageManager($connect->getSession());

        //var_dump($galController->getAllImages());
        foreach($galController->getAllImages() as $image){
            echo "<pre>";
            print_r($image);
            echo "</pre>";
            $title=('Title of Your iFrame Tab');
            $url=('http://www.aaarentcars.fr/sites/default/files/styles/image_article/public/field/image/image-presentation-aaa-luxury-2.png');
            $summary=('Custom message that summarizes what your tab is about, or just a simple message to tell people to check out your tab.');
            ?>
            <div class="col-lg-4 col-md-4 col-xs-6 thumb" data-groups='["wall"]'>
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Thumbnail Headline</h4>
                        <p>short thumbnail description</p>
                        <p><a href="index.php?page=single&id=<?php echo $image['id_photo']."&url=".$image['url']; ?>" class="label label-danger photo-infos" >Zoom</a>
                            <a href="" class="label label-default">Like</a>
                        <div class="fb-like" data-href="<?php echo $image['id_photo']; ?>" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
                        <input type="button" id="button_share" value="Share" />
                        <!--<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">Insert text or an image here.</a>-->
                        </p>
                    </div>
                    <img class="lazy img-responsive" data-original="<?php echo $image['url'] ?>" src="<?php echo $image['url'] ?>" alt="">
                    <?php /*echo $galController->getNbLike($image['url']); */?>
                </div>
            </div>
        <?php
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
        <div class="modal-content" id="modalUpload">
            <div class="modal-header">

                <h4 class="modal-title" id="image-gallery-title">Uploadez votre photo</h4>
            </div>
            <div class="modal-body">
                <!--body-->
                <div class="form-group">
                    <select class="form-control" id="selectUpload">
                        <option value="desktopUpload">uploader depuis le bureau</option>
                        <option value="fbUpload">uploader depluis votre compte facebook</option>
                    </select>
                </div>

                <form form method="post" action="#" enctype="multipart/form-data">

                    <div id="upladDesktop" class="form-group displaynone">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="mon_fichier" id="mon_fichier">
                        <p class="help-block"></p>
                    </div>
                    <!--<button type="submit" name="submit" class="btn btn-default" value="envoyer">Envoyer</button>-->
                </form>
                <form id="uploadFb" form method="post" action="#" class="displaynone" enctype="multipart/form-data">
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
        $img = new ImageManager($connect->getSession());
        $uploaded->upload($_FILES['mon_fichier']);
        if(empty($error)){
            $imgObj = $img->getImage($uploaded->getImgId());
            $imgController = new ControllerGallery();
            $imgController->insertImage($uploaded->getImgId(),$user->getId(),$imgObj->getProperty('source'));
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



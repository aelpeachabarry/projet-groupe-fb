<?php
    /*$db = new Db();
    $concours = $db->getConcoursActuel();
    $id_concours = $concours->getId();

    $photos = $db->getPhotos($id_concours);

    foreach ($photos as $photo) :
        $user = $photo->getUser();
        */?><!--
        <p>
            Photo ID : <?php /*echo $photo->getId(); */?><br>
            Nb Likes : <?php /*echo $photo->getNbLike(); */?><br>
            Propriétaire : <?php /*echo $user->getNom().' '.$user->getPrenom(); */?>
        </p>-->
    <?php //endforeach; ?>


<div class="row col-lg-offset-2 col-lg-8">

    <!--caroussel-->
    <div id="galerie-concours" class="carousel slide col-lg-12">

        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
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
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
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
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
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
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://lorempixel.com/400/300" data-target="#image-gallery">
                <img class="lazy img-responsive" data-original="http://lorempixel.com/400/300" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
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

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script src="./assets/node_modules/jquery-lazyload/jquery.lazyload.js"></script>
<script src="./assets/js/gallery.js"></script>


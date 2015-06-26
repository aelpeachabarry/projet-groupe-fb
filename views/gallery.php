<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=384491318402733";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<?php
    $db = new Db();
    $concours = $db->getConcoursActuel();
    $id_concours = $concours->getId();

    $photos = $db->getPhotos($id_concours);

    foreach ($photos as $photo) :
        $user = $photo->getUser();
        ?>
        <p>
            Photo ID : <?php echo $photo->getId(); ?><br>
            Nb Likes : <?php echo $photo->getNbLike(); ?><br>
            Propriétaire : <?php echo $user->getNom().' '.$user->getPrenom(); ?>
            <div class="fb-like" data-href="https://projet-groupe-fb.herokuapp.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

        </p>
    <?php endforeach; ?>


<div class="row col-lg-offset-2 col-lg-8">

    <!--caroussel-->
    <div id="myCarousel" class="carousel slide col-lg-12">

        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="" data-target="#image-gallery">
                <img class="img-responsive" src="http://lorempixel.com/400/300" alt="">
            </a>
        </div>

    </div>    
</div>


<!-- le modal qui sert de lightbox -->
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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

<script src="./assets/js/gallery.js"></script>


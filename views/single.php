<?php
include 'controller/ControllerGallery.php';

$gc = new ControllerGallery();
$imageUrl = $gc->getImage($_GET['id'])[0];

?>
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
    }(document, 'script', 'facebook-jssdk'));
</script>
<div id="p_single" class="container">
    <div class="row col-lg-offset-2 col-lg-8">

        <div id="image-single" class="col-lg-12">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-6 thumb" data-groups='["wall"]'>
                <div class="thumbnail">
                    <img class="lazy" data-original="<?php echo $imageUrl['url'] ?>" src="<?php echo $imageUrl['url'] ?>" alt="">
                </div>
            </div>
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-6 thumb" data-groups='["wall"]'>
                <div class="fb-like" data-href="https://projet-groupe-fb.herokuapp.com/index.php?page=single&id=<?php echo $imageUrl['id_photo']; ?>" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
            </div>
        </div>

    </div>
</div>
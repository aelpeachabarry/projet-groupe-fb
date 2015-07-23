<?php
include 'controller/ControllerGallery.php';

$gc = new ControllerGallery();
$imageUrl = $gc->getImage($_GET['id']);
var_dump($imageUrl);

?>
<div class="row col-lg-offset-2 col-lg-8">

    <div id="image-single" class="col-lg-12">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-6 thumb" data-groups='["wall"]'>
            <div class="thumbnail">
                <img class="lazy img-responsive" data-original="<?php echo $imageUrl['url'] ?>" src="<?php echo $imageUrl['url'] ?>" alt="">
            </div>
        </div>
    </div>

</div>
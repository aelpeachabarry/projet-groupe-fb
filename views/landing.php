<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner">
    <div class="banner-image"></div>
    <div class="banner-caption">
        <div class="container">
            <div class="row">
                <?php if(!is_object($user)){
                    ?>

                <div class="col-md-4 col-md-offset-6 object-non-visible" style="background-color: rgba(0,0,0,0.2);padding-bottom:10px" data-animation-effect="fadeIn">
                    <h2 class="text-center">L'holidays selfies est ouvert</h2>
                    <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos debitis provident nulla illum minus enim praesentium repellendus ullam cupiditate reiciendis optio voluptatem, recusandae nobis quis aperiam, sapiente libero ut at.</p>
                    <?php
                        echo '<a href="#" id="participer" class="btn btn-primary btn-primary" style="margin-left:25%">Participer</a>';
                    ?>
                </div>
                <?php
                }else{
                    echo '<div class="col-md-4 col-md-offset-8 object-non-visible" style="background-color: rgba(0,0,0,0.2);padding-bottom:10px" data-animation-effect="fadeIn">';
                    echo '<h4>Bienvenue '.$user->getName().'</h4>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->
<script src="./assets/js/landing.js"></script>
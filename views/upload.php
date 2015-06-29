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

    $app_id = "384491318402733";
    $app_secret = "dab4c606e28695176a9d99dcc2a813c8";
    $post_login_url = "https://projet-groupe-fb.herokuapp.com";

    $code = $_REQUEST["code"];

        $token_url="https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $app_id
            . "&redirect_uri=" . urlencode( $post_login_url)
            . "&client_secret=" . $app_secret
            . "&code=" . $code;
        $response = file_get_contents($token_url);
        $params = null;
        parse_str($response, $params);
        $access_token = $params['access_token'];

        // Show photo upload form to user and post to the Graph URL
        $graph_url= "https://graph.facebook.com/me/photos?"
            . "access_token=" .$access_token;


        echo '<form enctype="multipart/form-data" action="'
            .$graph_url .' "method="POST">';
        echo 'Please choose a photo: ';
        echo '<input name="source" type="file"><br/><br/>';
        echo 'Say something about this photo: ';
        echo '<input name="message"
             type="text" value=""><br/><br/>';
        echo '<input type="submit" value="Upload"/><br/>';
        echo '</form>';


<?php
/**
 * Created by PhpStorm.
 * User: aelpeacha
 * Date: 20/04/15
 * Time: 14:48
 */

namespace App\Facebook;

use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use App\Facebook\UploadImgException;


class UploadPhoto {

    private $session;
    private $imgId;
    private $codeError;

    public function __construct($session){

        $this->session = $session;
    }

    public function upload($file){
        $filename = $file['name'];
        if($this->session) {

            try {

                // Upload to a user's profile. The photo will be in thee
                // first album in the profile. You can also upload to
                // a specific album by using /ALBUM_ID as the path
                $response = (new FacebookRequest(
                    $this->session, 'POST', '/me/photos', array(
                        'source' => new \CURLFile($file['tmp_name'], $file['type']),
                        'message' => 'Concours Selfie'
                    )
                ))->execute()->getGraphObject();

                // If you're not using PHP 5.5 or later, change the file reference to:
                // 'source' => '@/path/to/file.name'
                /*var_dump($response->getProperty('error'));*/
                $error = $response->getProperty('error');
                if($error==UPLOAD_ERR_OK){
                    $this->imgId =  $response->getProperty('id');
                    echo "Upload Done";
                }else{
                    echo new UploadImgException($error);
                }

            } catch(UploadImgException $e) {
                echo $e->getMessage();
            }
        }
    }
    public function getImgId(){
        return $this->imgId;
    }
    public function getError(){
        return $this->codeError;
    }
    private function codeToMessage($code)
    {
        var_dump($code);
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "File upload stopped by extension";
                break;

            default:
                $message = "Unknown upload error";
                break;
        }
        return $message;
    }


}
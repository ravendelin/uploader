<?php

namespace controller;

/**
 * Description of Upload
 *
 * @author Pavel Mikhaylov <pavel7mikhaylov@gmail.com>
 */
class Upload {
    
    public function form() {
        include 'templates/uploadForm.php';
    }
    
    public function process(){
        var_dump($_FILES);
        $this->checkError();
        $this->checkFiles();
        $this->getMime();
        $this->moving();
        
    }

    private function checkError() {
        try {
            // Check $_FILES['uploadform']['error'] value.
            switch ($_FILES['uploadform']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            // You should also check filesize here. 
            if ($_FILES['uploadform']['size'] > 1000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
        } catch (RuntimeException $e) {

            echo $e->getMessage();
        }
    }

    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    private function checkFiles() {
        try {
            if (
                    !isset($_FILES['uploadform']['error']) ||
                    is_array($_FILES['uploadform']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }
        } catch (RuntimeException $e) {

            echo $e->getMessage();
        }
    }

    // DO NOT TRUST $_FILES['uploadform']['mime'] VALUE !!
    // Check MIME Type by yourself.
    private function getMime() {

        try {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                    $finfo->file($_FILES['uploadform']['tmp_name']),
                    array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'mp3' => 'audio/mpeg',
                    ),
                    true
                    )) {
                throw new RuntimeException('Invalid file format.');
            }
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
        return $ext;
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['uploadform']['name'] WITHOUT ANY VALIDATION !!
    // obtain safe unique name from its binary data.
    private function moving() {
        try {
            if (!move_uploaded_file(
                            $_FILES['uploadform']['tmp_name'],
                            sprintf('./uploads/'.$this->getMime().'/%s.%s',
                                    sha1_file($_FILES['uploadform']['tmp_name']),
                                    $this->getMime()
                            )
                    )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
            echo 'File is uploaded successfully.';
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }
    }
}

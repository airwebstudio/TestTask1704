<?php
namespace TT;

class Image {
    private $image = './img/ok.jpg';
    private $content_type = 'image/jpeg';

    public function returnImage() {
        try {
            $fp = fopen($this->image, 'rb');
            header("Content-Type: ".$this->content_type);
            header("Content-Length: " . filesize($this->image));

            fpassthru($fp);
        }
        catch (\Exception $e) {
            echo 'Wrong file!';
        }        
    }
}
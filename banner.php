<?php
require_once('./include.php');

use TT\Image;
use TT\Banner;

$banner = new Banner();
$banner->saveToDb();

$image = new Image();
$image->returnImage();

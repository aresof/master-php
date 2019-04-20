<?php

require_once '../vendor/autoload.php';

$origin = 'IMG.JPG';
$mod = 'mod'.date('U').'.jpg';

$thumb = new \PHPThumb\GD($origin);
ob_clean();
$thumb->cropFromCenter(550,550);
$thumb->show();
$thumb->save($mod);

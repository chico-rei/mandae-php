<?php
require '../vendor/autoload.php';

use \ChicoRei\Packages\Mandae\Mandae;

$mandae = new Mandae('aaa', ['sandbox' => true]);
$response = $mandae->postalCode()->rates([]);
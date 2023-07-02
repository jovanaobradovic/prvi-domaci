<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$raspored = trim($_POST['raspored']);
$napomena = trim($_POST['napomena']);

if($broker->izmeni($raspored, $napomena)) {
?>
<div class="alert alert-success" role="alert">
    Uspesno azurirana napomena treninga!
</div>
<?php
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Doslo je do greske!
    </div>
<?php
}

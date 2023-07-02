<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$termin = trim($_POST['termin']);
$trening = trim($_POST['trening']);
$dan = trim($_POST['dan']);
$napomena = trim($_POST['napomena']);
$trener = trim($_POST['trener']);

if($broker->unesi($dan, $termin, $trening, $trener, $napomena)) {
?>
<div class="alert alert-success" role="alert">
    Uspesno unet trening u raspored!
</div>
<?php
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Doslo je do greske!
    </div>
<?php
}

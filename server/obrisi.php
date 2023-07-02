<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$raspored = trim($_POST['raspored']);

if($broker->obrisi($raspored)) {
?>
<div class="alert alert-success" role="alert">
    Uspesno obrisan trening iz rasporeda!
</div>
<?php
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Doslo je do greske!
    </div>
<?php
}

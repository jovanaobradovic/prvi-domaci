<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$dani = $broker->vratiDane();
/** @var Dan $dan */
foreach ($dani as $dan){
    ?>
<option value="<?= $dan->getDanId() ?>"><?= $dan->getDan() ?></option>
<?php

}
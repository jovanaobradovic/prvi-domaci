<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$treninzi = $broker->vratiTreninge();
/** @var Trening $trening */
foreach ($treninzi as $trening){
    ?>
<option value="<?= $trening->getTreningId() ?>"><?= $trening->getNazivTreninga() ?></option>
<?php

}
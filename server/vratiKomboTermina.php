<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$termini = $broker->vratiTermine();
/** @var Termin $termin */
foreach ($termini as $termin){
    ?>
<option value="<?= $termin->getTerminId() ?>"><?= $termin->getTermin() ?></option>
<?php

}
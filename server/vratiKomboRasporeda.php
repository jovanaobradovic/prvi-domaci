<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$rasporedi = $broker->pretrazi(0, 'asc');
/** @var Raspored $raspored */
foreach ($rasporedi as $raspored){
    ?>
<option value="<?= $raspored->getRasporedId() ?>"><?= $raspored->getTrening()->getNazivTreninga() . " - " . $raspored->getDan()->getDan() . " - " . $raspored->getTermin()->getTermin() ?></option>
<?php

}
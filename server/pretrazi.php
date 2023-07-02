<?php

/** @var Broker $broker */
$broker = require '../inicijalizacija.php';

$dan = $_GET['dan'];
$sort = $_GET['sort'];

$rasporedi = $broker->pretrazi($dan, $sort);

$podaci = [
        "Ponedeljak" => [],
        "Utorak" => [],
        "Sreda" => [],
        "Cetvrtak" => [],
        "Petak" => [],
        "Subota" => [],
        "Nedelja" => [],
];

/** @var Raspored $raspored */
foreach ($rasporedi as $raspored){
   $podaci[$raspored->getDan()->getDan()][] = $raspored;
}

if(count($rasporedi) === 0){
    ?>
       <h1>Nema zakazanih treninga za ovu pretragu</h1>
        <?php
}

/**
 * @var string $dan
 * @var  array $raspored
 */
foreach ($podaci as $dan => $rasporedPodaci){

    if(count($rasporedPodaci) > 0){

    ?>



    <div class="col-md-12">
        <h1><?= $dan ?></h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Termin</th>
                <th>Trening</th>
                <th>Trener</th>
                <th>Napomena</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /** @var Raspored $raspored */
            foreach ($rasporedPodaci as $raspored){
            ?>
            <tr>
                <td><?= $raspored->getTermin()->getTermin() ?></td>
                <td><?= $raspored->getTrening()->getNazivTreninga() ?></td>
                <td><?= $raspored->getTrener() ?></td>
                <td><?= $raspored->getNapomena() ?></td>
            </tr>
                    <?php
                }
                    ?>
            </tbody>
        </table>
    </div>

        <?php
    }
        ?>

<?php
}
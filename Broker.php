<?php

class Broker
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Mysqli('localhost', 'root', '', 'grupni_treninzi');
        $this->connection->set_charset('utf8');
    }


    public function vratiDane()
    {
        $upit = "SELECT * FROM dan";

        $podaci = [];

        $resultSet = $this->connection->query($upit);

        while ($red = $resultSet->fetch_object()){
            $podaci[] = new Dan($red->danId, $red->dan);
        }

        return $podaci;
    }

    public function vratiTreninge()
    {
        $upit = "SELECT * FROM trening";

        $podaci = [];

        $resultSet = $this->connection->query($upit);

        while ($red = $resultSet->fetch_object()){
            $podaci[] = new Trening($red->treningId, $red->nazivTreninga);
        }

        return $podaci;
    }

    public function vratiTermine()
    {
        $upit = "SELECT * FROM termin";

        $podaci = [];

        $resultSet = $this->connection->query($upit);

        while ($red = $resultSet->fetch_object()){
            $podaci[] = new Termin($red->terminId, $red->termin);
        }

        return $podaci;
    }

    public function pretrazi($dan, $sort)
    {
        $upit = "SELECT * FROM raspored r JOIN trening t on r.treningId = t.treningId JOIN termin te on r.terminId = te.terminId JOIN dan d on r.danId = d.danId";

        if($dan != 0){
            $upit .= " WHERE r.danId = " . $dan;
        }

        $upit .= " ORDER BY r.terminId " . $sort;

        $podaci = [];

        $resultSet = $this->connection->query($upit);

        while ($red = $resultSet->fetch_object()){
            $trening = new Trening($red->treningId, $red->nazivTreninga);
            $danObjekat = new Dan($red->danId, $red->dan);
            $termin =  new Termin($red->terminId, $red->termin);

            $podaci[] = new Raspored($red->rasporedId, $danObjekat, $termin, $trening, $red->trener, $red->napomena);
        }

        return $podaci;
    }

    public function unesi($dan, $termin, $trening, $trener, $napomena)
    {
        $upit = "INSERT INTO raspored VALUES (null, $dan, $termin, $trening, '$trener', '$napomena')";
        return $this->connection->query($upit);
    }


    public function izmeni($raspored, $napomena)
    {
        $upit = "UPDATE raspored SET napomena = '$napomena' WHERE rasporedId = $raspored";
        return $this->connection->query($upit);
    }

    
    public function obrisi($raspored)
    {
        $upit = "DELETE FROM  raspored WHERE rasporedId = $raspored";
        return $this->connection->query($upit);
    }

}
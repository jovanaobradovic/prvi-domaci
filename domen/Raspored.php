<?php

class Raspored implements JsonSerializable {
    private $rasporedId;
    private $dan;
    private $termin;
    private $trening;
    private $trener;
    private $napomena;

    /**
     * @param $rasporedId
     * @param $danId
     * @param $terminId
     * @param $treningId
     * @param $trener
     * @param $napomena
     */
    public function __construct($rasporedId, $danId, $terminId, $treningId, $trener, $napomena)
    {
        $this->rasporedId = $rasporedId;
        $this->dan = $danId;
        $this->termin = $terminId;
        $this->trening = $treningId;
        $this->trener = $trener;
        $this->napomena = $napomena;
    }


    public function getRasporedId() {
        return $this->rasporedId;
    }

    public function setRasporedId($rasporedId) {
        $this->rasporedId = $rasporedId;
    }

    public function getDan() {
        return $this->dan;
    }

    public function setDan($dan) {
        $this->dan = $dan;
    }

    public function getTermin() {
        return $this->termin;
    }

    public function setTermin($termin) {
        $this->termin = $termin;
    }

    public function getTrening() {
        return $this->trening;
    }

    public function setTrening($trening) {
        $this->trening = $trening;
    }

    public function getTrener() {
        return $this->trener;
    }

    public function setTrener($trener) {
        $this->trener = $trener;
    }

    public function getNapomena() {
        return $this->napomena;
    }

    public function setNapomena($napomena) {
        $this->napomena = $napomena;
    }

    public function jsonSerialize(): array {
        return [
            'rasporedId' => $this->rasporedId,
            'dan' => $this->dan,
            'termin' => $this->termin,
            'trening' => $this->trening,
            'trener' => $this->trener,
            'napomena' => $this->napomena
        ];
    }
}
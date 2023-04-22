<?php

class Trening implements JsonSerializable {
    private $treningId;
    private $nazivTreninga;

    /**
     * @param $treningId
     * @param $nazivTreninga
     */
    public function __construct($treningId, $nazivTreninga)
    {
        $this->treningId = $treningId;
        $this->nazivTreninga = $nazivTreninga;
    }


    public function getTreningId() {
        return $this->treningId;
    }

    public function setTreningId($treningId) {
        $this->treningId = $treningId;
    }

    public function getNazivTreninga() {
        return $this->nazivTreninga;
    }

    public function setNazivTreninga($nazivTreninga) {
        $this->nazivTreninga = $nazivTreninga;
    }

    public function jsonSerialize(): array {
        return [
            'treningId' => $this->treningId,
            'nazivTreninga' => $this->nazivTreninga
        ];
    }
}





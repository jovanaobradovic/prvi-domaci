<?php

class Termin implements JsonSerializable {
    private $terminId;
    private $termin;

    /**
     * @param $terminId
     * @param $termin
     */
    public function __construct($terminId, $termin)
    {
        $this->terminId = $terminId;
        $this->termin = $termin;
    }


    public function getTerminId() {
        return $this->terminId;
    }

    public function setTerminId($terminId) {
        $this->terminId = $terminId;
    }

    public function getTermin() {
        return $this->termin;
    }

    public function setTermin($termin) {
        $this->termin = $termin;
    }

    public function jsonSerialize(): array {
        return [
            'terminId' => $this->terminId,
            'termin' => $this->termin
        ];
    }
}
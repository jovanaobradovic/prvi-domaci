<?php
class Dan implements JsonSerializable {
    private $danId;
    private $dan;

    /**
     * @param $danId
     * @param $dan
     */
    public function __construct($danId, $dan)
    {
        $this->danId = $danId;
        $this->dan = $dan;
    }


    public function getDanId() {
        return $this->danId;
    }

    public function setDanId($danId) {
        $this->danId = $danId;
    }

    public function getDan() {
        return $this->dan;
    }

    public function setDan($dan) {
        $this->dan = $dan;
    }

    public function jsonSerialize(): array {
        return [
            'danId' => $this->danId,
            'dan' => $this->dan
        ];
    }
}

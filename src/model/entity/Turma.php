<?php
namespace src\model\entity;

class turma {
    private $NumTurma;
    private $LetraTurma;
    private $AnoLetivo;

    // Getter e Setter para NumTurma
    public function getNumTurma() {
        return $this->NumTurma;
    }
    public function setNumTurma($NumTurma) {
        $this->NumTurma = $NumTurma;
    }

    // Getter e Setter para LetraTurma
    public function getLetraTurma() {
        return $this->LetraTurma;
    }
    public function setLetraTurma($LetraTurma) {
        $this->LetraTurma = $LetraTurma;
    }

    // Getter e Setter para AnoLetivo
    public function getAnoLetivo() {
        return $this->AnoLetivo;
    }
    public function setAnoLetivo($AnoLetivo) {
        $this->AnoLetivo = $AnoLetivo;
    }
}
?>

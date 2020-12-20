<?php
    class Ingreso {
        private $codigo;
        private $month;
        private $year;
        private $concept;
        private $value;

        public function __construct($codigo = null, $concept = null, $month = null, $year = null,  $value = null) {
            $this->codigo = $codigo;
            $this->concept = $concept;
            $this->month = $month;
            $this->year = $year;
            $this->value = $value;
        }

        public function getCodigo() {
            return $this->codigo;
        }
        public function getMonth() {
            return $this->month;
        }
        public function getYear() {
            return $this->year;
        }
        public function getConcept() {
            return $this->concept;
        }
        public function getValue() {
            return $this->value;
        }
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        public function setMonth($month) {
            $this->month = $month;
        }
        public function setYear($year) {
            $this->year = $year;
        }
        public function setConcept($concept) {
            $this->concept = $concept;
        }
        public function setValue($value) {
            $this->value = $value;
        }
    }
?>
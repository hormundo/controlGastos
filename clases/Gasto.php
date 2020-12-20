<?php
    class Gasto {
        private $codigo;
        private $day;
        private $month;
        private $year;
        private $concept;
        private $category;
        private $value;

        public function __construct($codigo = null, $concept = null, $category = null, $day = null, $month = null, $year = null,  $value = null) {
            $this->codigo = $codigo;
            $this->concept = $concept;
            $this->category = $category;
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
            $this->value = $value;
        }

        public function getCodigo() {
            return $this->codigo;
        }
        public function getDay() {
            return $this->day;
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
        public function getCategory() {
            return $this->category;
        }
        public function getValue() {
            return $this->value;
        }
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        public function setDay($day) {
            $this->day = $day;
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
        public function setCategory($category) {
            $this->category = $category;
        }
        public function setValue($value) {
            $this->value = $value;
        }
    }
?>
<?php
    session_start();
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = array();
    }

    class Student {
        public $id;
        public $prefix;
        public $first_name;
        public $last_name;
        public $year;
        public $gpa;
        public $birthday;

        public function __construct($id, $prefix, $first_name, $last_name, $year, $gpa, $birthday) {
            $this->id = $id;
            $this->prefix = $prefix;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->year = $year;
            $this->gpa = $gpa;
            $this->birthday = $birthday;
        }
    }
?>
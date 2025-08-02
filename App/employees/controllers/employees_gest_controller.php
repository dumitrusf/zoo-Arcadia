<?php

class EmployeesGestController{
    public function start(){
        include_once __DIR__ . "/../views/gest/start.php";
    }
    public function create(){
        if($_POST){
            print_r($_POST);
        }
        include_once __DIR__ . "/../views/gest/create.php";
    }
    public function edit(){
        include_once __DIR__ . "/../views/gest/edit.php";
    }
}

<?php

class PiceController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'pice' .DIRECTORY_SEPARATOR;


     public function index ()
     {
         //print_r(Pice::read());
         $this->view->render($this->viewDir . 'index',[
             'pice'=>Pice::read()
         ]);
     }
}
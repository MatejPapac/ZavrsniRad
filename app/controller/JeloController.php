<?php

class JeloController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'jelo' .DIRECTORY_SEPARATOR;


     public function index ()
     {
         $this->view->render($this->viewDir . 'index',[
             'jelo'=>Jelo::read()
         ]);
     }

     public function brisanje($sifra)
     {
         Jelo::delete($sifra);
       
         header('location :'. App::config('url') . 'jelo/index');
     }
}
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
             'pice'=>Pice::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
   public function novi()

   {
       $this->view->render($this->viewDir. 'novi',[
           'poruka'=>'',
           'pice'=>$this->pica
       ]);
   }

   public function promjena($sifra)
   {
       $this->smjer =Pice::readOne($sifra);
       $this->view->render($this->viewDir. 'novi',[
        'poruka'=>'',
        'pice'=>$this->pica
       ]);

   }



   public function dodajNovi()
   {
       Pice::create($_POST);
       $this->index();

   }
    
     public function brisanje($sifra)
    {
        Pice::delete($sifra);
        $this->index();
    }
}
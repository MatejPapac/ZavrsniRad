<?php

class PiceController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'pice' .DIRECTORY_SEPARATOR;

     private $poruka;


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
       $this->view->render($this->viewDir. 'novi');
         
      
   }

   public function promjena($sifra)
   {
       $this->smjer =Pice::readOne($sifra);
       $this->view->render($this->viewDir. 'novi');

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
    public function kontrolaVrsta()
    {
        if(strlen($this->pice->vrsta)===0){
            $this->poruka='vrsta obavezno' ;
        }
    }

    public function kontrolaNaziv()
    {
        if(strlen($this->pice->naziv)===0){
            $this->poruka='Naziv obavezno';
            return false;

        }
        if(strlen($this->pice->naziv)>50){
            $this->poruka='naziv obavezno mora biti manji od 50';
            return false;
        }
        return true;

        
    }
}
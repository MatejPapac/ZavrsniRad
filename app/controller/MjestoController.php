<?php

class MjestoController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'mjesto' .DIRECTORY_SEPARATOR;

     private $poruka;
     
     private $mjesto;

     public function __construct()
     {
         parent::__construct();
    
    
         $this->mjesto = new stdClass();
         $this->mjesto->naziv='';
         $this->mjesto->brojStolica='1';
    
     }
 


     public function index ()
     {
     $pica = Mjesto::read();
      
       
         $this->view->render($this->viewDir . 'index',[
             'mjesto'=>Mjesto::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }



       public function promjeni()
       {
    
    
         
        
      
         }

    private function pripremiPodatke()
    {
        $this->mjesto=(object)$_POST;

    }



   public function dodajNovi()
   {
    

  

   }
    
     public function brisanje($sifra)
    {
        Mjesto::delete($sifra);
      
        header('location:' . App::config('url') . 'mjesto/index');



        
       
    }
   



  
  



        
      


  
        
    }

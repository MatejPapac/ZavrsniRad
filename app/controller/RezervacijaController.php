<?php

class RezervacijaController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'rezervacija' .DIRECTORY_SEPARATOR;

     private $poruka;
     
     private $rez;

     public function __construct()
     {
         parent::__construct();
    
    
         $this->rez = new stdClass();
         $this->rez->datum='';
         $this->rez->osoba='1';
         $this->rez->brojRezerviranihMjesta='';
         $this->rez->mjesto='';
         $this->rez->kontakt='';
         $this->rez->napomena='';
   
     }
 


     public function index ()
     {
     $pica = Rezervacija::read();
      
       
         $this->view->render($this->viewDir . 'index',[
             'rezervacija'=>Rezervacija::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
   public function novi()

   {
       $this->view->render($this->viewDir. 'novi',[
           'poruka'=>'Popunite podatke',
           'rezervacija'=>$this->rezervacija
       ]);
         
      
   }



       public function promjeni()
       {
    
    
         
        
      
         }

    private function pripremiPodatke()
    {
        $this->pica=(object)$_POST;

    }



   public function dodajNovi()
   {
    

  

   }
    
     public function brisanje($sifra)
    {
        Rezervacija::delete($sifra);
      
        header('location:' . App::config('url') . 'rezervacija/index');



        
       
    }
   



  
  



        
      


  
        
    }

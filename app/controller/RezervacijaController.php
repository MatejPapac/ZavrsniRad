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
         $this->rez->mjesto='Mjesto';
         $this->rez->kontakt='';
         $this->rez->napomena='';
   
     }
 


     public function index ()
     {
      Rezervacija::read();
      
       
         $this->view->render($this->viewDir . 'index',[
             'rezervacija'=>Rezervacija::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
   public function novi()

   {
       $this->view->render($this->viewDir. 'novi',[
           'poruka'=>'Popunite podatke',
           'rezervacija'=>$this->rez,
           'lista'=>Mjesto::read()
       ]);
         
      
   
   }
   public function promjena($id)
   {
       $this->rez=Rezervacija::readOne($id);
       $this->view->render($this->viewDir . 'promjena', [
           'poruka' =>'Promijenite podatke',
           'rezervacija'=>$this->rez,
           'lista'=>Mjesto::read()
       ]);
   }


       public function promjeni()
       {
    

        $this->pripremiPodatke();
        if ($this->kontrolaKontakta()  ){
            Rezervacija::update($_POST);
            $this->index();
        }else{
            $this->view->render($this->viewDir . 'promjena' ,[
                'poruka'=>$this->poruka,
                'rezervacija'=>$this->rez
            ]);
        }
    
         
        
      
         }

    private function pripremiPodatke()
    {
        $this->rez=(object)$_POST;

    }



   public function dodajNovi()
   {
    
    $this->rez=(object)$_POST;
    if ($this->kontrolaKontakta()){
      
        Rezervacija::create($_POST);
        $this->index();
    }else{
        $this->view->render($this->viewDir . 'novi' ,[
            'poruka'=>$this->poruka,
            'rezervacija'=>$this->rez,
            'lista'=>Mjesto::read()
        ]);
    }
    
  
     }
    

  
   
    
     public function brisanje($sifra)
    {
        Rezervacija::delete($sifra);
      
        header('location:' . App::config('url') . 'rezervacija/index');



        
       
    }



   
   public function kontrolaKontakta () 
{

    if(strlen($this->rez->kontakt)===0){
        $this->poruka="Naziv obavezno";
        return false;
    }
    return true;

}

  

  
  



        
      


  
        
    }

<?php

class RezervacijaController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'rezervacija' .DIRECTORY_SEPARATOR;


     



     public function index ()
     {
    
      
       
         $this->view->render($this->viewDir . 'index',[
             'rezervacija'=>Rezervacija::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
 
   



  
  


 

        
      


  
        
    }

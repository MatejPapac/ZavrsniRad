<?php

class PiceController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'rezervacija' .DIRECTORY_SEPARATOR;

     private $poruka;
     
     private $rez;
 


     public function index ()
     {
    
      
       
         $this->view->render($this->viewDir . 'index',[
             'rezervacija'=>Rezervacija::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
 
   



  
  


 

        
      


  
        
    }

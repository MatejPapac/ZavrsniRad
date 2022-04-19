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
         $this->mjesto->brojStolica='4';
    
     }
 


     public function index ()
     {
     $pica = Mjesto::read();
      
       
         $this->view->render($this->viewDir . 'index',[
             'mjesto'=>Mjesto::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }


    

     public function kontrolaStolica()

     {
        if(strlen($this->mjesto->brojStolica)===0){
            $this->poruka="unijeti broj stolica";
            return false;

            

     }
     return true;
    }


       public function promjeni()
       {
        {
    
            $this->pripremiPodatke();
            if ($this->kontrolaStolica()){
           
                Mjesto::update($_POST);
                $this->index();
            }else{
                $this->view->render($this->viewDir . 'promjena' ,[
                    'poruka'=>$this->poruka,
                    'mjesto'=>$this->mjesto
                ]);
            }
            
          
             }
    
         
         
        
      
         }

    private function pripremiPodatke()
    {
        $this->mjesto=(object)$_POST;

    }



   public function dodajNovi()
   {
    

    $this->pica=(object)$_POST;
    if (
$this->kontrolaStolica()){
        Mjesto::create($_POST);
        $this->index();
    }else{
        $this->view->render($this->viewDir . 'novi' ,[
            'poruka'=>$this->poruka,
            'mjesto'=>$this->mjesto
        ]);
    }

   }
    
     public function brisanje($sifra)
    {
        Mjesto::delete($sifra);
      
        header('location:' . App::config('url') . 'mjesto/index');



        
       
    }

    public function novi()
    {
        $this->view->render($this->viewDir. 'novi',[
            'poruka'=>'',
            'mjesto'=>$this->mjesto
        ]);
    }

    public function promjena($id)
    {
        $this->mjesto=Mjesto::readOne($id);
        $this->view->render($this->viewDir . 'promjena',[
            'poruka'=>'',
            'mjesto'=>$this->mjesto
        ]);
    }
   
    

}

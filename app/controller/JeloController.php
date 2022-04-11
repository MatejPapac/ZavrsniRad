<?php

class JeloController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'jelo' .DIRECTORY_SEPARATOR;


     private $poruka;

     private $nf;

     private $jela;


     public function __construct()
     {
         parent::__construct();
         $this->nf = new \NumberFormatter("hr-HR", \NumberFormatter::DECIMAL);
         $this->nf->setPattern('#,##0.00 kn');
         $this ->jela=new stdClass();
         $this->jela->naziv='';
         $this->jela->vrsta='1';
         $this->jela->cijena='';


     }


     public function index ()
     {
         $this->view->render($this->viewDir . 'index',[
             'jelo'=>Jelo::read(),
             'css'=>'<link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
            
         ]);
     }

     public function novi()
     {
         $this->view->render($this->viewDir . 'novi',[
             'poruka'=>'',
             'jelo'=>$this->jela
         ]);
     }

     public function promjena($id)
     {
         $this->jela=Jelo::readOne($id);
         $this->view->render($this->viewDir . 'promjena',[
             'poruka'=>'',
             'jelo'=>$this->jela
         ]);
     }

     public function promjeni()
     {
         $this->pripremiPodatke();
         if ($this->kontrolaNaziv()
        && $this->kontrolaVrsta()
        && $this->kontrolaCijena()){
            Jelo::update($_POST);
            $this->index();
        }else{
            $this->view->render($this->viewDir . 'promjena' ,[
                'poruka'=>$this->poruka,
                'jelo'=>$this->jela
            ]);
        }
     }

     private function pripremiPodatke()
     {
         $this->jela=(object)$_POST;
 
     }

     public function dodajNovi()
     {
      
    $this->jela=(object)$_POST;
    if ($this->kontrolaNaziv()
    && $this->kontrolaVrsta()
    && $this->kontrolaCijena()){
        Jelo::create($_POST);
        $this->index();
    }else{
        $this->view->render($this->viewDir . 'novi' ,[
            'poruka'=>$this->poruka,
            'jelo'=>$this->jela
        ]);
    }
    
  
     }

     public function kontrolaNaziv()
    {
        if(strlen($this->jela->naziv)===0){
            $this->poruka="Naziv obavezno";
            return false;
        }
        if(strlen($this->jela->naziv)>50){
            $this->poruka='Naziv ne smije biti duzi od 50 znakova';
            return false;
        }
        return true;


    }

    private function kontrolaCijena()
    {
        if(strlen(trim($this->jela->cijena))>0){

          
           
            $this->jela->cijena = str_replace('.','',$this->jela->cijena);
          
            $this->jela->cijena = (float)str_replace(',','.',$this->jela->cijena);
        
            if($this->jela->cijena<=0){
                $this->poruka='Ako unosite cijenu, mora biti decimalni broj veći od 0, unijeli ste: ' 
            . $this->jela->cijena;
            $this->jela->cijena='';
            return false;
            }
            return true;
        }

     
    }

    public function kontrolaVrsta()
    {
        if(strlen(trim($this->jela->vrsta))===0){
            $this->poruka='vrsta obavezno' ;
            return false;
        }
        $broj = (int) trim($this->jela->vrsta);
        if($broj<=0){
            $this->poruka='Vrsta mora biti cijeli broj veći od 0, unijeli ste: ' 
            . $this->jela->vrsta;
            return false;
        }
        if(fmod($broj,1) !==0.00){
            $this->poruka='vrsta mora biti cijeli broj unijeli ste decimalni broj:' 
             . $this->jela->vrsta;
             return false;
        }

return true;
}

  

    

     public function brisanje($sifra)
     {
         Jelo::delete($sifra);
       
         header('location:'. App::config('url') . 'jelo/index');
     }
}
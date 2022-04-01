<?php

class PiceController extends AutorizacijaController
{
    private $viewDir=
    'privatno' . DIRECTORY_SEPARATOR .
     'pice' .DIRECTORY_SEPARATOR;

     private $poruka;
     private $nf;
     private $pica;

     public function __construct()
     {
         parent::__construct();
         $this->nf = new \NumberFormatter("hr-HR", \NumberFormatter::DECIMAL);
         $this->nf->setPattern('#,##0.00 kn');
         $this->pica = new stdClass();
         $this->pica->naziv='';
         $this->pica->vrsta='1';
         $this->pica->cijena='';
   
     }
 


     public function index ()
     {
     $pica = Pice::read();
        foreach($pica as $p){
            $p->cijena=$this->nf->format($p->cijena);
        }
       
         $this->view->render($this->viewDir . 'index',[
             'pice'=>Pice::read(),
             'css'=>'    <link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
         ]);
     }
   public function novi()

   {
       $this->view->render($this->viewDir. 'novi',[
           'poruka'=>'Popunite podatke',
           'pica'=>$this->pica
       ]);
         
      
   }

   public function promjena($id)
   {
       $this->pica =Pice::readOne($id);
       $this->view->render($this->viewDir . 'promjena',[
        'poruka'=>'Promijenite podatke',
        'pica'=> $this->pica
       ]);

   }
     

       public function promjeni()
    {
        
        
        if($this->kontrolaNaziv()
        &&  $this->kontrolaVrsta()
        && $this->kontrolaCijena()){
            Pice::update((array)$this->pica);
        
            header('location:' . App::config('url').'pice/index');
        }else{
            $this->view->render($this->viewDir.'promjena',[
                'poruka'=>$this->poruka,
                'pica'=>$this->pica
            ]);
        }
    }



   public function dodajNovi()
   {
    
  $this->pica=(object)$_POST;
  if ($this->kontrolaNaziv()
  && $this->kontrolaVrsta()
  && $this->kontrolaCijena()){
      Pice::create($_POST);
      $this->index();
  }else{
      $this->view->render($this->viewDir . 'novi' ,[
          'poruka'=>$this->poruka,
          'pica'=>$this->pica
      ]);
  }
  

   }
    
     public function brisanje($sifra)
    {
        Pice::delete($sifra);
      
        header('location' .App::config('url') . 'pice/index');
    }
    public function kontrolaVrsta()
    {
        if(strlen(trim($this->pica->vrsta))===0){
            $this->poruka='vrsta obavezno' ;
            return false;
        }
        $broj = (int) trim($this->pica->vrsta);
        if($broj<=0){
            $this->poruka='Vrsta mora biti cijeli broj veći od 0, unijeli ste: ' 
            . $this->pica->vrsta;
            return false;
        }
        if(fmod($broj,1) !==0.00){
            $this->poruka='vrsta mora biti cijeli broj unijeli ste decimalni broj:' 
             . $this->pica->vrsta;
             return false;
        }

return true;
}



    private function kontrolaCijena()
    {
        if(strlen(trim($this->pica->cijena))>0){

          
           
            $this->pica->cijena = str_replace('.','',$this->pica->cijena);
          
            $this->pica->cijena = (float)str_replace(',','.',$this->pica->cijena);
        
            if($this->pica->cijena<=0){
                $this->poruka='Ako unosite cijenu, mora biti decimalni broj veći od 0, unijeli ste: ' 
            . $this->pica->cijena;
            $this->pica->cijena='';
            return false;
            }
            return true;
        }

     
    }


    public function kontrolaNaziv()
    {
        if(strlen($this->pica->naziv)===0){
            $this->poruka="Naziv obavezno";
            return false;
        }
        if(strlen($this->pica->naziv)>50){
            $this->poruka='Naziv ne smije biti duzi od 50 znakova';
            return false;
        }
        return true;


    }

        
      


  
        
    }

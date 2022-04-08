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
             'jela'=>Jelo::read(),
             'css'=>'<link rel="stylesheet" href="'.App::config('url').'public/css/piceindex.css">'
            
         ]);
     }

     public function novi()
     {
         $this->view->render($this->viewDir . 'novi',[
             'poruka'=>'',
             'jela'=>$this->jela
         ]);
     }

     public function promjena($id)
     {
         $this->jela=Jelo::readOne($id);
         $this->view->render($this->viewDir . 'promjena',[
             'poruka'=>'',
             'jela'=>$this->jela
         ]);
     }

     public function promjeni()
     {
         
     }

     public function brisanje($sifra)
     {
         Jelo::delete($sifra);
       
         header('location:'. App::config('url') . 'jelo/index');
     }
}
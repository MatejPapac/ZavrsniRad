<?php
class VjezbaController extends Controller
{

    private $viewDir = 'vjezbanje' . DIRECTORY_SEPARATOR;

    public function primjer1()
    {
        $this->view->render($this->viewDir . 'primjer1');
    }

    public function primjer2()
    {

        $sb = rand(2,9);
        $ime='Edunova';
        $o = new stdClass();
        $o->ime='Pero';
        $o->prezime='Perić';
        $niz=[
            'Osijek', 'Zagreb', 'Donji Miholjac'
        ];
        shuffle($niz);


        $this->view->render($this->viewDir . 'ispisParametara',[
            'slucajniBroj'=>$sb,
            'skola'=>$ime,
            'voditelj'=>$o,
            'gradovi'=>$niz
        ]);
    }
}
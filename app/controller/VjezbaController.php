<?php

class VjezbaController {
    public static function primjer1(){
        $view=new View();
        $view ->render('primjer1');
    }

    public static function primjer2(){
       
       $sb=rand(2,9);
       $ime='Edunova';
       $o=new stdClass();
       $o->ime='Pero';
       $o->prezime='Peric';
       $niz=[
           'Osijek','Zagreb','Donji Miholjac'
       ];
       
       
       
        $view=new View();
        $view ->render('ispisParametara',[
            'slucajniBroj'=>$sb,
            'skola'=>$ime,
            'voditelj'=>$o,
            'gradovi'=>$niz
        ]);
    }

}
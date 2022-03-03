<?php

class App
{
    public static function start()
    {
        //echo '<pre>';
        //print_r($_SERVER);
        //echo '</pre>';
        $ruta = Request::getRuta();
        //echo $ruta;

        $djelovi = explode('/',$ruta);
       // print_r($djelovi);

       $klasa='';
       if(isset($djelovi[1]) || $djelovi[1] ===''){
           $klasa='Index';

       }else{
           $klasa=ucfirst($djelovi[1]);
    }
    $klasa.='Controller';
    echo $klasa;

    $metoda='';
    if(isset($djelovi[2]) || $djelovi[2] ===''){
        $metoda='Index';

    }else{
        $metoda=($djelovi[2]);
        echo $klasa . '->' . $metoda . '()';

        if(class_exists($klasa) &&method_exists($klasa,$metoda))
        {

        }else{
            echo $klasa . '->' . $metoda . '() ne postoji';

        }

}
}
}
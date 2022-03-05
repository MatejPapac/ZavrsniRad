<?php

class Pice
{
  //CRUD


  //C-create


  //R-Read

  public static function read()
  {

    $veza=DB::getInstanca();
    $izraz = $veza->prepare('
    
    select * from pice
  
    
    
    ');

   $izraz->execute();
   return $izraz->fetchAll();
  }

  //U-update


  //D-Delete
}
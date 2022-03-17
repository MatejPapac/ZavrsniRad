<?php

class Pice
{
  //CRUD


  //C-create

  public static function create($parametri)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          insert into pice (naziv,cijena,vrsta)
          values (:naziv,:cijena,:vrsta);
      
      '); 
      $parametri
      
      $izraz->execute($parametri);
      
  }
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

 
    public static function delete($sifra)
    {
        $veza = DB::getInstanca();
        $izraz = $veza->prepare('

                    
            delete  
            from pice a left join vrsta b on
            a.vrsta=b.sifra
            where a.sifra=:sifra

        
        '); 
        $izraz->execute(['sifra'=>$sifra]);
       
    }
}
//delete  a.sifra,a.cijena,a.vrsta
//from pice a inner join vrsta b on
//a.vrsta=b.sifra
// where a.sifra=1
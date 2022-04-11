<?php


class Mjesto
{

    public static function readOne($kljuc)
    {
  
      $veza=DB::getInstanca();
      $izraz = $veza->prepare('
      
      select * from mjesto where sifra=:parametar;
    
      
      
      ');
  
     $izraz->execute(['parametar'=>$kljuc]);
     return $izraz->fetch();
    }
  //CRUD


  //C-create

  public static function create($parametri)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          insert into jelo (naziv,brojStolica)
          values (:naziv,:BrojStolica);
      
      '); 
    
      $izraz->execute($parametri);
      
  }
  //R-Read

  public static function read()
  {

    $veza=DB::getInstanca();
    $izraz = $veza->prepare('
    
    select * from mjesto;
  
    
    
    ');

   $izraz->execute();
   return $izraz->fetchAll();
  }

  //U-update

  
  public static function update($parametri)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          update mjesto set
            naziv=:naziv,
        brojStolica=:brojStolica,
      
      '); 
    
      $izraz->execute($parametri);
  }

  //D-Delete

 
  public static function delete($sifra)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          delete from mjesto where sifra=:sifra;
      
      '); 
      $izraz->execute(['sifra'=>$sifra]);

  }
}

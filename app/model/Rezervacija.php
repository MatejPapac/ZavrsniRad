<?php

class Rezervacija
{

    public static function readOne($kljuc)
    {
  
      $veza=DB::getInstanca();
      $izraz = $veza->prepare('
      
      select * from rezervacija where sifra=:parametar;
    
      
      
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
      
          insert into rezervacija (datumiVrijeme,osoba,brojRezerviranihMjesta,mjesto,kontakt,napomena)
          values (:datumiVrijeme,:osoba,:brojRezerviranihMjesta,:mjesto,:kontakt,:napomena);
      
      '); 
    
      $izraz->execute(['datumiVrijeme'=>$parametri['datumiVrijeme'],
      'brojRezerviranihMjesta'=>$parametri['brojRezerviranihMjesta'],
      'osoba'=>$parametri['osoba'],
      'kontakt'=>$parametri['kontakt'],
      'napomena'=>$parametri['napomena']
      ]);
      
  }
  //R-Read

  public static function read()
  {

    $veza=DB::getInstanca();
    $izraz = $veza->prepare('
    
    select a.mjesto ,a.sifra ,a.datumiVrijeme, a.osoba, a.brojRezerviranihMjesta, c.naziv as mjestoNaziv, a.kontakt, a.napomena
    from rezervacija a
    inner join rezervacija_mjesto b on a.sifra=b.rezervacija
    inner join mjesto c on c.sifra=b.mjesto
  
    
    
    ');

   $izraz->execute();
   return $izraz->fetchAll();
  }

  //U-update

  
  public static function update($parametri)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          update rezervacija set
            datum=:datum,
            brojRezerviranihMjesta =:brojRezerviranihMjesta,
            mjesto=:mjesto,
            kontakt=:kontakt
            napomena=:napomena
            where sifra =:sifra;
 
      '); 
    
      $izraz->execute($parametri);
  }

  //D-Delete

 
  public static function delete($sifra)
  {
      $veza = DB::getInstanca();
      $izraz = $veza->prepare('
      
          delete from rezervacija where sifra=:sifra;
      
      '); 
      $izraz->execute(['sifra'=>$sifra]);

  }
}

//delete  a.sifra,a.cijena,a.vrsta
//from pice a inner join vrsta b on
//a.vrsta=b.sifra
// where a.sifra=1
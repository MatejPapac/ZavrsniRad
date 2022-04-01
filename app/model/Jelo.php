<?php

class Jelo
{
    public static function readOne($kljuc)
    {
        $veza=DB::getInstanca();
        $izraz = $veza ->prepare(
            '
            select * from jelo where sifra=:parametar
            '
        );
        $izraz->execute
    }

}
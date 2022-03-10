<?php

if($_SERVER['SERVER_ADDR']==='127.0.0.1'){
    $url='http://zavrsni.xyz/';
    $dev=true;
    $baza=[
        'server'=>'localhost',
        'baza'=>'zavrsni',
        'korisnik'=>'edunova',
        'lozinka'=>'edunova'
    ];
}else{
    $url='http://www.zr-papac.shop/';
    $dev=false;
    $baza=[
        'server'=>'localhost',
        'baza'=>'zavrsni',
        'korisnik'=>'root',
        'lozinka'=>""
    ];
}

return [
 'dev'=>$dev,
 'url'=>$url,
 'naslovApp'=>'Bistro Loora',
 'baza'=>$baza
];
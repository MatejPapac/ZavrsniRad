<?php

if($_SERVER['SERVER_ADDR']==='164.92.76.139/'){
    $url='http://www.zr-papac.shop/';
    $dev=true;
    $baza=[
        'server'=>'zr-papac.shop',
        'baza'=>'zavrsni',
        'korisnik'=>'
        root@Papac',
        'lozinka'=>'$Rak95xpt'
    ];
}else{
    $url='http://www.zr-papac.shop/';
    $dev=false;
    $baza=[
        'server'=>'zr-papac.shop',
        'baza'=>'zavrsni',
        'korisnik'=>'edunova',
        'lozinka'=>'edunova'
    ];
}

return [
 'dev'=>$dev,
 'url'=>$url,
 'naslovApp'=>'Bistro Loora',
 'baza'=>$baza
];
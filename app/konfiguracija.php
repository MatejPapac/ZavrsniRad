<?php

if($_SERVER['SERVER_ADDR']==='127.0.0.1'){
    $url='http://zavrsni.xyz/';
}else{
    $url='';
}

return [
 'dev'=>true,
'url'=>'http://zavrsni.xyz/',
'naslovApp'=>'Bistro Loora',
'baza'=>[
    'server'=>'localhost',
    'baza'=>'zavrsni',
    'korisnik'=>'edunova',
    'lozinka'=>'edunova'
]
];
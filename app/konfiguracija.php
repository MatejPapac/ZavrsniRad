<?php
switch ($_SERVER['SERVER_ADDR']) {
    // Development or local
    case '127.0.0.1':
        $dev = true;
        $url = 'zavrsni.xyz/';
        $baza = [
            'server' => 'localhost',
            'baza' => 'zavrsni',
            'korisnik' => 'edunova',
            'lozinka' => 'edunova'
        ];
        break;
    // Production
    case '164.92.76.139':
       
        $dev = false;
        $url = 'http://www.zr-papac.shop/';
        $baza = [
            'server' => 'localhost',
            'baza' => 'zavrsni',
            'korisnik' => 'edunova',
            'lozinka' => 'edunova'
        ];
        break;

    default:
        echo 'Not valid server adress.';
        break;
}

return [
    'dev' => $dev,
    'url' => $url,
    'naslovApp' => 'Bistro Loora',
    'baza' => $baza
];
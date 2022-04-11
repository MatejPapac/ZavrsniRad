<?php

class EraController extends AutorizacijaController
{

    private $viewDir = 'privatno' . DIRECTORY_SEPARATOR;
    public function index()
    {
        $this->view->render('Era');
    }
} 
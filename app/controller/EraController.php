<?php

class EraController extends Controller
{

    private $viewDir = 'privatno' . DIRECTORY_SEPARATOR;
    public function index()
    {
        $this->view->render('Era');
    }
} 
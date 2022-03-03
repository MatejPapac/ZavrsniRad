<?php
class View
{
    private $predlozak;

    public function __construct($predlozak='predlozak')
    {
        $this->predlozak=$predlozak;
    }
    public function render ($phtmlstranica,$parametri=[])
    {
        ob_start();
        extract($parametri);
        include_once BP_APP .  'view'. DIRECTORY_SEPARATOR .$phtmlstranica . '.phtml';
        $sadrzaj = ob_get_clean();
        include_once BP_APP . DIRECTORY_SEPARATOR .'view' . $this->predlozak . '.phtml';
    }
}
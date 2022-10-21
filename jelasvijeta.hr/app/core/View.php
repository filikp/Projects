<?php

class View
{
    private $template;

    public function __construct($template='template')
    {
        $this->template = $template;
    }

    public function render($phtmlPage, $parameters=[])
    {
        //Log::log($parameters);
        ob_start();  // cashiraj
        extract($parameters);   // ključevi niza su nazivi varijable, a vrijednosti tih ključeva su vrijednosti varijabli
        include_once BP_APP . 'view' . DIRECTORY_SEPARATOR . $phtmlPage . '.phtml'; // uključuje $phtmlPage.phtml datoteku pod direktorijem view
        $content = ob_get_clean();  // u $content sprema do sad cashirano nakon ob_start(), ono što će ići u template.phtml
        include_once BP_APP . 'view' . DIRECTORY_SEPARATOR . $this->template . '.phtml';  // uključuje $template.phtml datoteku pod direktorijem view
    }
}
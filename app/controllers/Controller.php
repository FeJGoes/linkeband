<?php

namespace Controllers;

class Controller
{
    protected $css;
    protected $js;
    protected $title;
    protected $view;
    protected $data;

    public function render($title, $param, Bool $header =TRUE, Bool $footer =TRUE)
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="pt-BR">';
        require 'app/views/layout/head.php';
        
        echo '<body>';
        if ($header!==FALSE)
            require 'app/views/layout/header.php';

        if ($this->view)
            foreach ($this->view as $view)
                require_once $view;

        require 'app/views/layout/scripts.php';

        if ($footer!==FALSE)
            require 'app/views/layout/footer.php';

        echo '</body>';
        echo '</html>';
    }
    
    public function renderError($title)
    {
        echo '<!DOCTYPE html>';
        echo '<html lang="pt-BR">';
        require 'app/views/layout/head.php';

        echo '<body>';

        if ($this->view)
            foreach ($this->view as $view)
                require $view;

        echo '</body>';
        echo '</html>';       
    }

    public function joinBaseForEachPath (array $list, string $base)
    {
        foreach ($list as $item)
        {
            $result[] = $base.$item;
        }
        return $result;
    }

    public function setCss (array $css_array)
    {
        $this->css = $this->joinBaseForEachPath($css_array, CSS_DIR);
    }

    public function getCss ()
    {
        return $this->css;
    }

    public function setJs (array $js_array)
    {
        $this->js = $this->joinBaseForEachPath($js_array, JS_DIR);
    }

    public function getJs ()
    {
        return $this->js;
    }
    
    public function setView (array $view_array)
    {
        $this->view = $this->joinBaseForEachPath($view_array, VIEWS_DIR);
    }

    public function getView ()
    {
        return $this->view;
    }
}
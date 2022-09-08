<?php

abstract class AbstractController {
    
    protected static function render($tmpl = 'default', $rslt = null) {
        $templates = $tmpl;
        $result = $rslt;
        require './src/templates/cms/layout.php';
    }

    protected static function renderBis ($tmpl = 'default', $rslt = null) {
        $templates = $tmpl;
        $result = $rslt;
        require './src/templates/sites/layout.php';
    }
}


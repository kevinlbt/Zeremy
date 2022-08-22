<?php

abstract class AbstractController {
    
    protected static function render($tmpl = 'default', $rslt = null) {
        $templates = $tmpl;
        $result = $rslt;
        require './src/templates/layout.php';
    }
}
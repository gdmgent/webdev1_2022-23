<?php

if( ! function_exists('getClassName')) {
    function getClassName($classname) {
        return (substr($classname, strrpos($classname, '\\') + 1));
    }
}
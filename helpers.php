<?php

if( ! function_exists('__'))
{
    function __($text, $textdomain = null, $context = '')
    {
        return ProcessWire\__($text, $textdomain, $context);
    }
}
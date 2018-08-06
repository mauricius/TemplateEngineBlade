<?php

if( ! function_exists('__'))
{
    function __($text, $textdomain = null, $context = '')
    {
        return ProcessWire\__($text, $textdomain, $context);
    }
}

if( ! function_exists('_n'))
{
    function _n($textSingular, $textPlural, $count, $textdomain = null)
    {
        return ProcessWire\_n($textSingular, $textPlural, $count, $textdomain);
    }
}
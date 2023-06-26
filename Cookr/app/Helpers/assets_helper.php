<?php
if (!function_exists('css_url')) {
    function css_url($nom) 
    {
        return 'public/assets/css/' .$nom. '.css';
    }
}

if (!function_exists('js_url')) {
    function js_url($nom) 
    {
        return 'public/assets/js/' .$nom. '.js';
    }
}

if (!function_exists('img_url')) {
    function img_url($nom)
    {
        return 'public/assets/img/' .$nom;
    }
}
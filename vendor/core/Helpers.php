<?php

// Helper functions



// Build URL for application.
if(! function_exists('app_url')) {
    function app_url($path = '')
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/' . trim($path, '/');
    }
}
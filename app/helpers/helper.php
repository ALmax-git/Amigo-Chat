<?php

if (!function_exists('custom_asset')) {
    function custom_asset($path)
    {
        return url('build/' . $path);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PathsController extends Controller
{
    public static function get_python_executable() {
        $python_path = self::get_python_path();

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $python_path = $python_path . "Scripts/python.exe";
        } else {
            $python_path = $python_path . "bin/python";
        }

        return $python_path;
    }

    public static function get_python_path() {
        return dirname(base_path(), $levels = 1) . '/python/';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ScrapperController extends Controller
{
    public abstract static function generateCommands($args);
    public abstract static function consume_json($json);
    public abstract static function init($args);
}

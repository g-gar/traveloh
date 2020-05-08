<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class SentimentController extends Controller
{
    public static function execute($texts) {
        $results = [];
        foreach ($texts as $key => $text) {
            $command = PathsController::get_python_executable() . " " . PathsController::get_python_path() . "src/sentiment.py --text " . $text;
            array_push($results, CommandController::execute([$command]));
        }
        return $results;
    }

    public abstract static function init($args);
}

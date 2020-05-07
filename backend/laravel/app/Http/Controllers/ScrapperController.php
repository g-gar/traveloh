<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class ScrapperController extends Controller
{

    public static function execute($commands) {
        $jsons = [];
        try {
            foreach ($commands as $key => $command) {
                array_push($jsons, shell_exec($command));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return $jsons;
    }

    public abstract static function generateCommands($args);
    public abstract static function consume_json($json);

    public static function init($args) {
        $commands = self::generateCommands($args);
        foreach (self::execute($commands) as $key => $json) {
            self::consume_json($json);
        }
    }
}

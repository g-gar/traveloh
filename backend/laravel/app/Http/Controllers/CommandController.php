<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandController extends Controller
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
}

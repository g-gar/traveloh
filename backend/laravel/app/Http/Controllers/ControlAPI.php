<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ControlAPI extends Controller
{
    public function senti_api(){
        //Esta funcion será llamada en el momento que queramos hacer uno de la API de analisis de sentimiento,
        //bien con información que hayamos scrapeado previamente y tengamos almacenada en la bbdd o bien metida a mano
        $process = new Process(
            ['python', storage_path("app/execs/app_sentimiento.py"), 'Esto es un texto de prueba a analizar'] // ejecutamos 'python' + la ruta a nuestro archivo py (que se encuentra en execs)
        );

        $process->run();

        echo $process->getOutput();

    }
}

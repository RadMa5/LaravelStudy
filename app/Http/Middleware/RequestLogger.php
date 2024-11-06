<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Log;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response){
        if(env('API_DATALOGGER', true)){
            if(env('API_DATALOGGER_USE_DB', true)){
                $endtime = microtime(true);
                $log = new Log();
                $log->time = gmdate('Y-m-d H:m:s');
                $log->duration = number_format($endtime, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            } else {
                $endtime = microtime(true);
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = "Time: " . gmdate('H:m:s') . "\n";
                $dataToLog = "Duration: " . number_format($endtime, 3) . "\n";
                $dataToLog = "IP Address: " . $request->ip() . "\n";
                $dataToLog = "URL: " . $request->fullUrl() . "\n";
                $dataToLog = "Method: " . $request->method() . "\n";
                $dataToLog = "Input: " . $request->getContent() . "\n";
                \File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=" , 20) . "\n\n");
            }
        }
    }
}

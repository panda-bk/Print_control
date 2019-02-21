<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Carbon\Carbon;

class Counter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lastDay = Carbon::now()->lastOfMonth()->toDateString();        
        $rulesactive = \App\Rule::getRulesActive($lastDay);
        $date = date('Y-m-d H:i');
        foreach($rulesactive->prints as $print){         
            $getsnmp = \App\Counter::getCountersSnmp($print->ip);
            $getCounter = \App\Counter::where('id_print',$print->id)->orderBy('id','desc')->first()->total_page;
            $pageCounter = $getsnmp - $getCounter;
            if($pageCounter > 0){                
            $counters = new \App\Counter;           
            $counters->id_print=$print->id; 
            $counters->counters=$pageCounter;
            $counters->total_page=$getsnmp;
            $counters->date=$date;
            $counters->save();
            }
        }
    }        
        
}

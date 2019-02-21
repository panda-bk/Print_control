<?php 

namespace App\Repositories;

use App\Counter;

class CounterRepository implements CounterInterface {
    public function all(){
        return Counter::all();
    }
    public function save(Array $parms){
        $counters = new Counter;
        $counters->id_print=$parms['print_id'];
        $counters->date=$parms['date'];
        $counters->counters = 0;
        $counters->total_page = $parms['total_page'];
        $counters->save();
    }
    public function find($id){
        return Counter::find($id);
    }
    public function getSnmpConters(){
        $lastDay = Carbon::now()->lastOfMonth()->toDateString();        
        $rulesactive = \App\Rule::getRulesActive($lastDay);
        $date = date('Y-m-d H:i');
        foreach($rulesactive->prints as $print){       
            $getsnmp = \App\Counter::getCountersSnmp($print->ip);
            $getCounter = \App\Counter::where('id_print',$print->id)->orderBy('id','desc')->first()->total_page;
            $pageCounter = ($getsnmp - $getCounter);
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
    public function storeCounter($request){
        $ip = Printer::find($request->id_print);
        $getsnmp = \App\Counter::getCountersSnmp($ip->ip);
        $counters = new \App\Counter;
        $counters->id_print=$request->get('id_print');
        $counters->total_page=$request->get('total_page');
        $counters->date=$request->get('date');
        $counters->save();
    }
    public function updateCounter($request, $id)
    {   
        $counters=Counter::find($id);
        $counters->id_print=$request->get('id_print');
        $counters->total_page=$request->get('total_page');
        $counters->date=$request->get('date');
        $counters->save();
    }
    public function destroyCounter($id)
    {        
        $counters = Counter::find($id);
        $counters->delete();
    }
    
}
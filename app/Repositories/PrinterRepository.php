<?php 

namespace App\Repositories;

use App\Printer;
use Carbon\Carbon;

class PrinterRepository implements PrinterInterface {
    public function all(){
        return Printer::all();
    }
    public function find($id){
        return Printer::find($id);
    }
    public function getByBrand($brand){
        return Printer::where('brand',$brand)->get();
    }
    public function updatePrintControler($request, $id){
        $print= $this::find($id)->with('counter')->first();        
        $print->model=$request->get('model');
        $print->brand=$request->get('brand');
        $print->ip=$request->get('ip');
        $print->sector=$request->get('sector');
        $print->save();
        $counter= new \App\Counter();
        $counter->date=$date = date('Y-m-d H:i');
        $counter->id_print=$print->id;
        $counter->counters = 0;
        $counter->total_page=$request->get('first_value');
        $counter->save();
    }
    public function getPrint()
        {
            return Printer::pluck('model','id');
        }  
    public function reportPrint()
    {
        $lastDay = Carbon::now()->lastOfMonth()->toDateString();        
        $rulesactive = \App\Rule::getRulesActive($lastDay);
        foreach($rulesactive->prints as $print){
        $getCounter = \App\Counter::where('id_print',$print->id)->orderBy('id','desc')->first()->total_page;
        $counter['counter'][] = $getCounter;
        $model['model'][] = $print->model;
        $data = [$counter,$model];
        }
        return $data;
    }
}
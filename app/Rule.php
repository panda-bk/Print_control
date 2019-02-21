<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rule extends Model
{
    protected $table = 'rules';

    public function prints()
    {
        return $this->belongsToMany(Printer::class, 'print_rules_tables', 'id_rules', 'id_print');        
    }

    public static function countPage($id,$firstDate,$lastDate)
    { 
        $lastDay = Carbon::now()->lastOfMonth()->toDateString();      
        $rules = self::find($id);  
        $rulesactive = self::getRulesActive($lastDay);
        $totalSurplus = 0;
        $totalPage = 0;
        foreach($rulesactive->prints as $print){  
            $totalPage += $print->counter->whereBetween('date',[$firstDate,$lastDate])->sum('counters');
        };
        if($totalPage <= $rules->franchise){
            $totalPay = $rules->value_franchise;      
        }else{
            $totalSurplus = $totalPage - $rules->franchise;
            $totalPay = ($totalSurplus * $rules->value_surplus) + $rules->value_franchise;
        }
        $monthClosure = new \App\MonthClosure;
        $monthClosure->first_date=$firstDate;
        $monthClosure->last_date=$lastDate;
        $monthClosure->id_rule=$id;
        $monthClosure->value_franchise=$rules->franchise;
        $monthClosure->value_surplus=$totalSurplus;
        $monthClosure->total_page=$totalPage;
        $monthClosure->total_pay=$totalPay; 
        $monthClosure->save();
        return $monthClosure;
    }
    public static function getRules()
        {
            $rules = self::pluck('name_rules','id');
            return $rules;
        }
        public static function getRulesActive($last_date)
        {
            $rulesactive = self::where('last_date','>=',$last_date)->with('prints');
            return $rulesactive->first();
        }
}
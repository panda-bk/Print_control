<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
     public function printer()
        {
            return $this->belongsTo(Printer::class,'id_print');
        }
        public static function getCountersSnmp($ip)
        {            
            $session = new \SNMP(\SNMP::VERSION_1, $ip, "public");
            $counters = $session->walk('.1.3.6.1.4.1.11.2.3.9.4.2.1.4.1.2.6.0');
            foreach($counters as $counter ){
                $partes = explode(" ", $counter);  
            }            
            return $partes[1]; 
        }        
}

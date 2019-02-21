<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $table = 'prints';

    public function rules()
        {
            return $this->belongsToMany(Rule::class);        
        } 

        public function counter()
        {
            return $this->hasMany(Counter::class, 'id_print');
        }      
}

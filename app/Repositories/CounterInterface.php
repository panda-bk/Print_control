<?php
namespace App\Repositories;

interface CounterInterface { 
    public function all();
    public function find($id); 
    public function storeCounter($request);
    public function updateCounter($request, $id);
    public function destroyCounter($id);
}
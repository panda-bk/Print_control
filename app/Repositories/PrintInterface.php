<?php
namespace App\Repositories;


interface PrinterInterface { 
    public function all();
    public function find($id);    
    public function getByBrand($brand);
    public function updatePrintControler($request, $id);
    public function getPrint();
}
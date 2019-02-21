<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CounterRepository;
use App\Repositories\PrinterRepository;

class CountersController extends Controller
{
    private $counters;
    private $prints;
    public function __construct(CounterRepository $counters, PrinterRepository $prints){        
        $this->counters = $counters;
        $this->prints = $prints;
    }
    public function getresponse(){
        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $counters = $this->counters->all(); 
        return view('counters.list_counters', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       $prints = $this->prints->getPrint();
        return view('counters.create_counters', compact('prints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $counter = $this->counters->storeCounter($request);
        return redirect('/counters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counters=$this->counters->find($id);
        $prints = $this->prints->getPrint();
        return view('counters.edit_counters',compact('counters','id','prints'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $counters = $this->counters->updateCounter($request, $id);
        return redirect('counters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $counters = $this->counters->destroyCounter($id);
        return redirect('counters');
    }
    public function snmpCounters()
    {        
        $counters = $this->counters->getSnmpConters();     
    }
    public function reportPrint()
    {
        $data = $this->prints->reportPrint();
        return response()->json($data);
    }
}

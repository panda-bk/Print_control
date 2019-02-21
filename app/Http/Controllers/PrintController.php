<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PrinterRepository;
use App\Repositories\CounterRepository;

class PrintController extends Controller
{
    private $prints;
    public function __construct(PrinterRepository $prints){        
        $this->prints = $prints;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
        $prints = $this->prints->all();
        return view('print.list_print', compact('prints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('print.create_print');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CounterRepository $counter)
    {
        $print = new \App\Printer;
        $print->model=$request->get('model');
        $print->brand=$request->get('brand');
        $print->ip=$request->get('ip');
        $print->sector=$request->get('sector');
        $print->save();
        $printId = $print->id;
        $params=[
            'print_id' => $printId,
            'date' => date('Y-m-d H:i'),
            'total_page' => $request->get('first_value')
        ];
        $counter->save($params);
        return redirect('/print');
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
        $prints = $this->prints->find($id);
        $counter= \App\Counter::where('id_print',$id)->orderBy('id','desc')->first()->total_page;        
        return view('print.edit_print',compact('prints','id','counter'));
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
        $prints = $this->prints->updatePrintControler($request, $id);
        return redirect('/print');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $prints = $this->prints->find($id);
            $prints->delete();
            return redirect('print');
        }catch (\PDOException $e) {
            return redirect()->back()->with('error', 'Essa impressora faz parte de um contrato ativo');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules=\App\Rule::all();
        return view('rules.list_rules', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $print = \App\Printer::getPrint();
        return view('rules.create_rules', compact('print'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validade($request);
        $rules = new \App\Rule;
        $rules->name_rules=$request->get('name_rules');
        $rules->franchise=$request->get('franchise');
        $rules->value_franchise=$request->get('value_franchise');
        $rules->value_surplus=$request->get('value_surplus');
        $rules->start_date=$request->get('start_date');
        $rules->last_date=$request->get('last_date');
        $rules->save();
        $rules->prints()->attach($request->printers);
        return redirect('/rules');
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
    {   $rules= \App\Rule::find($id);
        return view('rules.edit_rules', compact('rules','id'));
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
        $this->_validade($request);
        $rules= \App\Rule::find($id);
        $rules->name_rules=$request->get('name_rules');
        $rules->franchise=$request->get('franchise');
        $rules->value_franchise=$request->get('value_franchise');
        $rules->value_surplus=$request->get('value_surplus');
        $rules->start_date=$request->get('start_date');
        $rules->last_date=$request->get('last_date');
        $rules->save();
        return redirect('rules');
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
            $rules= \App\Rule::find($id);
            $rules->delete();
            return redirect('rules');
        }
        catch (\PDOException $e) {
            return redirect()->back()->with('error', 'Esse contrato está ativo');
        }
    
    }
    public function calculatePage(Request $request)
    { 
        $countPage = \App\Rule::countPage($request->rules, $request->start_date,$request->last_date);         
        return redirect('/rules/finishing/'.$countPage->id);
    }
    public function finishingAccount()
    {
        $rules = \App\Rule::getRules();
        return view('rules.finishing_rules',compact('rules'));        
    }
    public function finishingList()
    {   
        $monthClosures = \App\MonthClosure::all();
        return view('rules.finishingList',compact('monthClosures'));
    }
    public function finishingView($id)
    {   $monthClosure= \App\MonthClosure::find($id); 
        $rule= \App\Rule::find($monthClosure->id_rule);
        return view('rules.finishingView', compact('monthClosure','rule'));
    
    }
    protected function _validade(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'franchise' => 'required|max:255',
            'value_franchise' => 'required|max:255',
            'value_surplus' => 'required|max:255',
            'start_date' => 'required|date',
            'last_date' => 'required|date'
        ]);        
    }
}

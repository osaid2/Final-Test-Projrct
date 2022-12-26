<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThesisRequest;
use App\Models\Category;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\SupervisorThesis;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::all();
        $students =Student::all();
        $supervisors =Supervisor::all();
        $records = Thesis::all();
        return view('theses', compact('records','students','categories','supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //ThesisRequest
    public function store(ThesisRequest $request)
    {
      
        $thesis_data = $request->except('_token','supervisor_ids');
        $thesis_data['active'] = isset($request->active) ? true : false;
        $supervisor_ids = $request->supervisor_ids;
        
        $record= Thesis::create($thesis_data);
     $thesis_supervisors_data = [];
     foreach($supervisor_ids as $k=>$v)
     {
 $thesis_supervisors_data[] = [
'thesis_id' =>$record->id,
'supervisor_id' => $v

 ];

     
    }
SupervisorThesis::insert($thesis_supervisors_data);


// $records = Thesis::all();
// foreach($records->supervisors as $item){
// dd($item);

// }
        return Redirect()->back()->with('succ','insert done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function show(Thesis $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function edit(Thesis $thesis)
    {
        // $thesis = Thesis::get();
        return view('theses', compact('thesis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thesis $thesis)
    {
        $fails = $request->validate([
            'title' => ['required','max:20']
        ]);

        $data = $request->all();

        $thesis->update($data);

        return redirect()->route('theses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thesis $thesis)
    {
        $thesis->delete();
        return redirect()->route('theses.index');
    }
}

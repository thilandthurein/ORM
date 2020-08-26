<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Department;
use App\Position;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PositionsExport;
use App\Imports\PositionsImport;
use PDF;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = DB::table('departments')->get();
        //$positions = DB::table('positions')->get();
        $position = Position::with('department')->get();


        return view('position', ['departments' => $departments,
                                'positions'=>$position
                                ]);
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
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'position_name' => ['required', 'unique:positions', 'max:255'],
            'id' => ['required']
        ]);


        
        $position = new Position();
        $position->position_name = $request['position_name'];
        $position->department_id = $request['id'];
        
        $position->save();

        return redirect('/position');
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function fileImport(Request $request){
        Excel::import(new PositionsImport, $request->file('file')->store('temp'));
         return back();
    }
 /**
 * @return \Illuminate\Support\Collection
 */
    public function excelExport() {
    return Excel::download(new PositionsExport,
        'PositionList.xlsx');
 } 
 public function csvExport() {
    return Excel::download(new PositionsExport,
        'PositionList.csv');
 } 

 public function createPDF() {
    // retreive all records from db
        $data = Position::all();
        $data=Position::with('department')->get();
    // share data to view
        view()->share('positions',$data);
        $pdf = PDF::loadView('pdf_viewposition', $data);
    // download PDF file with download method
        return $pdf->download('pdf_fileposition.pdf');
 }
}

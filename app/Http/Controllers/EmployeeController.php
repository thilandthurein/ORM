<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Position;
use App\Employee;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use PDF;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $position = Position::with('department')->get();
        $employees = Employee::with('position')->get();
        $positions = DB::table('positions')->get();
        return view('employee', ['employees' => $employees,
                                'positions' => $positions
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
            'name' => ['required', 'unique:employees', 'max:20'],
            'id' => ['required'],
            'email' => ['required'],
            'salary' => ['required']
    ]);
        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->position_id = $request['id'];
        $employee->email = $request['email'];
        $employee->salary = $request['salary'];
        
        $employee->save();

        return redirect('/employee');
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
 /**
 * @return \Illuminate\Support\Collection
 */
    public function fileImport(Request $request){
        Excel::import(new EmployeesImport, $request->file('file')->store('temp'));
         return back();
    }
 /**
 * @return \Illuminate\Support\Collection
 */
    public function fileExport() {
    return Excel::download(new EmployeesExport,
        'EmployeeList.xlsx');
 } 
     public function createPDF() {
    // retreive all records from db
        $data = Employee::all();
        $data=Employee::with('position')->get();
    // share data to view
        view()->share('employees',$data);
        $pdf = PDF::loadView('pdf_view', $data);
    // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
 }
}

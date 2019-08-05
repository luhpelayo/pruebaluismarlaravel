<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('admin.students.index',compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dateReport'      => 'required',
            'total'           => 'required',
            'in'              => 'required',
            'out'             => 'required',
            'active'          => 'required',
            'inactive'        => 'required',

        ]);

        $student=new Student();
        $student->dateReport=$request->get('dateReport');
        $student->total=$request->get('total');
        $student->in=$request->get('in');
        $student->out=$request->get('out');
        $student->active=$request->get('active');
        $student->inactive=$request->get('inactive');

//        if($request->get('org') !== '') {
//            $evento->org= $request->get('org');
//
//        } else {
//            $evento->org= Auth::user()->name;
//        }
        $student->user_id= \Auth::user()->id;

//        $file= $request->file('file');
//        if($file != null) {
//            $file_route = time().'_'.$file->getClientOriginalName();
//
//            if(Storage::disk('evento/archivo')->put($file_route, file_get_contents($file->getRealPath()))) {
//                $evento->url_document= $file_route;
//            } else {
//                Flash::error(' Error al guardar el archivo en los eventos. ');
//            }
//        }


        $student->save();
        $message = $student ? 'student agregado correctamente!' : 'Evento NO pudo agregarse!';

//        $receivers = Contact::pluck('email');
//        $name= "mensaje enviado Correctamente";
//        Mail::to($receivers)->send(new EmailSend($name));

        return redirect()->route('students.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Student
     */

    //     * @return \Illuminate\Http\Response
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student,Request $request)
    {

        $this->validate($request, [
            'dateReport'      => 'required',
            'total'    => 'required',
            'in' => 'required',
            'out'      => 'required',
            'active'      => 'required',
            'inactive'      => 'required',
        ]);
        $student->dateReport= $request->dateReport;
        $student->total= $request->total;
        $student->in= $request->in;
        $student->out= $request->out;
        $student->active= $request->active;
        $student->inactive= $request->inactive;

        $updated = $student->save();
        $message = $updated ? 'Datos actualizados correctamente!' : 'Los Datos NO pudieron actualizarse!';

        return redirect()->route('students.index')->with('message', $message);
    }

    /**
     * Delete the specified resource in storage.
     * @param Student $student
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function destroy(Student $student)
    {

        $deleted = $student->delete();

        $message = $deleted ? 'Datos eliminados correctamente!' : 'No pudo eliminarse!';

        return redirect()->route('students.index')->with('message', $message);
    }
}

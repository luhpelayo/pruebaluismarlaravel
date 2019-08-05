<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
class ReportController extends Controller
{
    public function index()
    {
        $students = Student::orderBy( 'created_at', 'ASC' );
        $students_dates= $students ->pluck( 'dateReport' );
        $students_out= $students ->pluck( 'out' );
        $students_total= $students ->pluck( 'total' );
        $students_active= $students ->pluck( 'active' );
        $students_inActive= $students ->pluck( 'inactive' );
        $students_in = $students->pluck( 'in' );

        $students_in = json_encode( $students_in );
        $students_dates = json_encode( $students_dates );
        $students_out = json_encode( $students_out );
        $students_total = json_encode( $students_total );
        $students_active = json_encode( $students_active );
        $students_inActive = json_encode( $students_inActive );

         return view('admin.report.estudiantes',compact('students_dates','students_in','students_out','students_total','students_active','students_inActive'));
    }
}

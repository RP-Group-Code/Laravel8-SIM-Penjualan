<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $data ['students'] = Student::all();
        return view('student.index');
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $students = Student::whereBetween('tanggal_keluar', [$start_date, $end_date])->get();
                } else {
                    $students = Student::latest()->get();
                }
            } else {
                $students = Student::latest()->get();
            }

            return response()->json([
                'students' => $students
            ]);
        } else {
            abort(403);
        }
    }
}

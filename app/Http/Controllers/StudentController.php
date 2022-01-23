<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderby('id','DESC')->get();
        return view('students',compact('students'));
    }

    public function afterSubmit(Request $request){
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return response()->json($student);
    }


    public function getStudentById($id){
        $student = Student::find($id);
         return response()->json($student);
    }

    public function updateStudent(Request $request){
        $student = Student::find($request->id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return response()->json($student);
    }

    public function deleteStudent($id){
        $student = Student::find($id);
        $student->delete();
         return response()->json(['success' => ' Record has been deleted successfully']);
    }

    public function deleteSelectedStudents(Request $request){
        $ids = $request->ids;
        Student::wherein('id',$ids)->delete();
        return response()->json(['success' => 'Records has been deleted successfully!']);
    }
}

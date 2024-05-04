<?php

namespace App\Http\Controllers;
use Exception;
use Validator;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function get(Request $request) {
        try {
            $students = null;

            if($request->id){
                $students = Student::where('id', $request->id)->get();
            } else {
                $students = Student::all();
            }
            $success['message']='Students';
            $success['data']=$students;
            return response()->json(['success'=>$success], 200);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }

    public function add(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender'=> 'required',
            'contact_number'=> 'required'
    
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        try {
            $input = $request->all();
            $student = Student::create($input);
            $success['message']='Student inserted';
            $success['data']=$student;
            return response()->json(['success'=>$success], 201);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }

    public function update(Request $request) {
        try {
            $student = Student::find($request->id);
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->gender = $request->gender;

            $student->save();
            $success['message']='Student updated';
            $success['data']=$student;

            return response()->json(['success'=>$success], 201);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }

    public function delete(Request $request) {
        try {
            $student = Student::find($request->id);
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->gender = $request->gender;

            $student->delete();
            $success['message']='Student deleted';
            $success['data']=$student;

            return response()->json(['success'=>$success], 201);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }
}


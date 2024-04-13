<?php

namespace App\Http\Controllers;
use Exception;
use Validator;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function get(Request $request) {
        try {
            $books = Book::all();
            $success['message']='Books list';
            $success['data']=$books;
            return response()->json(['success'=>$success], 200);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }

    public function add(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author'=> 'required',
            'edition' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        try {
            $input = $request->all();
            $book = Book::create($input);
            $success['message']='Book inserted';
            $success['data']=$book;
            return response()->json(['success'=>$success], 201);

        } catch(Exception $e) {
            return response()->json(['error'=>$e], 500);
        }
    }
}

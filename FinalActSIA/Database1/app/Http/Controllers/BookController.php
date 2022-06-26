<?php
namespace App\Http\Controllers;
use App\Models\Author;

use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Book;
use DB;

Class BookController extends Controller {
 use ApiResponser;
 private $request;
 public function __construct(Request $request){
 $this->request = $request;
 }

 /*
 public function getUsers(){
 $users = User::all();
 return response()->json(['data' => $users], 200);
 }
*/

 public function index()
 {
	$book = Book::all();
	return $this->successResponse($book);
 }

 public function add(Request $request){
	$rules = [
		'bookname' => 'required|max:20',
		'yearpublish' => 'required|max:10',
		'authorid' => 'required|numeric|min:1|not_in:0',
	];

	$this->validate($request,$rules);

	$author = Author::findOrFail($request->authorid);
	$book = Book::create($request->all());

    return $this->successResponse($book, Response::HTTP_CREATED);
 }

 public function show($id)
 {
	$book = Book::findOrFail($id);
	return $this->successResponse($book);
 }

 public function update(Request $request,$id)
 {
	$rules = [
	'bookname' => 'max:20',
	'yearpublish' => 'max:10',
	'authorid' => 'required|numeric|min:1|not_in:0',
	];

	$this->validate($request, $rules);

	$author = Author::findOrFail($request->authorid);
	$book = Book::findOrFail($id);

	$book->fill($request->all());

	if ($book->isClean()) {
		return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
	}

	$book->save();
	return $this->successResponse($book);
 }

public function delete($id) {
	$book = Book::findOrFail($id);
	$book->delete();
	return $this->successResponse($book);
 }
}
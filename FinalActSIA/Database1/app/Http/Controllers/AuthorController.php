<?php
namespace App\Http\Controllers;
use App\Models\Author;

use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Book;
use DB;

Class AuthorController extends Controller {
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
	$author = Author::all();
	return $this->successResponse($author);
 }

 public function add(Request $request){
	$rules = [
		'fullname' => 'required|max:20',
		'gender' => 'required|in:Male,Female',
		'birthday' => 'required|date',
	];

	$this->validate($request,$rules);

	$author = Author::create($request->all());
    return $this->successResponse($author, Response::HTTP_CREATED);
 }

 public function show($id)
 {
	$author = Author::findOrFail($id);
	return $this->successResponse($author);
 }

 public function update(Request $request,$id)
 {
	$rules = [
		'fullname' => 'max:20',
		'gender' => 'in:Male,Female',
		'birthday' => 'date',
	];

	$this->validate($request, $rules);

	$author = Author::findOrFail($id);

	$author->fill($request->all());

	if ($author->isClean()) {
		return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
	}

	$author->save();
	return $this->successResponse($author);
 }

public function delete($id) {
	$author = Author::findOrFail($id);
	$author->delete();
	return $this->successResponse($author);
 }
}
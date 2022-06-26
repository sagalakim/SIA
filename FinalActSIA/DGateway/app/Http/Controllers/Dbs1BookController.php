<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use DB;
use App\Services\Dbs1BookService;

Class Dbs1BookController extends Controller {
	use ApiResponser;

	public $dbs1bookService;

	
	public function __construct(Dbs1BookService $dbs1bookService){
		$this->dbs1bookService = $dbs1bookService;

	}
	public function index(){
		return $this ->successResponse($this -> dbs1bookService -> obtainUsers1());
	}
	public function add(Request $request){

		return $this->successResponse($this -> dbs1bookService -> createUser1($request->all(), Response::HTTP_CREATED));
	
	}
	public function show($id){
		return $this->successResponse($this -> dbs1bookService -> obtainsUsers1($id));
	}
	public function update(Request $request, $id){
		return $this->successResponse($this -> dbs1bookService -> editUser1($request->all(),$id));
	}
	public function delete($id){
		return $this->successResponse($this -> dbs1bookService -> deleteUser1($id));
	}
}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use DB;
use App\Services\Dbs1AuthorService;

Class Dbs1AuthorController extends Controller {
	use ApiResponser;

	public $dbs1authorService;

	
	public function __construct(Dbs1AuthorService $dbs1authorService){
		$this->dbs1authorService = $dbs1authorService;

	}
	public function index(){
		return $this ->successResponse($this -> dbs1authorService -> obtainUsers1());
	}
	public function add(Request $request){

		return $this->successResponse($this -> dbs1authorService -> createUser1($request->all(), Response::HTTP_CREATED));
	
	}
	public function show($id){
		return $this->successResponse($this -> dbs1authorService -> obtainsUsers1($id));
	}
	public function update(Request $request, $id){
		return $this->successResponse($this -> dbs1authorService -> editUser1($request->all(),$id));
	}
	public function delete($id){
		return $this->successResponse($this -> dbs1authorService -> deleteUser1($id));
	}
}
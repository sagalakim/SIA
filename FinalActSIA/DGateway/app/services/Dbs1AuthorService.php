<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class Dbs1AuthorService{
	
	use ConsumesExternalService;

	public $baseUri;

	public $secret;

	public function __construct(){
		$this -> baseUri = config('services.dbs1.base_uri');
		$this->secret = config('services.dbs1.secret');
	}

	public function obtainUsers1(){
		return $this->performRequest('GET', '/authors');
	}

	public function createUser1($data){
		return $this->performRequest('POST','authors',$data);
	}

	public function obtainsUsers1($id){
		return $this->performRequest('GET',"/authors/{$id}");
	}
	
	public function editUser1($data, $id){
		return $this->performRequest('PUT', "/authors/{$id}", $data);
	}

	public function deleteUser1($id){
		return $this->performRequest('DELETE', "/authors/{$id}");
	}
}
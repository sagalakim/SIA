<?php
 namespace App\Models;
 use Illuminate\Database\Eloquent\Model;

 class Book extends Model{
 protected $table = 'tblbooks';
 // column sa table
 protected $fillable = [
 'id','bookname', 'yearpublish', 'authorid'
 ];
 public $timestamps = false;
 protected $primaryKey = 'id';
 }
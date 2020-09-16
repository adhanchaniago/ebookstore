<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Config;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Ebookstore;
use DB;

class BookstoreApi extends Controller {

	private $HTTP_status = 200;
	private $status = '';
	private $message = '';
	private $response = [];

	public function __construct() {

	}

	public function createBook(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			'book_name' => 'required',
			'book_author' => 'required'
		]);

		if ($validator->fails()) {
			$this->status = 0;
			$this->message = $validator->errors()->all();
			$this->response = '';
		} else {
			$res = Ebookstore::create($request->all());
			if(!empty($res)) {
				$this->response = '';
				$this->message = 'Records inserted successfully!';
				$this->status = 1;
			} else {
				$this->response = '';
				$this->message = 'Records not inserted!';
				$this->status = 0;
			}
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}

	// Update Books //    
	public function updateBook(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			'book_name' => 'required',
			'book_author' => 'required'
		]);

		if ($validator->fails()) {
			$this->status = 0;
			$this->message = $validator->errors()->all();
			$this->response = '';
		} else {
			$book = Ebookstore::find($request->id);
			if(empty($book)) {
				$this->response = '';
				$this->message = 'Records not found!';
				$this->status = 0;
			} else {
				$book->book_name = $request->book_name;
				$book->book_author = $request->book_author;
				$res = $book->save(); 

				if(!empty($res)) {
					$this->response = '';
					$this->message = 'Records updated successfully!';
					$this->status = 1;
				} else {
					$this->response = '';
					$this->message = 'Records not updated!';
					$this->status = 0;
				}
			}
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}

	// Get Books //
	public function getBooks(Request $request) 
	{
		$res = Ebookstore::orderBy('id','DESC')->get();

		if(!empty($res)) {
			$this->response = $res;
			$this->message = 'Records found successfully!';
			$this->status = 1;
		} else {
			$this->response = '';
			$this->message = 'Records not found!';
			$this->status = 0;
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}

	// Delete Books
	public function deleteBook(Request $request) 
	{ 
		$book = Ebookstore::find($request->id);
		if(empty($book)) {
			$this->response = '';
			$this->message = 'Records not found!';
			$this->status = 0;
		} else {
			$res = $book->delete();
			if(!empty($res)) {
				$this->response = '';
				$this->message = 'Records deleted successfully!';
				$this->status = 1;
			} else {
				$this->response = '';
				$this->message = 'Records not deleted!';
				$this->status = 0;
			}
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}

	// Get Books by authors //
	public function getBooksByAuthor(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			'search' => 'required'
		]);

		if ($validator->fails()) {
			$this->status = 0;
			$this->message = $validator->errors()->all();
			$this->response = '';
		} else {     
			$search = $request->search;
			$res = Ebookstore::where('book_author','LIKE',"%{$search}%")->orderBy('id','DESC')->get();
			if(!empty($res)) {
				$this->response = $res;
				$this->message = 'Records found successfully!';
				$this->status = 1;
			} else {
				$this->response = '';
				$this->message = 'Records not found!';
				$this->status = 0;
			} 
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}

	// Get Author Having More Then 2 Book //
	public function authorMoreThan2Book(Request $request) 
	{
		$res = Ebookstore::select('book_author')->distinct()->orderBy('id','DESC')->get()->toArray();   

		$arrData = [];
		foreach ($res as $r) {
			$check = Ebookstore::where('book_author',$r['book_author'])->count();
			if($check>2){                
				array_push($arrData,$r['book_author']);
			}
		}

		if(!empty($arrData)) {
			$ft = Ebookstore::whereIn('book_author',$arrData)->get();
			$this->response = $ft;
			$this->message = 'Records found successfully!';
			$this->status = 1;
		} else {
			$this->response = '';
			$this->message = 'Records not found!';
			$this->status = 0;
		}

		return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
	}
}
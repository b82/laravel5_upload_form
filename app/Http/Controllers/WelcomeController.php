<?php namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Request;
use App\Post;

class WelcomeController extends Controller {

	
	public function __construct() {
		$this->middleware('guest');
	}

	
	public function index() {

		$posts = Post::orderBy('id', 'DESC')->get();
		return view('welcome', compact('posts'));
	}

	public function upload(){

		// se si fa upload senza immagine, Input::file('image') è NULL
		if(Input::hasFile('image')){

			// getting all of the post data
			$filename = Input::file('image')->getClientOriginalName();
			$file = array('image' => $filename);

			// setting up rules
			$rules = array('image' => 'required'); //'required|mimes:jpeg,jpg,png|max:200px'

			// doing the validation, passing post data, rules and the messages
			$validator = Validator::make($file, $rules);

			if ($validator->fails()) {

				// send back to the page with the input data and errors
				return 'ko';

			}else{

				if (Input::file('image')->isValid()) {
					
					$destinationPath = public_path().'\uploads'; // upload path
					
					//$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
					
					Input::file('image')->move($destinationPath, $filename);
					if (Input::hasFile('image')) {
						return 'uploaded';
					}

				}

			}


		}else{
			return 'no';
		}

		

	}

}

<?php namespace Lostgdi\Admin\App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
//use Input;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;
use Response;
use Validator;



class AdminController extends Controller {

	/*
	public function login()
	{
		return view('Admin::auth/login');
	}
	*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::whereRaw("`level`!=0")->paginate(10);
		//$users = User::paginate(20);

		return view('Admin::Admin')
			->with("users",$users);
	}

	public function welcome()
	{
		//dd("k");
		return view('Admin::welcome');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$final_array = array();
		$rules = array(
			'username'       => 'required|min:3|max:12|unique:users,username',
			'password'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			$final_array["message"]  = "fail";
			$final_array["message_array"] = $validator->messages();
			
		} else {

			$user = new User;
			$user->username = Input::get('username');
			$user->real_name = Input::get('real_name');
			$user->password = \Hash::make(Input::get('password'));
			$user->level = 1;
			$user->save();

			$final_array["message"]  = "success";
		}

		echo json_encode($final_array);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		//var_dump($id);exit();
		$user = User::find($id);
		echo json_encode($user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->real_name = Input::get('real_name');
		if( Input::has("password") )  $user->password = \Hash::make(Input::get('password'));
		$user->save();
		echo "success";
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::find($id);    
		$user->delete();
		echo "success";
	}

	public function __construct()
	{
		$this->middleware('web');
		$this->middleware('auth_admin_account');
		$this->middleware('auth_admin_account_manager', ['except' => 'welcome']);
		
	}

}

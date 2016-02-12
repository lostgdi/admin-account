<?php namespace Lostgdi\Admin\App\AUTH;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	//protected $redirectTo = '/manager/QA';

	public function index()
	{
	 	return view('Admin::auth/login');
	}


	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('web');
		
		
		//$this->middleware('guest', ['except' => 'logout']);
	}


	public function postLogin(Request $request)
	{
		$this->validate($request, ['username' => 'required', 'password' => 'required']);

		$credentials = [
			'username' => trim($request->get('username')),
			'password' => trim($request->get('password'))
		];

		$remember = $request->has('remember');

		//if ($this->auth->attempt($credentials, $remember)) {
		if (\Auth::attempt($credentials, $remember)) {
			if( Auth::user()->level==0 ) return redirect()->intended('/admin_account/');
			else return redirect()->intended('/admin_account/index_low');
		}

		//show error if invalid data entered
		return redirect()->back()->withErrors('Username/Password do not match')->withInput();
	}

	public function getLogout()
	{
		\Auth::logout();
		return redirect('/auth/');
	}
	

}

<?php

namespace Modules\UserModule\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\AuthHelper;
use Modules\UserModule\Repository\UserRepository;
use Modules\UserModule\Repository\WalletTransactionRepository;

class UserController extends Controller {
	public $user;
	private $userRepo;
	private $transactionRepo;
	private $authHelper;

	public function __construct(AuthHelper $authHelper, UserRepository $userRepo, WalletTransactionRepository $walletTransactionRepository) {
		$this->userRepo = $userRepo;
		$this->authHelper = $authHelper;
		$this->transactionRepo = $walletTransactionRepository;
	}

	public function updateProfile() {


		$data = request()->validate([
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'phone' => 'required|unique:users,phone,' . user()->id,
			'current_password' => 'sometimes|nullable|string',
			'new_password' => 'sometimes|nullable|string|min:6',
			'confirmed_password' => 'same:new_password',
		]);


		if ($data['current_password'] and $data['new_password'] and $data['confirmed_password']) {

			if (Hash::check($data['current_password'], user()->password)) {

				$data['password'] = bcrypt($data['new_password']);

			}

		}

		unset($data['current_password']);
		unset($data['new_password']);
		unset($data['confirmed_password']);

		user()->update($data);

		return back()->with('success', trans('commonmodule::swal.edited'));

	}

	public function checkEmail() {

		$user = $this->userRepo->findByEmail(request('email'));

		return $user ? "false" : "true";
	}

	public function checkEmailNotExist() {

		$user = $this->userRepo->findByEmail(request('email'));

		return $user ? "true" : "false";
	}

	public function user_index() {
		$users = $this->userRepo->findAll();
		return view('usermodule::user.index', ['users' => $users]);
	}

	public function show($id) {
		$user = $this->userRepo->userPackages($id)->load('transactions');
		return view('usermodule::user.show', ['user' => $user]);
	}

	public function deposit(Request $request, $id) {

		$request->validate([
			'value' => 'required|numeric|gt:0',

		]);
		$user = $this->userRepo->findById($id);
		if (!$user) {
			return back();
		}
		$data['user_id'] = $id;
		$data['value'] = $request->get('value');
		$trans = $this->transactionRepo->deposit($data);

		return back()->with('success', 'تم اضافة الرصيد بنجاح');

	}

	function getRegister(Request $request) {
		return view('frontmodule::pages.register');
	}

	function getLogin(Request $request) {
		return view('frontmodule::pages.login');
	}

	function register(Request $request) {

		$rules = [
			'first_name' => 'required|required|min:3',
			'last_name' => 'required|required|min:3',
			'phone' => 'required|unique:users,phone',
			'password' => 'required|min:6|max:20',
			'confirmed_password' => 'same:password',
		];

		// Validate Data
		$data = request()->validate($rules);

		$data['password'] = bcrypt($data['password']);

		$user = $this->userRepo->save($data);

		$this->authHelper->doLogin($user);

		return redirect()->intended('myaccount')->with('success', trans('frontmodule::front.logged_in'));
	}

	function login(Request $request) {

		$phone = $request->phone;

		$user = $this->userRepo->findByPhone($phone);

		if ($user and Hash::check($request->password, $user->password)) {

			$this->authHelper->doLogin($user);
			return redirect()->intended('myaccount')->with('success', trans('frontmodule::front.logged_in'));
		}

		return back()->with('error', trans('frontmodule::front.invalid'));

	}

	public function logout() {

		auth('user')->logout();

		return back();

	}

}

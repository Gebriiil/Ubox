<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Entities\Admin;
use Modules\AdminModule\Repository\AdminRepository;
class AdminModuleController extends Controller
{
    public $adminRepo;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->adminRepo = $adminRepository;
    }

    public function index()
    {

        $admins=$this->adminRepo->findAll();
        return view('adminmodule::admins.index',compact('admins'));
    }

    
    public function create()
    {
        return view('adminmodule::admins.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->adminRepo->save($data);

        return redirect('admin-panel/admins')->with('success','Successfully add');
    }

    
    public function show($id)
    {
        return view('adminmodule::show');
    }

    
    public function edit($id)
    {
        $admin=$this->adminRepo->findById($id);
        return view('adminmodule::admins.edit',compact('admin'));
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $this->adminRepo->update($data,$id);

        return redirect('admin-panel/admins')->with('success','Successfully Edit');
    }


    public function destroy($id)
    {
        $admin = $this->adminRepo->findById($id);
        $this->adminRepo->delete($admin);

        return redirect()->back();
    }
}

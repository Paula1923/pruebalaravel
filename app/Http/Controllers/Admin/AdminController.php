<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth; 
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AdminService;
 

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
    
    public function create()
    {
        return view('admin.login');
    }


    public function store(LoginRequest $request)
{
    $data = $request->all();
    $service = new AdminService();
    $loginStatus = $service->login($data);

    if ($loginStatus == 1) {
        return redirect()->route('dashboard.index');
    } else {
        return redirect()->back()->with('error_message', 'Invalid Email or Password!');
    }
}  

    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        return view('admin.update-password'); 
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        //
    }
}

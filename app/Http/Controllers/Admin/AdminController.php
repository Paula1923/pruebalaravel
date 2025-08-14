<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth; 
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AdminService;
use Illuminate\Support\Facades\Session;
 
class AdminController extends Controller
{

    protected $adminService;
    // Inject AdminService using Constructor
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }


    public function index()
    {    
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    
    public function create()
    {
        return view('admin.login');
    }


    public function store(LoginRequest $request)
{
    $data = $request->all();
    $loginStatus = $this->adminService->login($data);

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
        Session::put('page', 'update-password');
        return view('admin.update-password'); 
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function verifyPassword(Request $request)
    {
        $data = $request->all();
        return $this->adminService->verifyPassword($data);
    }

}

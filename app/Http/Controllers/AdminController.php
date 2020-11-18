<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
        //
    }

    public function usercreateform()
    {
        return view('pages.admin.userscreate');
    }

    public function usercreate() {
        // TODO
    }

    public function userlist()
    {
        $users = DB::table('users')
            ->select('users.*')
            ->get();
        return view('pages.admin.users', ['users' => $users]);
    }
}

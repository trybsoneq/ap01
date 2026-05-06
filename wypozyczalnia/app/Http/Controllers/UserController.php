<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::user()->roles->contains('name', 'Administrator')) {
            abort(403, 'Brak dostępu. Ta strona jest tylko dla Administratorów.');
        }

        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }
}
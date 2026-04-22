<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:accounts,login',
            'password' => 'required'
        ], [
            'login.unique' => 'Taki login już istnieje w bazie!'
        ]);

        $account = new Account();
        $account->login = $request->input('login');
        $account->password = bcrypt($request->input('password'));
        
        if (Auth::user()->role === 'admin' && $request->has('role')) {
            $account->role = $request->input('role');
        } else {
            $account->role = 'user';
        }

        $account->save();

        return back()->with('success', 'Nowe konto zostało pomyślnie dodane!');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Brak uprawnień do usuwania.');
        }

        Account::findOrFail($id)->delete();
        return back()->with('success', 'Konto zostało usunięte.');
    }
    public function edit($id)
    {
        $account = \App\Models\Account::findOrFail($id);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $account = \App\Models\Account::findOrFail($id);

        $request->validate([
            'login' => 'required|unique:accounts,login,' . $id,
        ]);

        $account->login = $request->input('login');

        if ($request->filled('password')) {
            $account->password = bcrypt($request->input('password'));
        }

        if (\Illuminate\Support\Facades\Auth::user()->role === 'admin' && $request->has('role')) {
            $account->role = $request->input('role');
        }

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Konto zostało zaktualizowane!');
    }
    
}
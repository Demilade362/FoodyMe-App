<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CustomerStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $users = User::where('role', null)->paginate(6);
        return view("admin.Customers.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $user = $request->validated();
        User::create($user);

        $userName = $user['name'];
        return redirect()->route('admin.customers.index')->with('msg', "$userName has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Display all trashed resource.
     */
    public function trashed()
    {
        $users = User::onlyTrashed()->paginate(8);
        return view('admin.Customers.suspend', compact('users'));
    }


    public function restore(string $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();


        return redirect()->route('admin.customers.index')->with('msg', "$user->name account has been restored");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id);

        $user->delete();

        return redirect()->route('admin.customers.index')->with('msg', "$user->name account has been suspended");
    }
}

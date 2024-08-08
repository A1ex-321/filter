<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function search(Request $request)
{
    $search = $request->input('query');

    // Fetch users with related designation and department, and apply filters for each
    $users = User::with('designation', 'department')
                 ->where(function($query) use ($search) {
                     $query->where('name', 'like', "%{$search}%")
                           ->orWhereHas('designation', function($q) use ($search) {
                               $q->where('name', 'like', "%{$search}%");
                           })
                           ->orWhereHas('department', function($q) use ($search) {
                               $q->where('name', 'like', "%{$search}%");
                           });
                 })
                 ->get();

    return response()->json($users);
}

}
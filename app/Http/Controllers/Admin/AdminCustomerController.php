<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function AllCustomer()
    {
        $data['customers'] = User::where('role', 'user')->latest()->get();
        return view('backend.all_customer', $data);
    }
}

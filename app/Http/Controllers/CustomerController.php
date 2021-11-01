<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::with('groups')->paginate(20);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customersGroups = CustomerGroup::all();
        return view('customers.create', compact('customersGroups'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        $customer = new Customer();
        $customer->first_name = $params['first_name'];
        $customer->last_name = $params['last_name'];
        $customer->email = $params['email'];
        $customer->sex = $params['sex'];
        $customer->birth_date = date('Y-m-d', strtotime($params['birth_date']));

        $customer->save();

        $customer->groups()->sync($params['group_ids']);
        return Redirect::to('/');
    }
}

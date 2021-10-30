<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerGroupController extends Controller
{
    public function index()
    {
        $customersGroups = CustomerGroup::all();
        return view('groups.index', compact('customersGroups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $title = $request->get('title');

        $group = new CustomerGroup();
        $group->title = $title;
        $group->save();
        return Redirect::to('customer-groups');
    }

    public function edit(int $id)
    {
        $group = CustomerGroup::find($id);
        return view('groups.edit', compact('group'));
    }

    public function update(int $id, Request $request)
    {
        $group = CustomerGroup::find($id);
        $group->title = $request->get('title');
        $group->save();
        return Redirect::to('customer-groups');
    }

    public function delete(int $id)
    {
        $group = CustomerGroup::find($id);
        $group->delete();
        return Redirect::to('customer-groups');
    }
}

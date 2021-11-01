<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CustomerGroup;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $groups = CustomerGroup::all();
        $templates = Template::all();
        return view('campaigns.create', compact('groups', 'templates'));
    }

    public function store(Request $request)
    {
        $campaign = new Campaign();
        $campaign->group_id = $request->get('group_id');
        $campaign->template_id = $request->get('template_id');
        $sendDate = $request->get('send_date') . " " . $request->get('send_time');
        $campaign->send_date = date("Y-m-d H:i:s", strtotime($sendDate));
        $campaign->save();
        return Redirect::to('campaigns');
    }
}

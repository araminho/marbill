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

    public function send($id)
    {
        $campaign = Campaign::find($id);
        if (!$campaign){
            echo "Campaign not found!";
        }
        $subject = $campaign->template->subject;
        $body = $campaign->template->body;
        $group = $campaign->group;
        $customers = $group->customers;
        $counter = 0;
        foreach ($customers as $customer) {
            try {
                $body = str_replace('{first_name}', $customer['first_name'], $body);
                $body = str_replace('{last_name}', $customer['last_name'], $body);
                $this->sendEmail($subject, $body, $customer['email']);
                $counter++;
            }
            catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        echo "Sent $counter emails!";
    }

    function sendEmail(string $subject, string $body, string $email)
    {
        mail($email, $subject, $body);
    }
}

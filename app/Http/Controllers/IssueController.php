<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Template;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function create ()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit ()
    {
        return view('issues.edit');
    }
    public function index ()
    {
        return view('issues.index');
    }
    public function board ()
    {
        return view('issues.board');
    }
    public function buttonIndex()
    {
        return view('issues.button');
    }

    public function detailIssue($issueId)
    {
        $issue = Issue::find($issueId);
        $data = [
            'task' => $issue->task,
            'issue' => $issue,
            'statuses' => Issue::STATUS,
            'priorities' => Issue::PRIORITY,
        ];
        return view('issues.detail', $data);
    }

    public function getViewCreateDefend()
    {
        $data = [
            'title' => 'Chiến lược phòng ngừa rủi do gây ra do issue quá hạn.'
        ];
        return view('issues.defend', $data);
    }

    public function getViewCreateDefendRisk()
    {
        $data = [
            'title' => 'Chiến lược phòng ngừa rủi ro'
        ];
        return view('issues.defend', $data);
    }
}

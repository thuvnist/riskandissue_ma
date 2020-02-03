<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Template;
use App\User;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function getViewTemplate(Request $request)
    {
        $data = [];
        $status = Issue::STATUS;
        $users = User::all();
        if ($request->template_id) {
            $template = Template::findOrFail($request->template_id);
            $issue = null;
            if ($request->issue_id) {
                $issue = Issue::find($request->issue_id);
            }
            $data = [
                'columns' => $template->columns,
                'status' => $status,
                'users' => $users,
                'priorities' => Issue::PRIORITY,
                'issue' => $issue,
            ];
        } else {
            return null;
        }
        $view = view('templates.view_form', $data);
        return $view->render();
    }

    public function create()
    {
        $users = User::all();
        $data = [
            'users' => $users,
        ];
        return view('template.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all(['name', 'show_user_id', 'use_user_id', 'approve_user_id', 'view_user_id', 'activities', 'description']);
        $column = [];
        if ($request->column_type) {
            foreach($request->column_type as $key => $value) {
                $column[] = [
                    'name' => $request->column_name[$key],
                    'description' => $request->column_desc[$key],
                    'type' => $request->column_type[$key],
                    'required' => $request->column_required[$key],
                ];
            }
        }
        $data['columns'] = $column;
        Template::create($data);
        return redirect()->route('templates.index');
    }

    public function index(Request $request)
    {
        $users = User::all();
        $templates = Template::query();
        if ($request->ajax()) {
            if ($request->name && isset($request->is_search['name'])) {
                $templates->where('name', $request->name);
            }
            if ($request->show_user_id && isset($request->is_search['show_user_id'])) {
                $templates->where('show_user_id', $request->show_user_id);
            }
            if ($request->approve_user_id && isset($request->is_search['approve_user_id'])) {
                $templates->where('approve_user_id', $request->approve_user_id);
            }
            if ($request->use_user_id && isset($request->is_search['use_user_id'])) {
                $templates->where('use_user_id', $request->use_user_id);
            }
            if ($request->view_user_id && isset($request->is_search['view_user_id'])) {
                $templates->where('view_user_id', $request->view_user_id);
            }
            $data = [
                'templates' => $templates->get(),
            ];
            return view('components.template_table', $data)->render();
        }
        $data = [
            'users' => $users,
            'templates' => $templates->get(),
        ];
        return view('template.index', $data);
    }
}

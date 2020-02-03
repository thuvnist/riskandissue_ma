@extends('layouts.app')
@section('nav')
    @include('layouts.nav_projects', ['id' => $project->id])
@endsection
@section('content')
<div class="container-fluid">
    <div class="row im-task-header-child">
        <div class="form-horizontal">
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="label-control" for=""></label>
                            <input style="margin-top: 5px;" class="form-control input-save-inline" data-href="{{ route('tasks.save_inline', $task->id) }}" value="{{ $task->name }}" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="label-control" for="">Mức ưu tiên</label>
                            <select class="form-control priority-select-save-inline" data-href="{{ route('tasks.save_inline', $task->id) }}" name="priority" id="">
                                @foreach($priorities as $key => $priority)
                                    <option @if ($task->priority == $key) selected @endif value="{{ $key }}">{{ $priority }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="label-control" for="">Trạng thái</label>
                            @if($task->status == 4)
                                <div>
                                    {{ $statuses[4] }}
                                </div>
                            @elseif($task->status == 3)
            
                                <div>
                                    {{ $statuses[3] }}
                                </div>
                            @else
                                <?php unset($statuses[3]);
                                unset($statuses[4]); ?>
                                <select class="form-control status-select-save-inline" data-href="{{ route('tasks.save_inline', $task->id) }}" name="status" id="">
                                    @foreach($statuses as $key => $status)
                                        <option @if ($task->status == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <p>Thưc hiện bởi
                                <b>
                                    @foreach($task->users as $user)
                                        {{ $user->name }}
                                    @endforeach
                                </b>, quan sát bởi
                                <b>
                                    @foreach($task->getViewUser() as $user)
                                        {{ $user->name }}
                                    @endforeach
                                </b>, phê duyệt bởi
                                <b>
                                    @foreach($task->getApproveUser() as $user)
                                        {{ $user->name }}
                                    @endforeach
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="" class="form-horizontal">
            <div class="box box-info">
                <div class="box-body">
                    <div class="issue">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="col-md-3">Mô tả</h3>
                                <div class="col-md-9">
                                    <div class="text-right d-flex" style="flex-direction: row-reverse">
                                        <b style="line-height: 100%; margin-left: 10px;">Đã làm được: @if(isset($task->worked_time)) {{ number_format($task->worked_time, 2, ',', ' ') }} @else 0 @endif h</b>
                                        <button type="button" class="btn btn-primary btn-start @if(isset($task->time_begin)) hidden @endif" data-href="{{ route('tasks.start') }}" data-task-id="{{ $task->id }}">Bắt đầu</button>
                                        <button type="button" class="btn btn-danger btn-end @if(!isset($task->time_begin)) hidden @endif" data-href="{{ route('tasks.end') }}" data-task-id="{{ $task->id }}">Kết thúc</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                {{ $task->description }}
                            </div>
                        </div>
                    </div>
                    <div class="issue">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Thông tin công việc</h3>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Hoàn thành</label>
                                    <div class="col-md-9">
                                        <select data-href="{{ route('tasks.save_inline', $task->id) }}" name="percent" class="form-control w-50 percent-select-save-inline">
                                            @foreach($percents as $key => $percent)
                                                <option @if($task->percent == $key) selected @endif value="{{ $key }}">{{ $percent }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Ngày bắt đầu</label>
                                    <div class="col-md-9">
                                        {{ $task->time_start }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6 font-weight-bold">
                                Báo cáo hàng ngày
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Ngày kết thúc</label>
                                    <div class="col-md-9">
                                        {{ $task->time_end }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                @php($i = 1)
                                @if (!empty($task->info))
                                    @foreach($task->info as $info)
                                        <div class="row">
                                            <label class="col-md-3">  {{ $i++ }}.</label>
                                            <div class="col-md-6">
                                                {{ $info['content'] }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $info['created_at'] }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="row">
                                    <label class="col-md-3" for="content">{{ $i++ }}.</label>
                                    <div class="col-md-9">
                                        <input id="content" value="" class="get-info-content" type="text"> <i class="fa fa-arrow-up text-success cursor-pointer btn-submit-info" data-href="{{ route('tasks.save_inline', $task->id) }}" style="font-size: 18px"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Thời gian (h)</label>
                                    <div class="col-md-9">
                                        {{ $task->estimate }}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3" for="">Quá hạn</label>
                                    @php($dateExpired = $task->getTimeExpired())
                                    @if($dateExpired > 0)
                                        <div class="col-md-9" style="color: red">
                                            {{ str_replace("+", "", $dateExpired) }} ngày
                                        </div>
                                    @else
                                        Chưa quá hạn.
                                    @endif
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Chi phí (VND)</label>
                                    <div class="col-md-9">
                                        {{ $task->cost }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="issue">
                            <div class="row mt-20">
                                <div class="col-md-6">
                                    <button @if($task->required_approved_date || $task->status == 3 || $task->percent != 6) disabled @endif data-href="{{ route('tasks.save_inline', $task->id) }}" type="button" class="btn btn-primary required-approve-btn">Yên cầu phê duyệt kết thúc công việc</button>
                                    @if ($task->approve_user_ids && in_array(auth()->user()->id, $task->approve_user_ids) && isset($task->required_approved_date))
                                        <button @if($task->status == 4) disabled @endif data-href="{{ route('tasks.save_inline', $task->id) }}" type="button" class="btn btn-primary approve-btn">
                                            Phê duyệt
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-12 font-weight-bold">
                                Lịch sử:
                            </div>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#home">Hoạt động</a></li>
                            <li><a data-toggle="pill" href="#menu1">Trao đổi</a></li>
                            <li><a data-toggle="pill" href="#menu2">Tài liệu</a></li>
                            <li><a data-toggle="pill" href="#menu3">Rủi ro</a></li>
                            <li><a data-toggle="pill" href="#menu5">Quan hệ vấn đề phát sinh</a></li>
                            <li><a data-toggle="pill" href="#menu6">Vấn đề phát sinh</a></li>
                        </ul>

                        <div class="tab-content mt-10">
                            <div id="home" class="tab-pane fade in active">
                            @for($i = 1; $i <=3; $i++) <div class="m-10">
                            <div data-toggle="collapse" data-target="#demo{{$i}}">
                                <div style="display: inline-flex" class="mt-10">
                                    <div class="boder-number">{{$i}}</div> 15:10, 25/07/2019, by:<span class="font-weight-bold"> Lê Hải Long</span><span><i class="fa fa-check-circle text-success"></i></span>
                                </div>
                            </div>
                            <div id="demo{{$i}}" class="collapse">
                                <p>Em nộp tài liệu tham khảo ạ</p>
                                <div class="row">
                                    <div class="col-lg-offset-2 col-lg-8">
                                        <p>Sau 2 ngày: <b>Lý Minh Hà</b><i class="fa fa-check-circle text-success"></i></p>
                                        <p>Sau 10 phút: <b>Trần Hải Nam</b></p>
                                        <div class="col-lg-offset-1 col-lg-8">
                                            <p>Chú làm chưa được chuẩn</p>
                                            <p>Tài liệu sai chủ đề</p>
                                            <p>Trong ngày mai gửi lại nhé</p>
                                        </div>
                                        <div class="form-inline">
                                            <input class="form-control w-50" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @endfor
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <div class="boder-number">4</div> 15:10, 25/07/2019, by: <b>Lê Hải Long</b><button dissabled class="ml-5 btn btn-primary">Đạt</button><button class="ml-5 btn btn-primary">Chưa đạt</button>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <p>Em nộp tài liệu tham khảo ạ</p>
                                    <div class="row">
                                        <div class="col-lg-offset-2 col-lg-8">
                                            <p>Sau 2 ngày: <b>Lý Minh Hà</b> <i class="fa fa-check-circle text-success"></i></p>
                                            <p>Sau 10 phút: <b>Trần Hải Nam</b></p>
                                            <div class="col-lg-offset-1 col-lg-8">
                                                <p>Chú làm chưa được chuẩn</p>
                                                <p>Tài liệu sai chủ đề</p>
                                                <p>Trong ngày mai gửi lại nhé</p>
                                            </div>
                                            <div class="form-inline col-lg-offset-1 col-lg-8">
                                                <input class="form-control w-50" style="margin-right: 10px" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary">Thêm mới hoạt động</button>
                                </div>
                                <div class="col-lg-12 mt-10">
                                    <textarea class="form-control" name="editor1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Trao đổi</h3>
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <span style="font-size: 12px">(20/11/2019 10:30)</span>
                                        <b>Lê Hải Long</b>: cần sửa lại nhiều
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="form-inline col-lg-12">
                                            <input class="form-control" style="margin-right: 10px" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Tài liệu</h3>
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <span>25/07/2019 15:10</span>
                                        Tài liệu thiết kế database , by: <b>Lê Hải Long</b> <a href="" class="text-primary" style="margin-left: 10px">tải xuống</a>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-inline">
                                                <input type="text" class="form-control" style="margin-right: 10px">
                                                <input type="file" class="form-control" style="margin-right: 10px">
                                                <a href="" class="btn btn-primary">Gửi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="menu3" class="tab-pane fade">
                            <h3>Rủi ro</h3>
                            <div class="box-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Loại</th>
                                        <th>Mô tả</th>
                                        <th>Mức độ nghiêm trọng</th>
                                        <th>Xu hướng</th>
                                        <th>Trạng thái</th>
                                        <th>Người phòng ngừa</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @if(!empty($task->risks))
                                        @php($j = 0)
                                        @foreach($task->risks as $key => $value)
                                            <tr>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">
                                                    <a href="{{ route('tasks.risks.detail', [$task->id, $key]) }}">{{ isset($value['title']) ? $value['title'] : '' }}</a>
                                                </td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['type']) ? \App\Issue::RISK_TYPE[$value['type']] : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['desc']) ? $value['desc'] : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['danger']) ? \App\Issue::RISK_DANGER[$value['danger']] : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['feature']) ? \App\Issue::RISK_FEATURE[$value['feature']] : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['status']) ? \App\Issue::RISK_STATUS[$value['status']] : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">{{ isset($value['user_id']) ? \App\User::getNameFromId($value['user_id']) : '' }}</td>
                                                <td class="{{ isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board' }}">
                                                    <div class="d-flex">
                                                        <button  class="risk-delete btn btn-danger" data-risk="{{ $key }}" type="button" ><i class="fa fa-trash"></i></button>
                                                        <button type="button" data-risk="{{ $key }}" data-task = "{{ $task->id }}" data-href="{{ route('tasks.risks.defend') }}" class="btn btn-primary ml-5 js-btn-risk js-btn-risk-defend">Phòng ngừa</button>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif

                                </table>
                                <div class="mt-20">
                                    <button type="button" data-href="{{ route('tasks.risks.create', $task->id) }}" class="btn btn-primary create-risk">Thêm mới rủi ro</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">

                            <div class="box-body">
                                @foreach($task->issues as $issue)
                                    <div>
                                        <div class="bg-div bg-1" data-toggle="collapse" data-target="#{{ $issue->id }}">
                                            <span>
                                                <a href="{{ route('issues.detail', $issue->id) }}">
                                                    {{ $issue->title }}
                                                </a>
                                                - Trạng thái: <span class="{{ $issue->getColorClass() }}" style="padding: 2px">{{ $issue->status_name }}</span>
                                                - người tạo: {{ $issue->created_by_name }} - loại: {{ \App\Issue::TYPE[$issue->type] }}
                                                 - ngày bắt đầu: {{ $issue->start_date }} - ngày kết thúc: {{ $issue->end_date }}
                                            </span><br>
                                            <span class="bg-success" style="padding: 2px">{{ $issue->description }}</span>
                                        </div>
                                        <div id="{{ $issue->id }}" class="collapse" style="margin-left: 40px">
                                            <div>
                                                <div class="bg-div bg-warning"
                                                     data-toggle="collapse"
                                                     data-target="#{{ $issue->id }}require">
                                                    <span>Phụ thuộc</span>
                                                </div>

                                                <div id="{{ $issue->id }}require" class="collapse" style="margin-left: 40px">
                                                    @php($is = $issue->requireIssue())
                                                    @if($is)
                                                        <div>
                                                            <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="{{ $is->color_name }}" style="padding: 2px">{{ $is->status_name }}</span> {{ $is->title }}
                                                            </span>
                                                                - Trạng thái: <span class="{{ $is->color_name }}" style="padding: 2px">{{ $is->status_name }}</span>
                                                                - người tạo: {{ $is->created_by_name }} - loại: {{ \App\Issue::TYPE[$is->type] }}
                                                                - ngày bắt đầu: {{ $is->start_date }} - ngày kết thúc: {{ $is->end_date }}
                                                                <br>
                                                                <span class="bg-success" style="padding: 2px">{{ $is->description }}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-danger"
                                                     data-toggle="collapse"
                                                     data-target="#{{ $issue->id }}subordinate">
                                                    <span>Khóa</span>
                                                </div>

                                                <div id="{{ $issue->id }}subordinate" class="collapse" style="margin-left: 40px">
                                                    @php($subordinates = $issue->subordinateIssue())
                                                    @if($subordinates)
                                                        @foreach($subordinates as $subordinate)
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                {{ $subordinate->title }}
                                                            </span>
                                                                    - Trạng thái: <span class="{{ $subordinate->color_name }}" style="padding: 2px">
                                                                    {{ $subordinate->status_name }}
                                                                </span>
                                                                    - người tạo: {{ $subordinate->created_by_name }} - loại: {{ \App\Issue::TYPE[$subordinate->type] }}
                                                                    - ngày bắt đầu: {{ $subordinate->start_date }} - ngày kết thúc: {{ $subordinate->end_date }}<br>
                                                                    <span class="bg-success" style="padding: 2px">{{ $subordinate->description }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-primary"
                                                     data-toggle="collapse"
                                                     data-target="#{{ $issue->id }}relative">
                                                    <span>Liên quan</span>
                                                </div>

                                                <div id="{{ $issue->id }}relative" class="collapse" style="margin-left: 40px">
                                                    @php($subordinates = $issue->relativeIssue())
                                                    @if($subordinates)
                                                        @foreach($subordinates as $subordinate)
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="{{ $subordinate->color_name }}" style="padding: 2px">
                                                                    {{ $subordinate->status_name }}
                                                                </span>
                                                                {{ $subordinate->title }}
                                                            </span>
                                                                    - Trạng thái: <span class="{{ $subordinate->color_name }}" style="padding: 2px">
                                                                    {{ $subordinate->status_name }}
                                                                </span>
                                                                    - người tạo: {{ $subordinate->created_by_name }} - loại: {{ \App\Issue::TYPE[$subordinate->type] }}
                                                                    - ngày bắt đầu: {{ $subordinate->start_date }} - ngày kết thúc: {{ $subordinate->end_date }}
                                                                    <br>
                                                                    <span class="bg-success" style="padding: 2px">{{ $subordinate->description }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-success"
                                                     data-toggle="collapse"
                                                     data-target="#{{ $issue->id }}similar">
                                                    <span>Tương tự</span>
                                                </div>

                                                <div id="{{ $issue->id }}similar" class="collapse" style="margin-left: 40px">
                                                    @php($subordinates = $issue->similarIssue())
                                                    @if($subordinates)
                                                        @foreach($subordinates as $subordinate)
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="{{ $subordinate->color_name }}" style="padding: 2px">
                                                                    {{ $subordinate->status_name }}
                                                                </span>
                                                                {{ $subordinate->title }}
                                                            </span>
                                                                    - Trạng thái: <span class="{{ $subordinate->color_name }}" style="padding: 2px">
                                                                    {{ $subordinate->status_name }}
                                                                </span>
                                                                    - người tạo: {{ $subordinate->created_by_name }} - loại: {{ \App\Issue::TYPE[$subordinate->type] }}
                                                                    - ngày bắt đầu: {{ $subordinate->start_date }} - ngày kết thúc: {{ $subordinate->end_date }}
                                                                    <br>
                                                                    <span class="bg-success" style="padding: 2px">{{ $subordinate->description }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-20">
                                    <button type="button" data-href="{{ route('tasks.issues.create', $task->id) }}" class="btn btn-primary create-issue">Tạo issue</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">

                            <div class="box-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Trạng thái</th>
                                        <th>Loại vấn đề phát sinh</th>
                                        <th>Mô tả</th>
                                        <th>Người phụ trách</th>
                                        <th>Vấn đề phát sinh con</th>
                                        <th>Chú thích</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @foreach($task->issues as $issue)
                                        <tr>
                                            <td class="{{ $issue->getColorClass() }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">
                                                    {{ $issue->title }}
                                                </a>
                                            </td>
                                            <td class="{{ $issue->getColorClass() }}">{{ $issue->getStatusNameAttribute() }}</td>
                                            <td class="{{ $issue->getColorClass() }}">{{ $issue->getTypeLabel() }}</td>
                                            <td class="{{ $issue->getColorClass() }}">{{ $issue->description }}</td>
                                            <td class="{{ $issue->getColorClass() }}">{{ isset($issue->user) ? $issue->user->name : ''}}</td>
                                            <td class="{{ $issue->getColorClass() }}">{{ $issue->getChildIssue() }}</td>
                                            <td class="{{ $issue->getColorClass() }}">{{ $issue->note }}</td>
                                            <td class="{{ $issue->getColorClass() }}">
                                                <div class="d-flex">
                                                    <a class="btn btn-primary" href="{{ route('tasks.issues.edit', [$task->id, $issue->id]) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger ml-5 issue-delete" data-issue="{{ $issue->id }}" type="button" ><i class="fa fa-trash"></i></button>
                                                    @if(isset($issue->end_date))
                                                        @if($issue->end_date < now())
                                                            <button type="button" data-issue="{{ $issue->id }}" data-task = "{{ $task->id }}" data-href="{{ route('tasks.issues.defend') }}" class="btn btn-primary ml-5 js-btn-risk js-btn-issue-defend">Phòng ngừa</button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="mt-20">
                                    <button type="button" data-href="{{ route('tasks.issues.create', $task->id) }}" class="btn btn-primary create-issue">Tạo vấn đề </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <form class="form-delete-risk" action="{{ route('tasks.risks.delete', [$task->id]) }}" method="post">
        @method('delete')
        @csrf
        <input type="hidden" class="risk-input" name="risk_key" value="">
    </form>
    <form class="form-delete-issue" action="{{ route('tasks.issues.delete', [$task->id]) }}" method="post">
        @method('delete')
        @csrf
        <input type="hidden" class="issue-input" name="issue_id" value="">
    </form>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="col-md-4">
                </div>
                <h4 class="modal-title col-md-4 text-center">Chiến lược phòng ngừa rủi ro</h4>
                <div class="text-right col-md-4">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div id="myModalShow" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    $(document).on('click', '.risk-delete', function() {
        $('.risk-input').val($(this).data('risk'));
        $('.form-delete-risk').submit();
    });
    $(document).on('click', '.issue-delete', function() {
        $('.issue-input').val($(this).data('issue'));
        $('.form-delete-issue').submit();
    });
    $(document).on('click', '.btn-create-defend', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
            },
        });
    });
    //Pop up create issue and create risk
    $(document).on('click', '.create-risk', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
            },
        });

    });
    $(document).on('click', '.create-issue', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
                $('.js-multiple').select2();
                $('.select2-container').css('width', '100%');
            },
        });

    });
    $(document).on('click', '.js-btn-risk-defend', function() {
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task'),
            'risk' : $(this).data('risk')
        };
        $.ajax({
            type: 'post',
            url,
            data: data,
            success(data) {
                $('#myModal').find('.modal-body').html(data);
                $('#myModal').modal('show');
            },
        });
    });
    $(document).on('click', '.js-btn-issue-defend', function() {
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task'),
            'issue_id' : $(this).data('issue')
        };
        $.ajax({
            type: 'post',
            url,
            data: data,
            success(data) {
                $('#myModal').find('.modal-body').html(data);
                $('#myModal').modal('show')
            },
        });
    });
    $(document).on('click', '.btn-start', function() {
        $(this).addClass('hidden');
        $('.btn-end').removeClass('hidden');
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task-id'),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                console.log(data);
            },
        });
    });
    $(document).on('click', '.btn-end', function() {
        $('.btn-end').addClass('hidden');
        $('.btn-start').removeClass('hidden');
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task-id'),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                window.location.replace(data);
            },
        });
    });
    $(document).on('keyup', '.input-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            name : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });
    $(document).on('change', '.priority-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            priority : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });
    $(document).on('change', '.status-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            status : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('change', '.percent-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            percent : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.required-approve-btn', function () {
        $(this).prop('disabled', true);
        let url = $(this).data('href');
        let data = {
            required_approve : 1,
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.approve-btn', function () {
        $(this).prop('disabled', true);
        let url = $(this).data('href');
        let data = {
            approve : 1,
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.btn-submit-info', function() {
        let url = $(this).data('href');
        let data = {
            info : $('#content').val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

</script>
@endsection

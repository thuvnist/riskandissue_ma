@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row im-task-header-child">
            <div class="form-horizontal">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="label-control" for=""></label>
                                <input style="margin-top: 5px;" class="form-control input-save-inline" value="{{ $risk['title'] }}" type="text">
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Mức ưu tiên</label>
                                <select class="form-control priority-select-save-inline" data-href="" name="priority" id="">
                                    @foreach($priorities as $keyPr => $priority)
                                        <option @if($risk['priority'] == $keyPr) selected @endif value="{{ $keyPr }}">{{ $priority }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Trạng thái</label>
                                <select class="form-control status-select-save-inline" name="status" id="">
                                    @foreach($statuses as $keyPr => $status)
                                        <option @if($risk['status'] == $keyPr) selected @endif value="{{ $keyPr }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <p>Phòng ngừa bởi
                                    <b>
                                        {{ \App\User::getNameFromId($risk['created_by']) }}
                                    </b>, quan sát bởi
                                    <b>
                                        {{ \App\User::getNameFromId($risk['inspect_user']) }}
                                    </b>, phê duyệt bởi
                                    <b>
                                        {{ \App\User::getNameFromId($risk['approved_user']) }}
                                    </b>, phát hiện bởi
                                    <b>
                                        @if ($risk['detected_user'] == 0)
                                            {{ \App\User::DETECTED_USER[0] }}
                                        @else
                                            {{ \App\User::getNameFromId($risk['detected_user']) }}
                                        @endif
                                    </b>
                                </p>
                                <p>Thuộc quy trình <span data-toggle="modal" data-target="#modalChart" class="text-primary cursor-pointer">phòng ngừa rủi ro</span> (7 bước, bạn đang ở bước 3)</p>
                                <p class="text-primary">Vui lòng click vào chiến lược phòng ngừa để chuyển sang bước kế hoạch phản hồi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box box-info issue">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Mô tả: {{ $risk['desc'] }}
                        </div>
                        <div class="col-lg-6">
                            Thời gian tạo: @if (isset($risk['created_at']['date'])){{ date_format(date_create($risk['created_at']['date']), 'Y-m-d')  }} @else {{ date_format(date_create($risk['created_at']), 'Y-m-d')  }} @endif
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Hạn phòng ngừa: {{ $risk['deadline'] }}
                        </div>
                    </div>

                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Mức độ nghiêm trọng: {{ \App\Issue::getLabelRiskDanger($risk['danger']) }}
                        </div>
                        <div class="col-lg-6">
                            Xu hướng xảy ra: {{ \App\Issue::getLabelRiskDanger($risk['feature']) }}
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3>Kết thúc phòng ngừa risk</h3>
                        <button type="button" class="btn btn-primary">Yêu cầu phê duyệt kết thúc phòng ngừa risk</button>
                    </div>

                    <ul class="nav nav-pills mt-20">
                        <li class="active"><a data-toggle="pill" href="#menu3">Hoạt động</a></li>
                        <li><a data-toggle="pill" href="#menu4">Trao đổi</a></li>
                        <li><a data-toggle="pill" href="#menu5">Tài liệu</a></li>
                        <li><a data-toggle="pill" href="#menu6">Chiến lược phòng ngừa</a></li>
                        <li><a data-toggle="pill" href="#menu7">Vấn đề phát sinh</a></li>
                    </ul>

                    <div class="tab-content mt-10">
                        <div id="menu3" class="tab-pane fade in active mb-20">
                            <h3>Hoạt động</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Trao đổi</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <h3>Tài liệu</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <h3>Chiến lược phòng ngừa</h3>
                            <div class="box-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Loại chiến lược phòng ngừa</th>
                                        <th>Trạng thái kế hoạch hành động</th>
                                        <th>Mức ưu tiên</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($risk['defend']))
                                        @foreach($risk['defend'] as $keyPr => $value)
                                            <tr>
                                                <td>{{ $keyPr + 1 }}</td>
                                                <td>{{ \App\Task::GIAIQUYET[$value['type']] }}</td>
                                                <td>@if (isset($value['schedule_status'])){{ \App\Issue::DEFEND_SCHEDULE_STATUS[$value['schedule_status']] }} @endif</td>
                                                <td>{{ \App\Issue::DEFEND_PRIORITY[$value['priority']] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <button data-risk="{{ $riskKey }}" data-task="{{ $task->id }}" data-href="{{ route('tasks.risks.defend') }}" class="btn btn-primary js-btn-risk-defend mt-20 mb-20">Thêm chiến lược phòng ngừa</button>
                            </div>
                        </div>
                        <div id="menu7" class="tab-pane fade">
                            <h3>Vấn đề phát sinh</h3>
                            <div class="box-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalChart" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3>Quy trình phòng ngừa rủi ro<button type="button" class="close" data-dismiss="modal">&times;</button></h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div style="width: 850px; height: 700px; margin: auto; background-color: #ecf0f5;" class="position-relative">
                        <div class="box-circleci box-1 box-bg-1">
                            Start
                        </div>
                        <div class="box-square box-2 box-bg-1">
                            1. Xác định, rủi ro
                        </div>
                        <div class="box-square box-3 box-bg-1">
                            2. Phân tích và đặt mức ưu tiên rủi ro
                        </div>
                        <div class="box-square box-4 box-bg-2">
                            3. Lên kế hoạch phản hồi
                        </div>
                        <div class="box-square box-5">
                            4. Thực thi, theo dõi và kiểm soát
                        </div>
                        <div class="box-square box-6">
                            5. Phê duyệt rủi ro
                        </div>
                        <div class="box-square box-7">
                            6. Đóng rủi ro
                        </div>
                        <div class="box-rotate box-8">
                        </div>
                        <div class="box-square box-9">
                            7. Scale thành vấn đề phát sinh
                        </div>
                        <div class="box-circleci box-10">
                            Stop
                        </div>
                        <div class="line-temp-1 line-1">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-2 line-2">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-3">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-4">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-5">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-1 line-6">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-1 line-7">
                            rủi ro xảy ra
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-1 line-8">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-2 line-9">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-10">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>
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
                    let $modal = $('#myModalShow');
                    $modal.find('.modal-body').html('').append(data);
                    $modal.modal('show');
                },
            });
        });
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

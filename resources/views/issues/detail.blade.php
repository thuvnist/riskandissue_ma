@extends('layouts.app')
@section('content')

    <div class="container-fluid issue">
        <div class="row im-task-header-child">
            <div class="form-horizontal">
                <div class="box box-info mt-20">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="label-control" for=""></label>
                                <input style="margin-top: 5px;" class="form-control input-save-inline" data-href="{{ route('tasks.save_inline', $issue->id) }}" value="{{ $issue->title }}" type="text">
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Mức ưu tiên</label>
                                <select class="form-control priority-select-save-inline" data-href="{{ route('tasks.save_inline', $issue->id) }}" name="priority" id="">
                                    @foreach($priorities as $key => $priority)
                                        <option @if ($issue->priority == $key) selected @endif value="{{ $key }}">{{ $priority }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Trạng thái</label>
                                @if($issue->status == 4)
                                    <div>
                                        {{ $statuses[4] }}
                                    </div>
                                @elseif($issue->status == 3)
                                    <div>
                                        {{ $statuses[3] }}
                                    </div>
                                @else
                                    <?php unset($statuses[3]);
                                    unset($statuses[4]); ?>
                                    <select class="form-control status-select-save-inline" data-href="{{ route('tasks.save_inline', $issue->id) }}" name="status" id="">
                                        @foreach($statuses as $key => $status)
                                            <option @if ($issue->status == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <p>Giải quyết bời
                                    <b>
                                        tôi
                                    </b>, quan sát bởi
                                    <b>
                                        Trần Hải Nam
                                    </b>, phê duyệt bởi
                                    <b>
                                        Lý Minh Hà
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-info mt-20">
                    <div class="box-body">
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Trạng thái: {{ $issue->getStatusNameAttribute() }}
                            </div>
                            <div class="col-lg-6">
                                Ngày bắt đầu: {{ $issue->start_date }}
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Ưu tiên: {{ $issue->getPriorityNameAttribute() }}
                            </div>
                            <div class="col-lg-6">
                                Ngày kết thúc: {{ $issue->end_date }}
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Assigne: {{ $issue->user_id ? $issue->user->name : '' }}
                            </div>
                            <div class="col-lg-6">
                                % Đã làm: {{ $issue->getLabelPercent() }}
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Loại: {{ $issue->type_label }}
                            </div>
                            <div class="col-lg-6">
                                Thời gian: {{ $issue->time ? $issue->time . ' giờ' : '' }}
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Mô tả: {{ $issue->description }}
                            </div>
                            <div class="col-lg-6">
                                Issue con:
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-12">
                                <h3>Kết thúc giải quyết issue</h3>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary">Yêu cầu phê duyệt kết thúc issue</button>
                            </div>
                        </div>

                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#menu3">Công việc liên quan</a></li>
                            <li><a data-toggle="pill" href="#menu5">Liên kết issue</a></li>
                            <li><a data-toggle="pill" href="#menu4">Hướng giải quyết</a></li>
                            @if(isset($issue->end_date))
                                @if($issue->end_date < now())
                                    <li><a data-toggle="pill" href="#menu6">Chiến lược phòng ngừa rủi ro quá hạn</a></li>
                                @endif
                            @endif
                        </ul>
                        <div class="tab-content mt-10">
                            <div id="menu3" class="tab-pane fade in active mb-20">
                                <div class="box-body">
                                    Công việc 1 được tạo bởi <b>
                                        Lý Minh Hà
                                    </b> <span>Giải quyết bời
                                        <b>
                                            tôi
                                        </b>, quan sát bởi
                                        <b>
                                            Trần Hải Nam
                                        </b>, phê duyệt bởi
                                        <b>
                                            Lý Minh Hà
                                        </b>
                                    </span>
                                </div>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <h3>Hướng giải quyết</h3>
                                <div class="w-50">
                                    <textarea class="form-control">{{ $issue->solution }}</textarea>
                                </div>
                            </div>
                            <div id="menu5" class="tab-pane fade">

                                <div class="box-body">
                                    @if(!empty($issue->getRequiredIssue()))
                                        @php($requiredIssue = $issue->getRequiredIssue())
                                        <label class="text-danger bl">Khóa</label>
                                        <div class="">
                                            <div class="col-sm-4">
                                                <p>{{ $requiredIssue->title }}</p>
                                            </div>
                                            <div class="col-sm-4 cv_percent bg-primary" title="{{ $requiredIssue->getLabelPercent() }} hoàn thành">
                                                <div style="width: {{ $requiredIssue->getLabelPercent() }};" class="percent_cv"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>{{ $requiredIssue->title }}</p>
                                                <p class="author123">{{ $requiredIssue->getNameCreated() }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!empty($issue->getSubordinateIssue()))
                                        @foreach($issue->getSubordinateIssue() as $datum)
                                            <label>Phụ thuộc</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                </div>
                                                <div class="col-sm-4 cv_percent {{ $datum->getColorClass() }}" title="{{ $datum->getLabelPercent() }} hoàn thành">
                                                    <div style="width: {{ $datum->getLabelPercent() }};" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                    <p class="author123">{{ $datum->getNameCreated() }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(!empty($issue->getRelativeIssue()))
                                        @foreach($issue->getRelativeIssue() as $datum)
                                            <label>Issue liên quan</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                </div>
                                                <div class="col-sm-4 cv_percent {{ $datum->getColorClass() }}" title="{{ $datum->getLabelPercent() }} hoàn thành">
                                                    <div style="width: {{ $datum->getLabelPercent() }};" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                    <p class="author123">{{ $datum->getNameCreated() }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(!empty($issue->getSimilarIssue()))
                                        @foreach($issue->getSimilarIssue() as $datum)
                                            <label>Tương tự</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                </div>
                                                <div class="col-sm-4 cv_percent {{ $datum->getColorClass() }}" title="{{ $datum->getLabelPercent() }} hoàn thành">
                                                    <div style="width: {{ $datum->getLabelPercent() }};" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>{{ $datum->title }}</p>
                                                    <p class="author123">{{ $datum->getNameCreated() }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div>
                                        <button data-href="{{ route('issues.updateRelative', $issue->id) }}" class="btn btn-primary js-modal-relative">Liên kết issue</button>
                                    </div>
                                </div>
                            </div>
                            <div id="menu6" class="tab-pane fade">
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
                                        @if ($issue->defend)
                                            @foreach($issue->defend as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ \App\Task::GIAIQUYET[$value['type']] }}</td>
                                                    <td>{{ \App\Issue::DEFEND_SCHEDULE_STATUS[$value['schedule_status']] }}</td>
                                                    <td>{{ \App\Issue::DEFEND_PRIORITY[$value['priority']] }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <button type="button" data-issue="{{ $issue->id }}" data-task = "{{ $task->id }}" data-href="{{ route('tasks.issues.defend') }}"  class="btn btn-primary js-btn-issue-defend mb-20">Thêm chiến lược phòng ngừa rủi ro</button>
                            </div>
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
    <div id="modalRelative" class="modal fade">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3>Liên kết vấn đề<button type="button" class="close float-right" data-dismiss="modal">&times;</button></h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="w-50">
                        <h4>Loại liên kết</h4>
                        <select class="form-control js-set-relative">
                            <option value="1">Vấn đề liên quan</option>
                            <option value="2">Vấn đề tương tự</option>
                            <option value="3">Vấn đề khóa</option>
                            <option value="4">Vấn đề phụ thuộc</option>
                        </select>
                    </div>
                    <form action="" method="POST" class="w-50" id="formRelative">
                        @csrf
                        @method('PATCH')
                        <h4>Chọn vấn đề</h4>
                        <div class="js-select-relative" id="relative1">
                            <select class="js-multiple form-control" multiple="multiple" name="relative_issue_ids[]">
                                <option value="">None</option>
                                @foreach($task->issues as $datum)
                                    @if ($issue->id != $datum->id)
                                        <option @if(in_array($datum->_id, (array)$issue->relative_issue_ids)) selected @endif value="{{ $datum->id }}">{{ $datum->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative2">
                            <select class="js-multiple form-control" multiple="multiple" name="similar_issue_ids[]">
                                <option value="">None</option>
                                @foreach($task->issues as $datum)
                                    @if ($issue->id != $datum->id)
                                        <option @if(in_array($datum->_id, (array)$issue->similar_issue_ids)) selected @endif value="{{ $datum->id }}">{{ $datum->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative3">
                            <select class="form-control" name="required_issue_id">
                                <option value="">None</option>
                                @foreach($task->issues as $datum)
                                    @if ($issue->id != $datum->id)
                                        <option @if(in_array($datum->_id, (array)$issue->subordinate_issue_ids)) disabled @endif @if($issue->required_issue_id == $datum->_id) selected @endif value="{{ $datum->id }}">{{ $datum->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative4">
                            <select class="js-multiple form-control" multiple="multiple" name="subordinate_issue_ids[]">
                                <option value="">None</option>
                                @foreach($task->issues as $datum)
                                    @if ((empty($datum->required_issue_id) || $issue->id == $datum->required_issue_id) && $issue->id != $datum->id)
                                        <option @if($issue->required_issue_id == $datum->_id) disabled @endif @if(in_array($datum->_id, (array)$issue->subordinate_issue_ids)) selected @endif value="{{ $datum->id }}">{{ $datum->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary mt-20">Tạo liên kết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
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
                    let $modal = $('#myModalShow');
                    $modal.find('.modal-body').html('').append(data);
                    $modal.modal('show');
                },
            });
        });
        CKEDITOR.replace( 'editor1' );
        $(document).on('click', '.js-modal-relative', function () {
            $('#formRelative').attr('action', $(this).data('href'));
            $('#modalRelative').modal('show')
        })
        $(document).on('change', '.js-set-relative', function () {
            $('.js-select-relative').addClass('d-none');
            $('#relative' + $(this).val()).removeClass('d-none');
        })
    </script>
@endsection

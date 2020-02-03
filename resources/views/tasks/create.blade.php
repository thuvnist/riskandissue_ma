@extends('layouts.app')
@section('nav')
    @include('layouts.nav_projects', ['id' => $project->id])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box-info box">
                <div class="box-body">
                    <form id="submitForm" action="{{ route('projects.task.store', $project->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="">Tên công việc:</label>
                                    <div class="">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Mô tả:</label>
                                    <div>
                                        <textarea name="description" id="" cols="60" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="startDate" class="control-label">Ngày bắt đầu</label>
                                    <div class="">
                                        <input type="date" name="time_start" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="endDate" class="control-label">Ngày kết thúc</label>
                                    <div class="">
                                        <input type="date" name="time_end" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">Thời gian thực hiện</label>
                                    <div class="">
                                        <input type="number" class="form-control" name="estimate" id="time" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="statusSelect" class="control-label">
                                        Chi phí (VND)
                                    </label>
                                    <div>
                                        <input type="number" id="cost" name="cost" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="">Người tham vấn</label>
                                    <div>
                                        <select class="js-multiple form-control" name="show_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="js-div-add-user">
                                    <div class="form-group">
                                        <label class="control-label" for="">Người thực hiện:</label>
                                        <div class="form-inline js-check">
                                            <select class="form-control js-get-user" name="work_user_ids[id][]">
                                                <option value=""></option>
                                                @foreach($project->users as $user)
                                                    <option value="{{ $user->id }}" data-salary="{{ $user->salary }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @foreach($project->users as $user)
                                                <input type="hidden" id="{{ $user->id }}" value="{{ $user->salary }}">
                                            @endforeach
                                            Số giờ:
                                            <input type="number" class="form-control js-get-time" name="work_user_ids[time][]" required>
                                            <button type="button" class="btn btn-danger js-minus-user"><i class="fa fa-minus-circle"></i></button>
                                        </div>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-primary mt-20 js-add-user"><i class="fa fa-plus-circle"></i></button>
                                <div class="form-group">
                                    <label class="control-label" for="">Người phê duyệt:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="approve_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người quan sát:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="view_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">
                                        Trạng thái
                                    </label>
                                    <div>
                                        <select class="form-control" name="status" id="status">
                                            @foreach($statuses as $key => $status)
                                                <option value="{{ $key }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priorityLevel" class="control-label">
                                        Mức độ ưu tiên
                                    </label>
                                    <div>
                                        <select class="form-control" name="priority" id="priorityLevel">
                                            @foreach($priorities as $key => $priority)
                                                <option value="{{ $key }}">{{ $priority }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary js-btn-submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.js-btn-submit', function () {
            let cost = $('#cost').val();
            let time = $('#time').val();
            let totalCost = 0;
            let totalTime = 0;
            let msg = '';
            let check = false;
            $.each($('.js-get-user option:selected'), function (key, value) {
                totalCost += $('#'+value.value).val() * $('.js-get-time')[key].value;
                totalTime += parseInt($('.js-get-time')[key].value);
            })
            if(cost != totalCost) {
                msg = 'Tổng số tiền công việc và số tiền phân bổ nhân sự chưa bằng nhau. Tiếp tục ???';
                check = true;
            } else if(time != totalTime) {
                msg = 'Tổng thời gian công việc và thời gian phân bổ nhân sự chưa bằng nhau. Tiếp tục ???';
                check = true;
            } else {
                msg = '';
                check = false;
            }
            if (check) {
                if(confirm(msg)) {
                    $('#submitForm').submit();
                }
            } else {
                $('#submitForm').submit();
            }
        })
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });
        $('.js-add-user').click(function () {
            let text = `
            <div class="form-group">
                <label class="control-label" for="">Người thực hiện:</label>
                <div class="form-inline js-check">
                    <select class="form-control js-get-user" name="work_user_ids[id][]">
                        <option value=""></option>
                        @foreach($project->users as $user)
                            <option value="{{ $user->id }}" data-salary="{{ $user->salary }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    Số giờ:
                    <input type="number" class="form-control js-get-time" name="work_user_ids[time][]" required>
                    <button type="button" class="btn btn-danger js-minus-user"><i class="fa fa-minus-circle"></i></button>
                </div>
            </div>`;
            $('.js-div-add-user').append(text);
        });
        $(document).on('click', '.js-minus-user', function () {
            $(this).closest('.form-group').html('');
        });
    </script>
@endsection

@extends('layouts.app')
@section('nav')
    @include('layouts.nav_projects', ['id' => $project->id])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box-info box">
                <div class="box-body">
                    <form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="">Tên công việc:</label>
                                    <div class="">
                                        <input type="text" name="name" value="{{ $task->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Mô tả:</label>
                                    <div>
                                        <textarea name="description" id="" cols="60" rows="10">{{ $task->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="startDate" class="control-label">Ngày bắt đầu</label>
                                    <div class="">
                                        <input type="date" name="time_start" value="{{ $task->time_start }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="endDate" class="control-label">Ngày kết thúc</label>
                                    <div class="">
                                        <input type="date" name="time_end" value="{{ $task->time_end }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">Thời gian thực hiện</label>
                                    <div class="">
                                        <input type="number" class="form-control" value="{{ $task->estimate }}" name="estimate" id="time">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="statusSelect" class="control-label">
                                        Chi phí (VND)
                                    </label>
                                    <div>
                                        <input type="number" name="cost" value="{{ $task->cost }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="">Người tham vấn</label>
                                    <div>
                                        <select class="js-multiple form-control" name="show_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option @if(in_array($user->id, $task->show_user_ids)) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="js-div-add-user">
                                    @foreach($task->getWorkUsers() as $workUser)
                                        <div class="form-group">
                                            <label class="control-label" for="">Người thực hiện:</label>
                                            <div class="form-inline">
                                                <select class="form-control" name="work_user_ids[id][]">
                                                    <option value=""></option>
                                                    @foreach($project->users as $user)
                                                        <option @if($workUser['user']['id'] == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                Số giờ:
                                                <input type="number" value="{{ $workUser['time'] }}" class="form-control" name="work_user_ids[time][]">
                                                <button type="button" class="btn btn-danger js-minus-user"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary mt-20 js-add-user"><i class="fa fa-plus-circle"></i></button>
                                <div class="form-group">
                                    <label class="control-label" for="">Người phê duyệt:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="approve_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option @if(in_array($user->id, $task->approve_user_ids)) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người quan sát:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="view_user_ids[]" multiple="multiple">
                                            @foreach($project->users as $user)
                                                <option @if(in_array($user->id, $task->view_user_ids)) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
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
                                                <option @if($task->status == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
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
                                            @foreach($priorities as $key => $priotity)
                                                <option @if($task->priority == $key) selected @endif value="{{ $key }}">{{ $priotity }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });
        $('.js-add-user').click(function () {
            let text = `
            <div class="form-group">
                <label class="control-label" for="">Người thực hiện:</label>
                <div class="form-inline">
                    <select class="form-control" name="work_user_ids[id][]">
                        <option value=""></option>
                        @foreach($project->users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    Số giờ:
                    <input type="number" class="form-control" name="work_user_ids[time][]">
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

@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box-info box">
                <div class="box-header">
                    <div class="text-left">
                        <h3>Tạo risk</h3>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('tasks.risks.store', $task->id) }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label col-md-2 require">Tiêu đề</label>
                            <div class="col-md-3">
                                <input type="text" required name="title" class="form-control" value="" id="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="desc" class="control-label col-md-2">Mô tả</label>
                            <div class="col-sm-5">
                                <textarea id="desc" name="desc" class="form-control" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priorityLevel" class="control-label col-md-2">
                                Độ ưu tiên
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control" name="priority" id="priorityLevel">
                                    @foreach($priorities as $key => $value)
                                        <option @if(isset($issue)) @if($issue->priority == $key) selected @endif @endif value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="typeSelect" class="control-label col-md-2 require">
                                Loại
                            </label>
                            <div class="col-md-3">
                                <select class="form-control" required name="type" id="typeSelect">
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="typeSelect" class="control-label col-md-2 require">
                                Mức độ nghiêm trọng
                            </label>
                            <div class="col-md-3">
                                <select class="form-control" required name="danger" id="typeSelect">
                                    @foreach($dangers as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="typeSelect" class="control-label col-md-2 require">
                                Xu hướng
                            </label>
                            <div class="col-md-3">
                                <select class="form-control" required name="feature" id="typeSelect">
                                    @foreach($features as $key => $type)
                                        <option value="{{ $key }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="note" class="control-label col-md-2">Chú ý</label>
                            <div class="col-sm-5">
                                <textarea id="note" name="note" class="form-control" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="assigneeSelect" class="control-label col-md-2">
                                Người thực hiện
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control" name="user_id" id="assigneeSelect">
                                    <option value="">None</option>
                                    @foreach($users as $user)
                                        <option @if(isset($issue->user)) @if($issue->user->id == $user->id) selected @endif @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="startDate" class="control-label col-md-2">Ngày bắt đầu</label>
                            <div class="col-sm-3">
                                <input type="date" name="start_date" autocomplete="off" class="form-control" id="startDate">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endDate" class="control-label col-md-2">Ngày kết thúc</label>
                            <div class="col-sm-3">
                                <input type="date" name="end_date" autocomplete="off" class="form-control" id="endDate">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="control-label col-md-2">Thời gian thực hiện (giờ)</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="time" id="time">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

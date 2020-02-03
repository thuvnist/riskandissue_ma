@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
                <div class="box box-info mt-20 p-15">
                    <h3>Thêm mới dự án</h3>
                    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Tên dự án</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="name" value="{{ $project->name }}" required>
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Khách hàng</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="customer" value="{{ $project->customer }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Mô tả</label>
                            <div class="col-sm-6">
                                <textarea id="description" class="form-control" name="description" required>{{ $project->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Leader</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="user_ids" name="leader_id">
                                    @foreach($users as $user)
                                        <option @if( $project->description == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Thành viên</label>
                            <div class="col-sm-6">
                                <select class="js-multiple form-control " id="user_ids" name="user_ids[]"  multiple="multiple">
                                    @foreach($users as $user)
                                        <option @if( in_array($user->id, $project->user_ids)) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian bắt đầu</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_start" value="{{ $project->time_start }}" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian kết thúc</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_end" value="{{ $project->time_end }}" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Chi phí</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="cost" value="{{ $project->cost }}" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Trạng thái</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="user_ids" name="status">
                                    @foreach($statuses as $key => $status)
                                        <option @if( $project->status == $key) selected @endif value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

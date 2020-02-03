@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="box box-info mt-20 pb-20">
            <div class="px-15">
                <h3>
                    Danh sách công việc
                </h3>
            </div>
            <div class="table-responsive mt-50 px-15">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>Công việc</th>
                        <th>Mô tả</th>
                        <th>Người tạo</th>
                        <th>Dự án</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="{{ $task->color_name }}">{{ $task->name }}</td>
                                <td class="{{ $task->color_name }}">{{ $task->description }}</td>
                                <td class="{{ $task->color_name }}">{{ $task->created_by_name }}</td>
                                <td class="{{ $task->color_name }}">{{ $task->project->name }}</td>
                                <td class="{{ $task->color_name }}">{{ $task->time_start }}</td>
                                <td class="{{ $task->color_name }}">{{ $task->label_status_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

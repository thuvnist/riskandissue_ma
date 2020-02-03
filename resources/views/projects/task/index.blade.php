@extends('layouts.app')
@section('nav')
    @include('layouts.nav_projects', ['id' => $project->id])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-20">
            <div class="box box-default">
                <div class="table-responsive p-15">
                    <h3 class="text-primary text-center">Danh sách công việc của dự án: {{ $project->name}}</h3>
                    <br>
                    <br>
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Công việc</th>
                                <th>Độ ưu tiên</th>
                                <th>Trạng thái</th>
                                <th>Người thực hiện</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Số giờ (h)</th>
                                <th>Vấn đề phát sinh</th>
                                <th>Rủi ro</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td class="{{ $task->getColorClass() }}"><a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}"> {{ $task->name }}</a></td>
                                <td class="{{ $task->getColorClass() }}">{{ $task->getLabelPriority() }}</td>
                                <td class="{{ $task->getColorClass() }}">{{ $task->getLabelStatus() }}</td>
                                <td class="{{ $task->getColorClass() }}">
                                    @if(!empty($task->user_ids))
                                        @foreach($task->user_ids as $userId)
                                            {{ \App\User::find($userId)->name }}<br>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="{{ $task->getColorClass() }}">{{ $task->time_start }}</td>
                                <td class="{{ $task->getColorClass() }}">{{ $task->time_end }}</td>
                                <td class="{{ $task->getColorClass() }}">{{ $task->estimate }}</td>
                                <td class="{{ $task->getColorClass() }}">
                                    @foreach($task->issues as $issue)
                                        {{ $issue->title }}
                                    @endforeach
                                </td>
                                <td class="{{ $task->getColorClass() }}">3</td>
                                <td class="{{ $task->getColorClass() }}"><a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

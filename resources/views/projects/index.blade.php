@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="box box-info mt-20 pb-20">
            <div class="px-15">
                <h3>
                    Danh sách dự án
                    @if(auth()->user()->isAdmin())
                        <a class="btn btn-primary float-right" href="{{ route('projects.create') }}">
                            Thêm dự án
                        </a>
                    @endif
                </h3>
            </div>
            <div class="table-responsive mt-50 px-15">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th >Tên dự án</th>
                        <th>Mô tả</th>
                        <th>Người tạo</th>
                        <th>Thành viên</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                <a href="{{ route('projects.show', $project->id) }}" class="text-blue">
                                    {{ $project->name }}
                                </a>
                            </td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->created_by_name }}</td>
                            <td>
                                @foreach($project->users as $user)
                                    {{ $user->name }}
                                @endforeach
                            </td>
                            <td>{{ $project->created_at->format('d/m/Y') }}</td>
                            <td><a href="{{ route('projects.edit', $project->id) }}">
                                <i class="fa fa-edit"></i>
                            </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection

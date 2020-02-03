@extends('layouts.app')
@section('nav')
    @include('layouts.nav_projects', ['id' => $project->id])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mt-20">
            <div class="box box-info col-sm-12">
                <h3>Board Issue</h3>
            </div>
        </div>
        <div class="row">
            <div class="box box-default" style="position: relative">
                <div class="box-loading d-none">
                    <div class="spinner-border"></div>
                </div>
                <div class="alert d-none">
                </div>
                <div class="row mt-20">
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-1 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[1] }}</span>
                                    <div class="bg-white float-right width-20 text-center cursor-pointer">
                                        +
                                    </div>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable1">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 1) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-2 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[2] }}</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable2">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 2) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-3 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[3] }}</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable3">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 3) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-4 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[4] }}</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable4">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 4) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-5 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[5] }}</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable5">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 5) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-6 text-center board-title">
                                    <span class="text-white">{{ \App\Issue::STATUS[6] }}</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable6">
                                    @if (!empty($project->tasks))
                                    @foreach($project->tasks as $task)
                                        @foreach($task->issues->where('status', 6) as $issue)
                                            <div class="mt-10 bg-white" id="{{ $issue->id }}">
                                                <a href="{{ route('issues.detail', $issue->id) }}">#{{ $issue->title }}</a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(() => {
            $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6" ).sortable({
                connectWith: ".connected-sortable",
                cursor: "move",
                forcePlaceholderSize: true,
                update: function() {
                    $('.box-loading').removeClass('d-none');
                    let sortable1 = [];
                    let sortable2 = [];
                    let sortable3 = [];
                    let sortable4 = [];
                    let sortable5 = [];
                    let sortable6 = [];
                    $.each($('#sortable1').children(), function(key, value) {
                        sortable1.push(value.id)
                    });
                    $.each($('#sortable2').children(), function(key, value) {
                        sortable2.push(value.id)
                    });
                    $.each($('#sortable3').children(), function(key, value) {
                        sortable3.push(value.id)
                    });
                    $.each($('#sortable4').children(), function(key, value) {
                        sortable4.push(value.id)
                    });
                    $.each($('#sortable5').children(), function(key, value) {
                        sortable5.push(value.id)
                    });
                    $.each($('#sortable6').children(), function(key, value) {
                        sortable6.push(value.id)
                    });
                    $.ajax({
                        url: "{{ route('tasks.update_status') }}",
                        method: "POST",
                        data: {
                            sortable1: sortable1,
                            sortable2: sortable2,
                            sortable3: sortable3,
                            sortable4: sortable4,
                            sortable5: sortable5,
                            sortable6: sortable6,
                        },
                        success: function (response) {
                            $('.alert').removeClass('d-none').addClass(`${response.alert}`).html(`${response.text}`);
                            $('.box-loading').addClass('d-none');
                            setTimeout(function(){
                                $('.alert').addClass('d-none');
                                }, 3000);
                        },
                        error: function () {
                            alert('Server error !!!')
                        }
                    })
                }
            }).disableSelection();
        });
    </script>
@endsection

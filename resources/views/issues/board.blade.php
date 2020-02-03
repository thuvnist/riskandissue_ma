@extends('layouts.app')
    @section('nav')
        @include('layouts.nav_issues')
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="border-round"><i class="fa fa-sort-down"></i><span>Lọc</span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            Trạng thái
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Đang thực hiện</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            Mức ưu tiên
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Is</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>High</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-6 custom-input-check">
                                        <label class="custom-input-check control-label">
                                            Thêm lọc
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Loại issue</option>
                                            <option>Trạng thái</option>
                                            <option>Người thực hiện</option>
                                            <option>Mức ưu tiên</option>
                                            <option>% Đã làm</option>
                                            <option>Bắt đầu</option>
                                            <option>Kết thúc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-10">
                                <button class="btn btn-primary mr-20">Apply<i class="fa fa-check ml-5"></i></button>
                                <button class="btn btn-primary">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box box-default">
                <div class="row mt-20">
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-1 text-center board-title">
                                    <span class="text-white">Đang thực hiện</span>
                                    <div class="bg-white float-right width-20 text-center cursor-pointer">
                                        +
                                    </div>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable1">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-2 text-center board-title">
                                    <span class="text-white">Quá hạn</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable2">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-3 text-center board-title">
                                    <span class="text-white">Chờ</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable3">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-4 text-center board-title">
                                    <span class="text-white">Hoàn thành</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable4">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-5 text-center board-title">
                                    <span class="text-white">Tạm dừng</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable5">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-6 text-center board-title">
                                    <span class="text-white">Đã hủy</span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable6">
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
                                    <div class="mt-10 bg-white">
                                        <a href="{{ route('issues.edit', 1) }}">#101 website vẫn đang bảo trì</a>
                                    </div>
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
                forcePlaceholderSize: true
            }).disableSelection();
        });
    </script>
@endsection
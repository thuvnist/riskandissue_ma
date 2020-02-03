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
                                            <option>Loại vấn đề phát sinh</option>
                                            <option>Trạng thái</option>
                                            <option>Người giải quyết</option>
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
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Loại vấn đề</th>
                                <th>Trạng thái</th>
                                <th>Người giải quyết</th>
                                <th>Ưu tiên</th>
                                <th>% Đã giải quyết</th>
                                <th>Bắt đầu</th>
                                <th>Kết thúc</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td><a href="{{ route('issues.edit', 1) }}">Vấn đề {{$i}}</a></td>
                                    <td>technical</td>
                                    <td>Đang thực hiện</td>
                                    <td></td>
                                    <td>Cao</td>
                                    <td></td>
                                    <td>1/5/2019</td>
                                    <td>31/5/2019</td>
                                    <td>20 tiếng</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

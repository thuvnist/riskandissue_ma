{{--@extends('layouts.app')--}}
{{--@section('content')--}}
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">
                    {{ $title }}
                </div>
                <div class="box-body">
                    <ul class="nav nav-pills">
                        <li class="active w-24"><a data-toggle="pill" href="#myModal1">{{\App\Task::GIAIQUYET[1]}}</a></li>
                        <li class="w-24"><a data-toggle="pill" href="#myModal2">{{\App\Task::GIAIQUYET[2]}}</a></li>
                        <li class="w-24"><a data-toggle="pill" href="#myModal3">{{\App\Task::GIAIQUYET[3]}}</a></li>
                        <li class="w-24"><a data-toggle="pill" href="#myModal4">{{\App\Task::GIAIQUYET[4]}}</a></li>
                    </ul>
                    <div class="tab-content mt-10">
                        <div id="myModal1" class="tab-pane fade in active">
                            <div class="row">
                                <form action="" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                                        <div class="col-md-6">
                                            Chấp nhận rủi ro
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label for="" class="label-control col-md-3">Mức ưu tiên</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option value="1">Rất cao</option>
                                                <option value="2">cao</option>
                                                <option value="3">Trung bình</option>
                                                <option value="4">Thấp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label for="" class="label-control col-md-3">Người đề xuất</label>
                                        <div class="col-md-6">
                                            Nguyễn Thị Thư
                                        </div>
                                    </div>
                                    <input type="hidden" value="" class="js-set-id" name="key">
                                    <input type="hidden" value="1" name="status">
                                    <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                                        <button class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="myModal2" class="tab-pane fade">
                            <div class="row">
                                <form action="" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                                        <div class="col-md-6">
                                            Tránh rủi ro
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Kế hoạch không có phản hồi</option>
                                                <option value="">Kế hoạch IDLE</option>
                                                <option value="">Kế hoạch đang thực hiện</option>
                                                <option value="">Kế hoạch bị hỏng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Mức ưu tiên</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Rất cao</option>
                                                <option value="">Cao</option>
                                                <option value="">Trung bình</option>
                                                <option value="">Thấp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Người đề xuất</label>
                                        <div class="col-md-6">
                                            <p>Nguyễn Thị Thư</p>
                                        </div>
                                    </div>
                                    <input type="hidden" value="" class="js-set-id" name="key">
                                    <input type="hidden" value="1" name="status">
                                    <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                                        <button class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="myModal3" class="tab-pane fade">
                            <div class="row">
                                <form action="" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                                        <div class="col-md-6">
                                            Chuyển giao rủi ro
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Kế hoạch không có phản hồi</option>
                                                <option value="">Kế hoạch IDLE</option>
                                                <option value="">Kế hoạch đang thực hiện</option>
                                                <option value="">Kế hoạch bị hỏng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Mức ưu tiên</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Rất cao</option>
                                                <option value="">cao</option>
                                                <option value="">Trung bình</option>
                                                <option value="">Thấp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Người đề xuất</label>
                                        <div class="col-md-6">
                                            <p>Nguyễn Thị Thư</p>
                                        </div>
                                    </div>
                                    <input type="hidden" value="" class="js-set-id" name="key">
                                    <input type="hidden" value="1" name="status">
                                    <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                                        <button class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="myModal4" class="tab-pane fade">
                            <div class="row">
                                <form action="" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Loại chiến lược phòng ngừa</label>
                                        <div class="col-md-6">
                                            <p>Giảm thiểu rủi ro</p>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Kế hoặc không có phản hồi</option>
                                                <option value="">Kế hoạch IDLE</option>
                                                <option value="">Kế hoạch đang thực hiện</option>
                                                <option value="">Kế hoạch bị hỏng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Mức ưu tiên</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="" id="">
                                                <option>Rất cao</option>
                                                <option value="">cao</option>
                                                <option value="">Trung bình</option>
                                                <option value="">Thấp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                                        <label class="col-md-3" for="">Người đề xuất</label>
                                        <div class="col-md-6">
                                            <p>Nguyễn Thị Thư</p>
                                        </div>
                                    </div>

                                    <input type="hidden" value="" class="js-set-id" name="key">
                                    <input type="hidden" value="4" name="status">
                                    <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                                        <button class="btn btn-primary">Thêm mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--@endsection--}}

@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box-info box">
                <div class="box-body">
                    <form action="{{ route('templates.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="">Tên mẫu vấn đề phát sinh mới:</label>
                                    <div class="">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Mô tả:</label>
                                    <div>
                                        <textarea name="description" id="" cols="60" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người tham vấn</label>
                                    <div>
                                        <select class="js-multiple form-control" name="show_user_id[]" multiple="multiple">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người giải quyết:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="use_user_id[]" multiple="multiple">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người phê duyệt:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="approve_user_id[]" multiple="multiple">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người quan sát:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="view_user_id[]" multiple="multiple">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text">
                                    <p>Trường thông tin</p>
                                </div>
                                <div class="box-default box">
                                    <div class="box-header">

                                    </div>
                                    <div class="box-body form-horizontal">
                                        <div class="form-inline form-group">
                                            <label class="col-md-3" for="">Bắt buộc:</label>
                                            <div class="col-md-3">
                                                <label class="custom-input-check">
                                                    <input type="checkbox" id="requireColumn" checked value="true">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-inline form-group">
                                            <label class="col-md-3" for="">Tên thông tin trường:</label>
                                            <div class="col-md-3">
                                                <input type="text" class="col-md-6 form-control" id="nameColumn">
                                            </div>
                                        </div>
                                        <div class="form-inline form-group">
                                            <label class="col-md-3" for="">Mô tả:</label>
                                            <div class="col-md-3">
                                                <textarea name="" id="descriptionColumn" cols="60" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-inline form-group">
                                            <label class="col-md-3" for="">Kiểu dữ liệu:</label>
                                            <div class="col-md-2">
                                                <select name="" id="typeColumn" class="col-md-6 form-control">
                                                    <option value="text">Text</option>
                                                    <option value="number">Number</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-primary js-btn-add-column">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Tên trường thông tin</th>
                                            <th>Mô tả</th>
                                            <th>Kiểu dữ liệu</th>
                                            <th>Bắt buộc</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tableColumn">
                                        <tr>
                                            <td>Người giải quyết</td>
                                            <td>Người giải quyết</td>
                                            <td>select</td>
                                            <td>không</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Tiêu đề</td>
                                            <td>Tiêu đề</td>
                                            <td>text</td>
                                            <td>có</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái</td>
                                            <td>Trạng thái</td>
                                            <td>select</td>
                                            <td>có</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Độ ưu tiên</td>
                                            <td>Độ ưu tiên</td>
                                            <td>select</td>
                                            <td>không</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <td>Mô tả</td>
                                            <td>text</td>
                                            <td>không</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('templates.index') }}" class="btn btn-default">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $(document).on('change', '#requireColumn', function () {
                if ($(this).is(':checked')) {
                    $(this).attr('value', true);
                } else {
                    $(this).attr('value', false);
                }
            });
            $(document).on('click', '.js-btn-add-column', function() {
                let requireColumn = $('#requireColumn').val();
                let typeColumn = $('#typeColumn').val();
                let descriptionColumn = $('#descriptionColumn').val();
                let nameColumn = $('#nameColumn').val();
                let textHtml = `
            <tr>
                <td>${nameColumn}<input type="hidden" value="${nameColumn}" name="column_name[]"></td>
                <td>${descriptionColumn}<input type="hidden" value="${descriptionColumn}" name="column_desc[]"></td>
                <td>${typeColumn}<input type="hidden" value="${typeColumn}" name="column_type[]"></td>
                <td>${requireColumn == 'true' ? 'có' : 'không'}<input type="hidden" value="${requireColumn}" name="column_required[]"></td>
                <td class="text-center">
                    <i class="fa fa-times-circle text-danger cursor-pointer js-btn-delete-column"></i>
                </td>
            </tr>`;
                $('#tableColumn').append(textHtml);
                $('#descriptionColumn').val('');
                $('#nameColumn').val('');
            });
            $(document).on('click', '.js-btn-delete-column', function() {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection

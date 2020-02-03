@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <form action="{{ route('issues.sample') }}" method="get" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="border-round"><i class="fa fa-sort-down"></i><span>Lọc</span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <div class="form-group hidden im-search" data-check="1">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            {{ \App\Template::LABEL_OPTIONS['name'] }}
                                            <input disabled name="is_search[name]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="name" class="form-control">
                                            @foreach ($templates as $template)
                                                <option value="{{ $template['name'] }}">{{ $template['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="2">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            {{ \App\Template::LABEL_OPTIONS['show_user_id'] }}
                                            <input disabled name="is_search[show_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="show_user_id" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="3">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            {{ \App\Template::LABEL_OPTIONS['approve_user_id'] }}
                                            <input disabled name="is_search[approve_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="approve_user_id" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="4">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            {{ \App\Template::LABEL_OPTIONS['use_user_id'] }}
                                            <input disabled name="is_search[use_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="use_user_id" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="5">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            {{ \App\Template::LABEL_OPTIONS['view_user_id'] }}
                                            <input disabled name="is_search[view_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="view_user_id" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-6 custom-input-check">
                                        <label for="typeSearch" class="custom-input-check control-label">
                                            Thêm lọc
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="typeSearch" name="type_search" class="form-control im-filter">
                                                <option value=""></option>
                                            @foreach(config('settings.options.templates') as $key => $value)
                                                <option value="{{ $value }}">{{ \App\Template::LABEL_OPTIONS[$key] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group mt-20">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="nhập tên mẫu issue" class="form-control">
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button type="button" class="btn btn-primary im-btn-search">Tìm kiếm</button>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-10">
                                <button type="button" class="btn btn-primary mr-20 im-btn-search">Apply<i class="fa fa-check ml-5"></i></button>
                                <button type="button" class="btn btn-primary im-btn-clear">Clear</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right margin-bottom col-md-11">
                                <a href="{{ route('issues.create_sample') }}">
                                    <button type="button" class="btn btn-primary ">Tạo mẫu mới</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box box-default">
                <div class="table-responsive im-append-ajax p-15">
                    @include('components.template_table', $templates)
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $(document).on('change', '.im-filter', function () {
                let $search = $(`.im-search[data-check=${$(this).val()}]`);
                $search.removeClass('hidden').find('input').attr('disabled', false);
                $search.find('select').attr('disabled', false);
                $(this).find(`option[value=${$(this).val()}]`).attr('disabled','disabled');
                $(this).val(null);
            });

            $(document).on('click', '.im-btn-clear', function () {
                let $search = $(`.im-search`);
                $search.addClass('hidden').find('input').attr('disabled', true);
                $search.find('select').attr('disabled', true);
                $('.im-filter').find('option').attr('disabled', false);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });

            $(document).on('click', '.im-btn-search', function () {
                let $form = $(this).closest('form');
                let serialize = $form.serialize();
                let url = $form.attr('action');
                $.ajax({
                    type: 'get',
                    url,
                    data: serialize,
                    success(data) {
                        $('.im-append-ajax').html(data);
                    },
                });
            });
        });
    </script>
@endsection

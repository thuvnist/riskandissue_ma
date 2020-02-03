@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <h3>Danh sách mẫu vấn đề phát sinh <a href="{{ route('templates.create') }}" class="btn btn-primary float-right">Tạo mẫu mới</a></h3>
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

<div class="container-fluid">
    <div class="row">
        <form action="{{ route('tasks.issues.store', $task->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden name="task_id" value="{{ $task->id }}">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="text-center">
                        Tạo vấn đề phát sinh mới
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="issuesTemplate" class="control-label col-md-2 require">Chọn mẫu vấn đề phát sinh</label>
                        <div class="col-md-3">
                            <select required class="form-control template-select" data-url="{{ route('templates.get_view_template') }}" name="template_id" id="issuesTemplate">
                                <option value="">None</option>
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="im-template-view">

                    </div>
                    <div class="form-group">
                        <label for="typeSelect" class="control-label col-md-2 require">
                            Loại
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" required name="type" id="typeSelect">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người giải quyết
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="user_id" id="assigneeSelect">
                                <option value="">None</option>
                                @foreach($users as $user)
                                    <option @if(isset($issue->user)) @if($issue->user->id == $user->id) selected @endif @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 require" for="">Người phê duyệt:</label>
                        <div class="col-md-3">
                            <select class="form-control" required name="approve_user_ids">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2" for="">Người quan sát:</label>
                        <div class="col-md-3">
                            <select class="form-control" name="view_user_ids">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parentWorkSelect" class="control-label col-md-2">
                            Vấn đề cha
                        </label>
                        <div class="col-sm-3">
                            @if (isset($issueParent))
                                <input type="hidden" name="parent_issue_id" value="{{ $issueParent->id }}">
                                <b>{{ $issueParent->title }}</b>
                            @else
                                <select class="form-control" name="parent_issue_id" id="parentWorkSelect">
                                    <option value="">None</option>
                                    @foreach($task->issues as $issue)
                                        <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="childWorkSelect" class="control-label col-md-2">
                            Vấn đề con
                        </label>
                        <div class="col-sm-5">
                            <select class="js-multiple form-control" multiple="multiple" name="children_issue_ids[]" id="childWorkSelect">
                                <option value="">None</option>
                                @foreach($task->issues as $issue)
                                    @if (empty($issue->parent_issue_id))
                                        <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="relativeWorkSelect" class="control-label col-md-2">
                            Vấn đề liên quan
                        </label>
                        <div class="col-sm-5">
                            <select class="js-multiple form-control" multiple="multiple" name="relative_issue_ids[]" id="relativeWorkSelect">
                                <option value="">None</option>
                                @foreach($task->issues as $issue)
                                    <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="similarWorkSelect" class="control-label col-md-2">
                            Vấn đề tương tự
                        </label>
                        <div class="col-sm-5">
                            <select class="js-multiple form-control" multiple="multiple" name="similar_issue_ids[]" id="similarWorkSelect">
                                <option value="">None</option>
                                @foreach($task->issues as $issue)
                                    <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="subordinateWorkSelect" class="control-label col-md-2">
                            Vấn đề khóa
                        </label>
                        <div class="col-sm-5">
                            <select class="js-multiple form-control" multiple="multiple" name="subordinate_issue_ids[]" id="subordinateWorkSelect">
                                <option value="">None</option>
                                @foreach($task->issues as $issue)
                                    <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <label for="requiredWorkSelect" class="control-label col-md-2">
                            Vấn đề phụ thuộc
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="required_issue_id" id="requiredWorkSelect">
                                <option value="">None</option>
                                @foreach($task->issues as $issue)
                                    <option value="{{ $issue->id }}">{{ $issue->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="startDate" class="control-label col-md-2">Ngày bắt đầu</label>
                        <div class="col-sm-3">
                            <input type="date" name="start_date" autocomplete="off" class="form-control" id="startDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endDate" class="control-label col-md-2">Ngày kết thúc</label>
                        <div class="col-sm-3">
                            <input type="date" name="end_date" autocomplete="off" class="form-control" id="endDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label col-md-2">Thời gian thực hiện (giờ)</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="time" id="time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="completed" class="control-label col-md-2">
                            % Đã giải quyết
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="completed" id="completed">
                                @foreach($percents as $key => $percent)
                                    <option value="{{ $key }}">{{ $percent }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="solution" class="control-label col-md-2">Hướng giải quyết</label>
                        <div class="col-sm-5">
                            <textarea id="solution" class="form-control" name="solution" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note" class="control-label col-md-2">Chú ý</label>
                        <div class="col-sm-5">
                            <textarea id="note" class="form-control" name="note" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fileUpload" class="control-label col-md-2">Tập đính kèm</label>
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="documentation" id="fileUpload">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-2">

                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                            <button type="submit" class="btn btn-primary">Tạo và tiếp tục</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).on('change', '#parentWorkSelect', function () {
        let parentId = $(this).val();
        $('#childWorkSelect').find('option').each(function () {
            $(this).removeAttr('disabled');
        });
        if (parentId !== '') {
            $('#childWorkSelect').find(`option[value="${parentId}"]`).prop('disabled', 'on');
        }

    });
    $(document).on('change', '#childWorkSelect', function () {
        let childId = $(this).val();
        $('#parentWorkSelect').find('option').each(function () {
            $(this).removeAttr('disabled');
        });
        if (childId !== '') {
            $('#parentWorkSelect').find(`option[value="${childId}"]`).prop('disabled', 'on');
        }
    });
    $(document).on('change', '#requiredWorkSelect', function () {
        let requiredId = $(this).val();
        $('#subordinateWorkSelect').find('option').each(function () {
            $(this).removeAttr('disabled');
        });
        if (requiredId !== '') {
            $('#subordinateWorkSelect').find(`option[value="${requiredId}"]`).prop('disabled', 'on');
        }
    });
    $(document).on('change', '#subordinateWorkSelect', function () {
        let subordinatedId = $(this).val();
        $('#requiredWorkSelect').find('option').each(function () {
            $(this).removeAttr('disabled');
        });
        if (subordinatedId !== '') {
            $('#requiredWorkSelect').find(`option[value="${subordinatedId}"]`).prop('disabled', 'on');
        }
    });
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        todayHighlight: true,
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    $(function () {
        $(document).on('change', '.template-select', function () {
            const $this = $(this);
            let data = {
                template_id : $this.val(),
            };
            let url = $this.data('url');
            $.ajax({
                type: 'post',
                url,
                data: data,
                success(data) {
                    $('.im-template-view').html(data);
                    $('.datepicker').datepicker({
                        autoclose: true,
                        format: 'dd-mm-yyyy',
                        todayHighlight: true,
                    });
                },
            });
        })
    });
</script>


<div class="form-group">
    <label for="title" class="control-label col-md-2 require">Tiêu đề</label>
    <div class="col-md-3">
        <input type="text" required name="title" class="form-control" value="@if(isset($issue)) {{ $issue->title }} @endif" id="title">
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-md-2">Mô tả</label>
    <div class="col-sm-5">
        <textarea id="description" name="description" class="form-control" rows="4" cols="50">@if(isset($issue)) {{ $issue->description }} @endif</textarea>
    </div>
</div>

<div class="form-group">
    <label for="priorityLevel" class="control-label col-md-2">
        Độ ưu tiên
    </label>
    <div class="col-sm-3">
        <select class="form-control" name="priority" id="priorityLevel">
            @foreach($priorities as $key => $value)
                <option @if(isset($issue)) @if($issue->priority == $key) selected @endif @endif value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="statusSelect" class="control-label col-md-2">
        Trạng thái
    </label>
    <div class="col-sm-3">
        <select class="form-control" name="status" id="statusSelect">
            @foreach($status as $key => $value)
                <option @if(isset($issue)) @if($issue->status == $key) selected @endif @endif value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>



@isset($columns)
    @foreach ($columns as $key => $column)
        <div class="form-group">
            <label for="startDate" class="control-label col-md-2 @if($column['required'] == 'true') require @endif">{{ $column['name'] }}</label>
            <div class="col-sm-3">
                <input type="{{ $column['type'] }}" value="@if(isset($issue)){{ $issue->columns[$key]['value'] }}@endif" autocomplete="off" name="columns[]" @if($column['required'] == 'true') required @endif class="form-control" id="startDate">
            </div>
        </div>
    @endforeach
@endisset

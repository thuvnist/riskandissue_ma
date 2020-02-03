<div class="col-md-12">
    <ul class="nav navbar-nav navbar-btn nav-child">
        <li class="{{ request()->route()->getName() == 'issues.index' ? 'nav-active' : '' }}"><a href="{{ route('issues.index') }}">Tất cả(5)</a></li>
        <li class="{{ request()->route()->getName() == 'issues.sample' ? 'nav-active' : '' }}"><a href="{{ route('issues.sample') }}">Danh sách mẫu vấn đề phát sinh</a></li>
        <li class="{{ request()->route()->getName() == 'issues.create_sample' ? 'nav-active' : '' }}"><a href="{{ route('issues.create_sample') }}">Tạo mẫu vấn đề phát sinh</a></li>
        <li class="{{ request()->route()->getName() == 'issues.board' ? 'nav-active' : '' }}"><a href="{{ route('issues.board') }}" class="text-black">Bảng chuyển trạng thái vấn đề phát sinh</a></li>
    </ul>
</div>

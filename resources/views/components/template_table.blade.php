<table class="table table-bordered table-hover" id="myTable">
    <thead>
    <tr>
        <th>Tên mẫu issue</th>
        <th>Mô tả</th>
        <th>Số issues theo mẫu</th>
        <th>Người tạo</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($templates as $template)
        <tr>
            <td>{{ $template->name }}</td>
            <td>{{ $template->description }}</td>
            <td>{{ $template->getNumberIssueAttributes() }}</td>
            <td>{{ $template->created_by_name }}</td>
            <td>
                <div>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-trash text-red"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

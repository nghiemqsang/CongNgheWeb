@extends('layouts.app')

@section('title', 'Danh Sách Vấn Đề')

@section('content')
    <h1 class="text-center">Danh Sách Vấn Đề</h1>

    <!-- Nút Thêm Mới -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('issues.create') }}" class="btn btn-success">➕ Thêm Vấn Đề Mới</a>
    </div>

    <!-- Bảng Hiển Thị -->
    <table class="table table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên Máy Tính</th>
                <th>Người Báo Cáo</th>
                <th>Thời Gian Báo Cáo</th>
                <th>Mức Độ</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
                <tr>
                    <td>{{ $issue->id }}</td>
                    <td>{{ $issue->computer->computer_name }}</td>
                    <td>{{ $issue->reported_by }}</td>
                    <td>{{ $issue->reported_date }}</td>
                    <td>
                        <span class="badge 
                            {{ $issue->urgency == 'High' ? 'bg-danger' : ($issue->urgency == 'Medium' ? 'bg-warning' : 'bg-info') }}">
                            {{ $issue->urgency }}
                        </span>
                    </td>
                    <td>
                        <span class="badge 
                            {{ $issue->status == 'Resolved' ? 'bg-success' : ($issue->status == 'In Progress' ? 'bg-primary' : 'bg-secondary') }}">
                            {{ $issue->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-sm btn-warning">✏️ Cập Nhật</a>
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa vấn đề này?')">🗑️ Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

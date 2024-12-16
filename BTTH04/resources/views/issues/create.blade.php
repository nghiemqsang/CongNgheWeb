@extends('layouts.app')

@section('title', 'Thêm Vấn Đề Mới')

@section('content')
    <h1 class="text-center">Thêm Vấn Đề Mới</h1>

    <form method="POST" action="{{ route('issues.store') }}" class="p-3">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tên Máy Tính</label>
                <select class="form-select" name="computer_id" required>
                    <option value="">-- Chọn Máy Tính --</option>
                    @foreach ($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Người Báo Cáo</label>
                <input type="text" name="reported_by" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Mức Độ</label>
                <select class="form-select" name="urgency" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Trạng Thái</label>
                <select class="form-select" name="status" required>
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Lưu Vấn Đề</button>
    </form>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary mt-3 w-100">Quay Lại</a>
@endsection

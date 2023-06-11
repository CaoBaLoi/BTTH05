@extends('layouts.app')
@section('content')
@csrf
@method('PUT')
<div class="col-md-4 container">
    <div class="card">
        <div class="card-header bg-dark">
            <div class="d-inline-block fw-bold text-white fs-4">
                Thêm bài viết
            </div>
            <a href="{{route('baiviet.index')}}" class="btn btn-danger fw-bold float-end ">
                <i class="fa-solid fa-arrow-left"></i>
                BACK
            </a>
        </div>
        <div class="card-body">
            <form action="{{route('baiviet.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group row mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Tiêu đề</label>
                        <div class="col-md-12 ">
                            <input id="tieude" name="tieude" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Tên bài hát</label>
                        <div class="col-md-12 ">
                            <input id="ten_bhat" name="ten_bhat" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Thể loại</label>
                        <select name="ma_tloai" class="form-control col-md-12">
                            @foreach ($categories as $category)
                            <option value="{{$category->ma_tloai}}">{{$category->ten_tloai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Tóm tắt</label>
                        <div class="col-md-12 ">
                            <textarea name="tomtat" id="tomtat" cols="55" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Nội dung</label>
                        <div class="col-md-12 ">
                            <textarea name="noidung" id="noidung" cols="55" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="">Tác giả</label>
                        <select name="ma_tgia" class="form-control ">
                            @foreach ($authors as $author)
                            <option value="{{$author->ma_tgia}}">{{$author->ten_tgia}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-3 col-form-label text-md-right fw-bold">Ngày viết</label>
                        <div class="col-md-12 ">
                            <input id="ngayviet" name="ngayviet" type="datetime-local" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-add fw-bold" name="create-btn" style="width: 100%;">Thêm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
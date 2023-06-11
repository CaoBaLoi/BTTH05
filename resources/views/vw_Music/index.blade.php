@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-dark">
            <div class="d-inline-block fw-bold text-white fs-4">
                Danh sách bài viết
            </div>
            <a href="{{route('baiviet.store')}}" class="btn btn-success fw-bold float-end ml-3">
                <i class="fa-solid fa-plus"></i>
                Thêm bài viết
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-dark fw-bold">
                <thead>
                    <tr class="text-dark">
                        <td>#</td>
                        <td>Tên bài hát</td>
                        <td>Thể loại</td>
                        <td>Tác giả</td>
                        <td>Ngày viết</td>
                        <td>Xem</td>
                        <td>Sửa</td>
                        <td>Xóa</td>
                    </tr>
                </thead>
                <tbody id="body-table">
                    @foreach ($baiviets as $baiviet)
                    <tr>
                        <td>{{ $baiviet->ma_bviet }}</td>
                        <td>{{ $baiviet->ten_bhat}}</td>
                        <td>{{ $baiviet->ten_tloai}}</td>
                        <td>{{ $baiviet->ten_tgia}}</td>
                        <td>{{ $baiviet->ngayviet}}</td>
                        <td><a type="button" data-bs-toggle="modal" data-bs-target="#{{ $baiviet->ma_bviet }}"><i class="fa-solid fa-eye"></i></a></td>
                        <div class="modal fade" id="{{ $baiviet->ma_bviet }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Label">Thông tin bài viết</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="card-body modal-body mx-auto p-4 " style="width: 500px;">
                                        <div>
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Mã bài viết</label>
                                            <div class="col-md-12 ">
                                                <input id="ma_bviet" name="ma_bviet" type="text" class="form-control" value="{{$baiviet->ma_bviet}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Tiêu đề</label>
                                            <div class="col-md-12 ">
                                                <input id="tieude" name="tieude" type="text" class="form-control" value="{{$baiviet->tieude}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Tên bài hát</label>
                                            <div class="col-md-12 ">
                                                <input id="ten_bhat" name="ten_bhat" type="text" class="form-control" value="{{$baiviet->ten_bhat}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Thể loại</label>
                                            <div class="col-md-12 ">
                                                <input id="ten_tloai" name="ten_tloai" type="text" class="form-control" value="{{$baiviet->ten_tloai}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Tóm tắt</label>
                                            <div class="col-md-12 ">
                                                <textarea name="tomtat" id="tomtat" cols="55" rows="3" disabled>{{$baiviet->tomtat}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Nội dung</label>
                                            <div class="col-md-12 ">
                                                <textarea name="noidung" id="noidung" cols="55" rows="5" disabled>{{$baiviet->noidung}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Tác giả</label>
                                            <div class="col-md-12 ">
                                                <input id="ten_tgia" name="ten_tgia" type="text" class="form-control" value="{{$baiviet->ten_tgia}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-md-3 col-form-label text-md-right fw-bold">Ngày viết</label>
                                            <div class="col-md-12 ">
                                                <input id="ngayviet" name="ngayviet" type="text" class="form-control" value="{{$baiviet->ngayviet}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('baiviet.update', $baiviet->ma_bviet)}}" method="post">
                            @csrf
                            @method('PUT')
                            <td><a type="button" data-bs-toggle="modal" data-bs-target="#edit{{ $baiviet->ma_bviet }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <div class="modal fade" id="edit{{ $baiviet->ma_bviet }}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Label">Sửa bài viết</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="card-body modal-body mx-auto p-4 " style="width: 500px;">
                                            <div>
                                                <label class="col-md-3 col-form-label text-md-right fw-bold">Mã bài viết</label>
                                                <div class="col-md-12 ">
                                                    <input id="ma_bviet" name="ma_bviet" type="text" class="form-control" value="{{$baiviet->ma_bviet}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-md-3 col-form-label text-md-right fw-bold">Tiêu đề</label>
                                                <div class="col-md-12 ">
                                                    <input id="tieude" name="tieude" type="text" class="form-control" value="{{$baiviet->tieude}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-md-3 col-form-label text-md-right fw-bold">Tên bài hát</label>
                                                <div class="col-md-12 ">
                                                    <input id="ten_bhat" name="ten_bhat" type="text" class="form-control" value="{{$baiviet->ten_bhat}}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="">Thể loại</label>
                                                <select name="ma_tloai" class="form-control ">
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->ma_tloai}}">{{$category->ten_tloai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-md-3 col-form-label text-md-right fw-bold">Tóm tắt</label>
                                                <div class="col-md-12 ">
                                                    <textarea name="tomtat" id="tomtat" cols="55" rows="3">{{$baiviet->tomtat}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-md-3 col-form-label text-md-right fw-bold">Nội dung</label>
                                                <div class="col-md-12 ">
                                                    <textarea name="noidung" id="noidung" cols="55" rows="5">{{$baiviet->noidung}}</textarea>
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
                                                    <input id="ngayviet" name="ngayviet" type="datetime-local" class="form-control" value="{{$baiviet->ngayviet}}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-add fw-bold" name="update-btn" style="width: 100%;">LƯU
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <td>
                            <form action="{{route('destroy',$baiviet->ma_bviet)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item fs-6  bg-white">
                                    <i class="fa-solid fa-trash-can"></i>

                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
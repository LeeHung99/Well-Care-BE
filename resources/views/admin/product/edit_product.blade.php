@extends('admin/layout_admin/layout')
@section('noidungchinh')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="title_post d-flex my-3">
        <h2 class="me-3">Sửa sản phẩm</h2>
    </div>
    <form class="m-auto" id="frm" method="post" action="/admin/updateproduct{{ $data->id_product }}"> @csrf
        <div class="row">
            <div class="col-xl-8">
                <div class='mb-3 px-2'>
                    <label><b>Tên sản phẩm</b></label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-3 px-2'>
                    <label><b>Giá</b></label>
                    <input type="text" name="price" value="{{ number_format($data->price, 0, ',', '.') }}"
                        class="form-control" />
                </div>
                <div class='mb-3 px-2'>
                    <label><b>Tồn kho</b></label>
                    <input type="text" name="in_stock" value="{{ $data->in_stock }}" class="form-control" />
                </div>
                <div class='mb-3 px-2'>
                    <label><b>Thương hiệu</b></label>
                    <input type="text" name="brand" value="{{ $data->brand }}" class="form-control" />
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <label><b>Danh mục</b></label>
                        <select name="category" class="form-control">
                            @foreach ($third_cate as $category)
                                <option value="{{ $category->id_third_category }}" name="category"
                                    {{ $data->Third_categories->id_third_category == $category->id_third_category ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-header">
                        <label><b>Hình ảnh</b></label>
                        <input type="file" name="avatar" value="" class="form-control" />
                        <img src="http://127.0.0.1:8000/images/product/{{ $data->avatar }}" alt="">
                    </div>
                    <div class="card-body">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" id="flexCheckDefault" value="0"
                                name="hide" {{ $data->hide == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Ẩn
                            </label>
                        </div>
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="radio" id="flexCheckDefault" value="1"
                                name="hide" {{ $data->hide == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Hiện
                            </label>
                        </div>
                    </div>
                </div>
                <div class='mt-3 px-2'>
                    <button type="submit" class="btn btn-primary py-2 px-5 border-0">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
@endsection

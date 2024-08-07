@extends('admin/layout_admin/layout')
@section('noidungchinh')
    <div class="title_post d-flex my-3">
        <h2 class="me-3">Chỉnh sửa Logo</h2>
    </div>
    <form class="m-auto" id="frm" method="post" action="/admin/updatelogo{{$logos->id_logo}}" enctype="multipart/form-data"> @csrf
        <div class="row">
            <div class="col-xl-8">
                <div class="card-header mb-3">
                    <strong>Ảnh đại diện</strong>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="imgInp" >
                    </div>
                    <img id="blah" class="bg-dark" src="https://cms.wellcarepharmacy.shop/images/logo/{{$logos->image}}" alt="your image" width="50%" />
                </div>
                <script>
                    imgInp.onchange = evt => {
                        const [file] = imgInp.files
                        if (file) {
                            blah.src = URL.createObjectURL(file)
                        }
                    }
                </script>
            </div>
            <div class="col-xl-4">
                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <strong>Vị trí hình ảnh</strong>
                    </div>
                    <div class="card-body">
                        @foreach ($positions as $key => $position)
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="radio"
                                    id="flexCheckDefault"
                                    value="{{$key}}" name="position" {{ $logos->position == $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$position}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class='mt-3 px-2'>
                    <button type="submit" class="btn btn-primary py-2 px-5 border-0">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
@endsection
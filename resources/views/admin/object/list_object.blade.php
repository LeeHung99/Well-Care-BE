<style>
    /* thead a {
        color: black
    } */
    .search-container {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-box input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 25px;
        outline: none;
    }

    .search-box button {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
    }

    .search-box button img {
        width: 20px;
        height: 20px;
    }
</style>
@extends('admin/layout_admin/layout')
@section('noidungchinh')
    <div class="d-flex justify-content-between align-items-end " style="width: 90%">
        <div class="title_post d-flex my-3">
            <h2 class="me-3">Danh sách đối tượng sử dụng</h2>
            <a class="btn btn-outline-primary" href="/admin/storeobject">Thêm đối tượng sử dụng</a>
        </div>
        <div class="search-container">
            <div class="search-box">
                <form action="{{ route('object') }}" method="GET">
                    <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Tìm kiếm...">
                    <button type="submit">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png" alt="Tìm kiếm">
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if (Session::exists('thongbao'))
        <h4 class="alert alert-info text-center">{{ Session::get('thongbao') }}</h4>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="main-post">
        <div class="row">
            <div class="col-xl-12">
                <div class="list-post">
                    <table class="table table-striped border align-middle">
                        {{-- @dd($data) --}}
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Đối tượng</th>
                                <th scope="col">Ẩn hiện</th>
                                <th scope="col">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->hide == 1 ? 'Đang hiện' : 'Đang ẩn' }}</td>
                                    <td>{{ $item->created_at != null ? $item->created_at->format('d-m-Y') : '' }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('editobject', ['id' => $item->id_object]) }}">Sửa</a>

                                        <button type="button" class="btn btn-danger btn-sm delete-button"
                                            data-id="{{ $item->id_object }}">
                                            Xóa
                                        </button>
                                        <form id="delete-form-{{ $item->id_object }}"
                                            action="{{ route('destroyobject', ['id' => $item->id_object]) }}"
                                            method="GET" style="display: none;">
                                            {{-- @csrf --}}
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const formId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Bạn có chắc chắn không?',
                    text: "Bạn sẽ không thể hoàn tác điều này!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa nó!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${formId}`).submit();
                    }
                });
            });
        });
    });
</script>

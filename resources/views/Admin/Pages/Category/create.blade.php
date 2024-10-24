@extends('Admin.Layouts.master')
@section('title', 'Thêm mới danh mục')
@section('main-content')
<div class="content-wrapper" style="margin-top: 50px">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
        <div>
            <h3 class="p-0 m-0">Thêm danh mục</h3>
            <p></p>
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Thêm danh mục</li>
                </ol>
              </nav>
        </div>
    </div>

    <!-- Main content -->
    <section class="container-fluid">

    <!-- Default box -->
        <div class="my-5">
            <form action="{{ route('category.store', 'form='.$form) }}" method="post" class="p-4 col-8 mx-auto shadow border border-0">
                @csrf
                <div class="form-group">
                    <label for="name_inp">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" id="name_inp"  value="{{ old("name") }}" oninput="ChangeToSlug(this)">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-none">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" name="slug" id="slug"  value="{{ old("slug") }}">
                </div>
                <div class="form-group">
                    <label for="status" class="d-block">Trạng thái</label>
                    <label for="show" class="text-secondary">Hiện</label>
                    <input type="radio" class="mx-2" name="status" id="show" value="0" {{ old("status") == '0' ? "checked" : "" }} checked>
                    <label for="hide" class="text-secondary">Ẩn</label>
                    <input type="radio" class="mx-2" name="status" id="hide" value="1" {{ old("status") == '1' ? "checked" : "" }}>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @if ($form === 'dm')
                    <div class="form-group">
                        <select class="d-none" name="parent_id" id="parent_id" class="form-control">
                                <option value="0" selected>Mặc định</option>
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            @foreach ($categoryParent as $item)
                                <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <script>
    // ClassicEditor
    //         .create( document.querySelector( '#editor' ) )
    //         .catch( error => {
    //             console.error( error );
    //         } );
    function ChangeToSlug(elem)
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = elem.value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>
@endsection

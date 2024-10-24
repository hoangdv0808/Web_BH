@extends('Admin.Layouts.master')
@section('title', 'Thêm mới sản phẩm')
@section('main-content')
<div class="content-wrapper" style="margin-top: 50px">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
        <div>
            <h3 class="p-0 m-0">Thêm sản phẩm</h3>
            <p></p>
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Thêm sản phẩm</li>
                </ol>
              </nav>
        </div>
    </div>

    <!-- Main content -->
    <section class="container">

    <!-- Default box -->
        <div class="my-5">
            <form action="{{ route('product.store') }}" method="post" class="col-10 p-4 mx-auto shadow border border-0" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex">
                    <div class="col-6 pl-0">
                        <label for="name_inp">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="name_inp" oninput="ChangeToSlug(this)" value="{{ old("name") }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 pr-0">
                        <label for="slug">slug</label>
                        <input type="text" class="form-control" name="slug" id="slug"  value="{{ old("slug") }}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="col-6 pl-0">
                        <label for="price_inp">Giá</label>
                        <input type="text" class="form-control" name="price" id="price_inp"  value="{{ old("price") }}">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-6 pr-0">
                        <label for="sale_price_inp">Khuyến mãi</label>
                        <input type="text" class="form-control" name="sale_price" id="sale_price_inp"  value="{{ old("sale_price") }}">
                        @error('sale_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="capacity">Dung lượng</label>
                    <input type="text" class="form-control" name="capacity" id="capacity"  value="{{ old("capacity") }}">
                    @error('capacity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">Thương hiệu</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach ($brand as $item)
                            <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? 'selected': '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ingredients">Chất Liệu</label>
                    <textarea id="" name="ingredients" class="form-control" placeholder="Chất Liệu...">{{ old('ingredients') }}</textarea>
                    @error('ingredients')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">mô tả</label>
                    <textarea id="editor" class="form-control" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Ảnh</label>
                    <input type="file" class="form-control" name="photo" id="photo">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photos">Ảnh mô tả</label>
                    <input type="file" class="form-control" name="photos[]" id="photos" multiple>
                    {{-- @error('photos')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror --}}
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.replace( 'editor1' );
</script>
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

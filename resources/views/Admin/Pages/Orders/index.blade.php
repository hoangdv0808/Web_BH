@extends('Admin.Layouts.master')
@section('title', 'Quản lí đơn hàng')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Danh sách đơn hàng</h3>
                <p></p>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 bg-transparent text-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Danh sách đơn hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <section class="">

                <!-- Default box -->
                <div class="">
                    <table class="table table-bordered table-hover mt-5">
                        <thead class="bg-light-blue-gradient">
                            <tr>
                                <th class="">STT</th>
                                <th class="col-2">Tên người đặt hàng</th>
                                <th class="col-2">Số điện thoại</th>
                                <th class="col-1">Địa chỉ</th>
                                <th class="col-2">Ghi chú</th>
                                <th class="col-2">Số lượng</th>
                                <th class="col-1">Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->name }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->phone }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->address }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->note }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->orderDetail()->get()->count() }}</td>
                                    <td data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-lg">
                                        {{ $item->status == 0 ? "Chuẩn bị hàng" : ($item->status == 1 ? "Vận chuyển" : ($item->status == 2 ? "giao hàng" : ($item->status == 3 ? "Hoàn thành" : ($item->status == 4 ? "Đã hủy" : 'Trả hàng')))) }}</td>
                                    <td class="d-flex align-items-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".{{ $item->id }}bd-example-modal-sm">Sửa</button>
                                        <div class="modal fade {{ $item->id }}bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                              <div class="modal-content">
                                                <form action="{{ route('order.update', $item->id) }}" method="post" class="p-3">
                                                    @csrf
                                                    @method('PUT')

                                                    <h3 class="text-center">Trạng thái</h3>
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="radio" name='status' id="status-0" value="0" class="d-inline mr-2" {{ $item->status == 0 ? 'checked' : '' }}>
                                                            <label for="status-0" class="d-inline-block">Đang chuẩn bị</label>
                                                        </div>

                                                        <div>
                                                            <input type="radio" name='status' id="status-1" value="1" class="d-inline mr-2" {{ $item->status == 1 ? 'checked' : '' }}>
                                                            <label for="status-1" class="d-inline-block">Vận chuyển</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name='status' id="status-2" value="2" class="d-inline mr-2" {{ $item->status == 2 ? 'checked' : '' }}>
                                                            <label for="status-2" class="d-inline-block">Giao hàng</label>
                                                        </div>

                                                        <div>
                                                            <input type="radio" name='status' id="status-3" value="3" class="d-inline mr-2" {{ $item->status == 3 ? 'checked' : '' }}>
                                                            <label for="status-3" class="d-inline-block">Hoàn thành</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name='status' id="status-4" value="4" class="d-inline mr-2" {{ $item->status == 4 ? 'checked' : '' }}>
                                                            <label for="status-4" class="d-inline-block">Đã hủy</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name='status' id="status-5" value="5" class="d-inline mr-2" {{ $item->status == 5 ? 'checked' : '' }}>
                                                            <label for="status-5" class="d-inline-block">Trả hàng</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">Lưu</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        {{-- <form action="{{ route('product.destroy', $item->id) }}" method="post"
                                            id="form-delete">
                                            @method('DELETE') @csrf
                                            <button type="submit" class="btn btn-danger rounded-0">Xóa</button>
                                        </form> --}}
                                    </td>
                                </tr>

                                <div class="modal fade {{ $item->id }}bd-example-modal-lg" tabindex="-1"
                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="p-3">
                                                <div class="box-product">
                                                    @foreach ($item->orderDetail()->get() as $prd)
                                                        <div class="item d-flex align-items-center border border-1 p-2 mb-3">
                                                            <span class="d-block col-2">
                                                                <img class="w-100" src="{{ asset('storage/images') }}/{{ $prd->product()->first()->thumbnail }}" alt="">
                                                            </span>
                                                            <div class="w-100">
                                                                <h6><span class="small">{{ $prd->product()->first()->name }}</span></h6>
                                                                <p class="p-0 m-0">Số lượng: {{ $prd->quantity }}</p>
                                                                <span>Tổng tiền: <b>{{ $prd->total }}<sup>đ</sup></b></span>
                                                            </div>
                                                            <span class="d-flex align-items-center">{{ $prd->product()->first()->sale_price > 0 ? $prd->product()->first()->sale_price :  $prd->product()->first()->price }}<sup>đ</sup></span>
                                                        </div>

                                                    @endforeach
                                                </div>
                                                <div class="d-flex">
                                                    <div class="w-50 ">
                                                        <div class="px-3 border-right border-1">
                                                            <h3 class="text-center">Thông tin khách hàng</h3>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Tên:</b>
                                                                <span>{{ $item->name }}</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Email:</b>
                                                                <span>{{ $item->email }}</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Số điện thoại:</b>
                                                                <span>{{ $item->phone }}</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Địa chỉ:</b>
                                                                <span>{{ $item->address }}</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Ghi chú:</b>
                                                                <span>{{ $item->note }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="w-50 ">
                                                        <div class="px-3 border-right border-1">
                                                            <h3 class="text-center">Thành tiền</h3>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Tiền hàng:</b>
                                                                <span>{{ $item->orderDetail()->sum('total') }}</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Phí vận chuyển:</b>
                                                                <span>0</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Mã giảm giá:</b>
                                                                <span>0</span>
                                                            </p>
                                                            <p class=" d-flex justify-content-between align-items-center">
                                                                <b>Tổng tiền:</b>
                                                                <span>{{ $item->orderDetail()->sum('total') }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center mx-auto py-3">
                                                    <h5 class="p-0 m-0">Trạng thái: <b class="text-danger">{{ $item->status == 0 ? "Chuẩn bị hàng" : ($item->status == 1 ? "Vận chuyển" : ($item->status == 2 ? "giao hàng" : ($item->status == 3 ? "Hoàn thành" : ($item->status == 4 ? "Đã hủy" : 'Trả hàng')))) }}</b></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.box -->
                    {{-- <div class="text-center">{{ $orders->links() }}</div> --}}
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
@endsection

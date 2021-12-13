@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left">จัดการสินค้า</h4> <a href="" data-target="#addproduct" data-toggle="modal" style="float:right" class="btn btn-dark"><i class="fa fa-plus"></i> เพิ่มสินค้า</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ประเภท</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>เเจ้งเตือนสินค้าในคลัง</th>
                                    <th>จัดการ</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $key=> $product)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{number_format($product->price,2)}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>@if($product->alert_stock >= $product->quantity) <span class="badge  bg-danger text-white">สินค้าในคลังเหลือ {{$product->alert_stock}}</span>
                                        @else <span class="badge  bg-success text-white">{{$product->alert_stock}}</span>
                                        @endif
                                    </td>


                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm text-white btn-warning" data-target="#editproduct{{$product->id}}" data-toggle="modal">
                                                <i class="fa fa-edit"></i>เเก้ไข</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-target="#deleteproduct{{$product->id}}" data-toggle="modal"><i class="fa fa-trash"></i>ลบ</a>
                                        </div>

                                    </td>
                                </tr>

                                <!-- Modal  edit product detail-->
                                <div class="modal right fade" id="editproduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">เเก้ไขข้อมูลสินค้า</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('ProductUpdate',$product->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">ชื่อสินค้า</label>
                                                        <input type="text" name="product_name" id="" value="{{$product->product_name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ประเภท</label>
                                                        <input type="text" name="brand" id="" value="{{$product->brand}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ราคา</label>
                                                        <input type="number" name="price" id="" value="{{$product->price}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">จำนวน</label>
                                                        <input type="number" name="quantity" id="" value="{{$product->quantity}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">เเจ้งเตือน Stock สินค้า</label>
                                                        <input type="number" name="alert_stock" id="" value="{{$product->alert_stock}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">รายละเอียด</label>
                                                        <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-success btn-block">บันทึก</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <!-- Modal  delete product detail-->
                                <div class="modal right fade" id="deleteproduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">ลบข้อมูลสมาชิก</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('ProductDestroy',$product->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>คุณเเน่ใจว่าจะลบ {{$product->product_name}} ?</p>


                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-info " data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-outline-danger ">ลบ</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </tbody>

                        </table>
                        {{$products->links()}}
                    </div>

                </div>
            </div>
            <div class=" col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>ค้นหา</h4>
                    </div>
                    <div class="card-body">
                        ..............
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Modal add product -->
<div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">เพิ่มสินค้า</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('productAdd')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อสินค้า</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ประเภท</label>
                        <input type="text" name="brand" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ราคา</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">จำนวน</label>
                        <input type="number" name="quantity" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">เเจ้งเตือน Stock สินค้า</label>
                        <input type="number" name="alert_stock" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">รายละเอียด</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline-success btn-block">บันทึก</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<style>
    .modal.right .modal-dialog {
        top: 0;
        right: 0;
        margin-right: 19vh;
    }

    .modal-fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>
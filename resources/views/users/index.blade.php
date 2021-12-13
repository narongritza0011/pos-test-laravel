@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left">จัดการสมาชิก</h4> <a href="" data-target="#addUser" data-toggle="modal" style="float:right" class="btn btn-dark"><i class="fa fa-plus"></i> เพิ่มสมาชิก</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    <th>อีเมล์</th>
                                    <th>ตำเเหน่ง</th>
                                    <th>จัดการ</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $key=> $user)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->is_admin==1)
                                        <span class="badge  bg-primary text-white">เเอดมิน</span>
                                        @else
                                        <span class="badge bg-warning text-white">พนักงาน</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm text-white btn-warning" data-target="#editUser{{$user->id}}" data-toggle="modal">
                                                <i class="fa fa-edit"></i>เเก้ไข</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-target="#deleteUser{{$user->id}}" data-toggle="modal"><i class="fa fa-trash"></i>ลบ</a>
                                        </div>

                                    </td>
                                </tr>

                                <!-- Modal  edit user detail-->
                                <div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">เเก้ไขข้อมูลสมาชิก</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('update',$user->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">ชื่อ</label>
                                                        <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">อีเมล์</label>
                                                        <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">เบอร์ติดต่อ</label>
                                                        <input type="text" name="phone" id="" value="{{$user->phone}}" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">รหัสผ่าน</label>
                                                        <input type="password" name="password" value="{{$user->password}}" readonly id="" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">ยืนยันรหัสผ่าน</label>
                                                        <input type="password" name="confirm_password" id="" value="{{$user->password}}" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">ตำเเหน่ง</label>
                                                        <select name="is_admin" id="" class="form-control">

                                                            <option value="1" @if($user->is_admin ==1)
                                                                selected @endif>เเอดมิน</option>
                                                            <option value="2" @if($user->is_admin ==2)selected @endif>พนักงาน</option>

                                                        </select>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-success btn-block">บันทึก</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <!-- Modal  delete user detail-->
                                <div class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">ลบข้อมูลสมาชิก</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('destroy',$user->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>คุณเเน่ใจว่าจะลบ {{$user->name}} ?</p>


                                                    <div class="modal-footer">
                                                        <button class="btn btn-default " data-dismiss="modal">ยกเลิก</button>
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
                        {{$users->links()}}
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



<!-- Modal -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">เพิ่มสมาชิก</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อ</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">อีเมล์</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">เบอร์ติดต่อ</label>
                        <input type="text" name="phone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">รหัสผ่าน</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ยืนยันรหัสผ่าน</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ตำเเหน่ง</label>
                        <select name="is_admin" id="" class="form-control">
                            <option selected disabled>กรุณาเลือก</option>
                            <option value="1">เเอดมิน</option>
                            <option value="2">พนักงาน</option>

                        </select>

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
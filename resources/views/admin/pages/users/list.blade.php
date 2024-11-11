@extends('admin.layouts.app')



@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="mb-5">المستخدمين</h2>

        <div class="card-title">
            <a href="{{ route('user_add') }}" class="btn btn-primary">اضافة</a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ر.ت</th>
                                <th>الاسم</th>
                                <th>اسم الدخول</th>
                                <th>تاريخ الاضافة</th>
                                <th>اجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->username }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>

                                    <a href="{{ route('user_edit',$d->id) }}" class="btn btn-primary">تعديل</a>
                                    <a href="{{ route('user_delete',$d->id) }}" class="btn btn-danger">حذف</a>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('admin/js/data-table.js')}}"></script>
@endsection
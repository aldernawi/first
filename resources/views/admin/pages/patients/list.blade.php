@extends('admin.layouts.app')



@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="mb-5">المرضي</h2>
        <div class="card-title">
            <a href="{{ route('patients_add') }}" class="btn btn-primary">اضافة</a>
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
                                <th>حالة المريض</th>
                                <th>الهاتف</th>
                                <th>العنوان</th>
                                <th>الجنس</th>
                                <th>تاريخ الميلاد</th>
                                <th>اجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->user->username }}</td>
                                <td>{{ $d->dig}}</td>
                                <td>{{ $d->phone }}</td>
                                <td>{{ $d->adress }}</td>
                                <td>{{ $d->gender }}</td>
                                <td>{{ $d->dateofbrith }}</td>
                                <td>
                                    <a href="{{ route('patients_profile',$d->id) }}" class="btn btn-primary">ملف</a>
                                    <a href="{{ route('patients_edit',$d->id) }}" class="btn btn-primary">تعديل</a>
                                    <a href="{{ route('patients_delete',$d->id) }}" class="btn btn-danger">حذف</a>
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
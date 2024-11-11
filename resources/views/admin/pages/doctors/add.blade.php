@extends('admin.layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-body">
        <h2 class="mb-5">اضافة بيانات دكتور</h2>

        <form class="forms-sample" action="{{ route('doctors_save') }}" method="post">
            @csrf
            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputUsername1">الاسم </label>
                        <input required type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="الاسم">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputUsername1">اسم المستخدم</label>
                        <input required type="text" class="form-control" id="exampleInputUsername1" name="username" placeholder="اسم المستخدم">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input required type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="كلمة المرور">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputUsername1">التخصص</label>

                        <select class="form-control" name="specialties_id">
                            @foreach($sp as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">الجنس</label>
                        <select class="form-control" name="gender">
                            <option value="ذكر">ذكر</option>
                            <option value="انثي">انثي</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">تاريخ الميلاد</label>
                        <input required type="date" class="form-control" id="exampleInputPassword1" name="dateofbrith" placeholder="كلمة المرور">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">العنوان</label>
                        <input required type="text" class="form-control" id="exampleInputPassword1" name="adress" placeholder="العنوان">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">الهاتف</label>
                        <input required type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="الهاتف">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">حفظ</button>
            <a href="{{ route('doctors') }}" class="btn btn-light">الغاء</a>
        </form>
    </div>
</div>

@endsection
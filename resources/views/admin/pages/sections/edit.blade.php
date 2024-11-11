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
        <h2 class="mb-5">تعديل قسم</h2>

        <form class="forms-sample" action="{{ route('section_update',$data->id) }}" method="post">
            @csrf
            <input required type="hidden" class="form-control" id="exampleInputUsername1" value="{{ $data->id }}" name="id" placeholder="الاسم">

            <div class="form-group">
                <label for="exampleInputUsername1">الاسم </label>
                <input required type="text" class="form-control" id="exampleInputUsername1" value="{{ $data->name }}" name="name" placeholder="الاسم">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">مركز العلاج</label>

                <select class="form-control" name="tc_id">
                    @foreach($tc as $t)
                    <option @if( $data->tc_id == $t->id) selected @endif value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary me-2">حفظ</button>
            <a href="{{ route('section') }}" class="btn btn-light">الغاء</a>
        </form>
    </div>
</div>

@endsection
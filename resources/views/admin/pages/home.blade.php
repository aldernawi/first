@extends('admin.layouts.app')

@section('content')




<div class="row mb-4 justify-content-right align-items-center d-flex flex-wrap mt-5 mt-xl-0 mb-3 ">
    {{Auth::user()->name}} - @if(Auth::user()->type == 'admin') {{'مدير النظام'}} @elseif(Auth::user()->type == 'doctor') {{'طبيب'}} @endif
    <hr class="w-100 my-3 " >
</div>
<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">اجمالي المراكز</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$treatmentCenter}}</h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">اجمالي المرضي</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$patients}}</h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">اجمالي التشخيصات</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$dignes}}</h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">اجمالي المستخدمين</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$users}}</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
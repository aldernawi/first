@extends('admin.layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
@endsection
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
        <h2 class="mb-5">ملف المريض</h2>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-custom" data-bs-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="false">
                            بيانات المريض
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-custom" data-bs-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                            مواعيد المريض
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-custom" data-bs-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                            التشخيص
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-vibes-tab-custom" data-bs-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false">
                            وصفات طبية
                        </a>
                    </li>

                </ul>
                <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
                    <div class="tab-pane fade active show" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                        @include('admin.pages.patients.includes.profile')
                    </div>
                    <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                        @include('admin.pages.patients.includes.appoiments')

                    </div>
                    <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                        @include('admin.pages.patients.includes.dig')
                    </div>
                    <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
                        @include('admin.pages.patients.includes.mid')

                    </div>
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
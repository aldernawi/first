<div class="card">
    <div class="card-body">

        <div class="card-title">
            @if(Auth::user()->type == 'doctor')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mid-4" data-whatever="@mdo">اضافة</button>
            <div class="modal fade" id="mid-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">اضافة موعد</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('patients_mid_save') }}" method="post">

                            <div class="modal-body">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name='pation_id' value="{{ $data->id }}" class="form-control">
                                    <input type="hidden" name='tc_id' value="{{ $data->tc->id }}" class="form-control">
                                    <input type="hidden" name='doctor_id' value="{{ Auth::user()->id }}" class="form-control">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">الدواء</label>
                                            <input type="text" name="med_id" class="form-control" id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ملاحظة</label>
                                            <input type="text" name="times" class="form-control" id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">الحالة</label>
                                            <select class="form-control" name="status">
                                                <option value="في الانتظار">في الانتظار</option>
                                                <option value="مستمر">مستمر</option>
                                                <option value="مرة واحدة">مرة واحدة</option>
                                                <option value="مغلق">مغلق</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">حفظ</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">الغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ر.ت</th>
                                <th>مركز العلاج</th>
                                <th>الدكتور</th>
                                <th>الدواء</th>
                                <th>ملاحظة</th>
                                <th>الحالة</th>
                                <th>تاريخ الاضافة</th>
                                <th>اجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mid as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->tc->name }}</td>
                                <td>{{ $d->doctors->name }}</td>
                                <td>{{ $d->med_id }}</td>
                                <td>{{ $d->times }}</td>
                                <td>{{ $d->status }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>
                                    <a class="btn btn-primary">تعديل</a>
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
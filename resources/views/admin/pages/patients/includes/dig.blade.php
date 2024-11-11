<div class="card">
    <div class="card-body">

        <div class="card-title">
            @if(Auth::user()->type == 'doctor')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adddig" data-whatever="@adddig">اضافة</button>
            <div class="modal fade" id="adddig" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">اضافة تشخيص</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('save_dignses') }}" method="post">

                            <div class="modal-body">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name='pation_id' value="{{ $data->id }}" class="form-control">
                                    <input type="hidden" name='tc_id' value="{{ $data->tc->id }}" class="form-control">
                                    <input type="hidden" name='doctor_id' value="{{ Auth::user()->id }}" class="form-control">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">التشخيص:</label>
                                            <input type="text" name="dig" class="form-control" id="recipient-name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">الحالة</label>
                                            <select class="form-control" name="status">
                                                <option value="نشط">نشط</option>
                                                <option value="ملغي">ملغي</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ملاحظة:</label>
                                            <input type="text" class="form-control" name="note">
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
                                <th>التشخيص</th>
                                <th>ملاحظة</th>
                                <th>الحالة</th>
                                <th>اجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dig as $key => $d)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $d->tc->name }}</td>
                                <td>{{ $d->doctors->name }}</td>
                                <td>{{ $d->dig }}</td>
                                <td>{{ $d->note }}</td>
                                <td>{{ $d->status }}</td>
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
<div class="row">
    <div class="col-6 p-4">
        الاسم : {{ $data->user->name }}
    </div>
    <div class="col-6 p-4">
        تاريخ الملاد : {{ $data->dateofbrith }}
    </div>
    <div class="col-6 p-4">
        الجنس : {{ $data->gender }}
    </div>
    <div class="col-6 p-4">
        العنوان : {{ $data->adress }}
    </div>
    <div class="col-6 p-4">
        الهاتف : {{ $data->phone }}
    </div>
    <div class="col-6 p-4">
        حالة المريض : {{ $data->dig }}
    </div>
    <div class="col-6 p-4">
        مركز العلاج : {{ $data->tc->name }}

    </div>
    <div class="col-6 p-4">
        تاريخ اخر تشخيص : -
    </div>

</div>
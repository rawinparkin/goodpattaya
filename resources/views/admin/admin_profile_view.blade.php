@extends('admin.admin_master')
@section('admin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                        <img class="rounded-circle" style="width:200px"
                            src="{{ (!empty($adminData->profile_image))? url('upload/admin/'.$adminData->profile_image):url('upload/no_image.png') }}"
                            alt="Card image cap">
                    </center>

                    <div class="card-body">
                        <h4 class="font-weight-light">Name : {{ $adminData->name }} </h4>
                        <hr>
                        <h4 class="font-weight-normal">Email : {{ $adminData->email }} </h4>
                        <hr>
                        <h4 class="font-weight-normal">Phone : {{ $adminData->phone }} </h4>
                        <hr>
                        <h4 class="font-weight-normal">Line : {{ $adminData->line }} </h4>
                        <hr>

                        <a href="{{ route('edit.profile') }}" class="btn btn-primary"> Edit Profile</a>

                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

@endsection
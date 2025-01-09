@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>

                        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name"
                                    autocomplete="off" value="{{ $editData->name }}">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Email"
                                    autocomplete="off" value="{{ $editData->email }}">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Phone"
                                    autocomplete="off" value="{{ $editData->phone }}">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Line</label>
                                <input name="line" type="text" class="form-control" placeholder="Line"
                                    autocomplete="off" value="{{ $editData->line }}">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Profile Image</label>
                                <input name="profile_image" class="form-control" type="file" id="image">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded-circle avatar-lg" style="width:200px"
                                        src="{{ (!empty($editData->profile_image))? url('upload/admin/'.$editData->profile_image):url('upload/no_image.png') }}"
                                        alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->


                            <br>



                            <input type="submit" value="Update" class="btn btn-primary" />
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>



    <script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    </script>

    @endsection
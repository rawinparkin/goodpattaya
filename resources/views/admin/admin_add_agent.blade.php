@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <div class="card-body">
                        <h4 class="card-title">Add Agent</h4>

                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif

                        <form method="post" action="{{ route('store.agent') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name"
                                    autocomplete="off" value="">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email"
                                    autocomplete="off" value="">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" id="password "
                                    autocomplete="off" placeholder="Password" value="">
                            </div>
                            <!-- end row -->

                            <div class="form-group mt-2">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="password_confirmation" autocomplete="off" placeholder="Password" value="">
                            </div>
                            <!-- end row -->



                            <br>



                            <input type="submit" value="Add Agent" class="btn btn-primary" />
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>





    @endsection
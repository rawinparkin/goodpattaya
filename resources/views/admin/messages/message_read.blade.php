@extends('admin.admin_master')
@section('admin')




<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">




                        <input type="hidden" name="id" value="{{ $messages->id }}">

                        <div class="row border-bottom mb-3">
                            <label for="example-text-input" class="col-sm-12 col-form-label">
                                <h4>{{ $messages->customer_subject }}</h4>
                            </label>
                        </div>
                        <!-- end row -->


                        <div class="row ">
                            <p style="font-size:16px;"> Name : {{ $messages->customer_name }}
                            </p>
                        </div>
                        <!-- end row -->



                        <div class="row">
                            <p style="font-size:16px;">Email : {{ $messages->customer_email }}</p>
                        </div>

                        <div class="row">
                            <p style="font-size:16px;">Phone : {{ $messages->customer_phone }}</p>
                        </div>

                        <div class="row border-bottom mb-3">
                            <p style="font-size:16px;">Posted : {{ $messages->created_at->format('M d, Y - H:i')  }}
                            </p>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <p style="font-size:16px;"> Message :</p>
                        </div>

                        <div class="row">
                            <p style="font-size:16px;"> {{ $messages->customer_message }}</p>
                        </div>
                        <!-- end row -->



                        <!-- end row -->




                    </div>
                </div>

                <a href="{{ route('all.messages') }}" class="btn btn-primary btn-lg" role="button"
                    aria-pressed="true">Back</a>
            </div> <!-- end col -->



        </div>



    </div>
</div>

@endsection
@extends('admin.admin_master')
@section('admin')



<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">








<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Contract</h4> <br><br>

                        <form id="myForm" method="post" action="{{ route('store.prop.contract') }}">
                            @csrf



                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="form-group mb-3">
                                                <label for="property_id_input" class="form-label">Property Id</label>
                                                <input type="number" name="property_id" id="property_id_input" class="form-control" autocomplete="off">
                                                @error('property_id')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="start_input" class="form-label">Start Date</label>
                                                <input type="text" name="start" id="start_input" class="form-control" autocomplete="off">
                                                @error('start')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror

                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="end_input" class="form-label">End Date</label>
                                                <input type="text" name="end" id="end_input" class="form-control" autocomplete="off">
                                                @error('end')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror

                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">


                                                <div class="form-group  col-md-12">
                                                    <label for="customer_name_input" class="form-label">Customer
                                                        Name</label>
                                                    <input type="text" class="form-control" id="customer_name_input" name="customer_name" autocomplete="off" value="">
                                                </div>



                                                <div class="form-group  col-md-12">
                                                    <label for="customer_phone_input" class="form-label">Customer
                                                        Phone</label>
                                                    <input type="text" class="form-control" id="customer_phone_input" name="customer_phone" autocomplete="off" value="">
                                                </div>




                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <input type="submit" class="btn btn-primary px-4" value="Add Contract" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>



                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script type="text/javascript">
    $("#start_input").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
    $("#end_input").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
</script>


@endsection
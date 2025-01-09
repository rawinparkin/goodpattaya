@extends('admin.admin_master')
@section('admin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>






<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Contact Page Settings</h4> <br><br>

                        <form id="myForm" method="post" action="{{ route('update.contact.page') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $contacts->id }}">
                            <input type="hidden" name="old_img" value="{{ $contacts->map }}">

                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="form-group mb-3">
                                                <label for="address_input" class="form-label">Address</label>
                                                <input type="text" name="address" id="address_input"
                                                    class="form-control" placeholder="Enter Address" autocomplete="off"
                                                    value="{{ $contacts->address }}">
                                                @error('address')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="phone_input" class="form-label">Phone</label>
                                                <input type="text" name="phone" id="phone_input" class="form-control"
                                                    placeholder="Enter Phone" autocomplete="off"
                                                    value="{{ $contacts->phone }}">
                                                @error('phone')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="email_input" class="form-label">Email</label>
                                                <input type="text" name="email" id="email_input" class="form-control"
                                                    placeholder="Enter Email" autocomplete="off"
                                                    value="{{ $contacts->email }}">
                                                @error('email')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>



                                            <div class="form-group  mb-3">
                                                <label class="form-label" for="cover_photo_input">Map Photo</label>
                                                <input class="form-control" name="map" id="cover_photo_input"
                                                    type="file" onChange="mainThumbUrl(this)">
                                                <br>
                                                <img id="mainThumb" src="{{ asset($contacts->map) }}"
                                                    style="width:500px; " />

                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="map_link_input" class="form-label">Map Link</label>
                                                <input type="text" name="map_link" id="map_link_input"
                                                    class="form-control" placeholder="Enter Email" autocomplete="off"
                                                    value="{{ $contacts->map_link }}">

                                            </div>






                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">


                                                <div class="form-group  col-md-12">
                                                    <label for="facebook_input" class="form-label">Facebook</label>
                                                    <input type="text" class="form-control" id="facebook_input"
                                                        name="facebook" autocomplete="off"
                                                        value="{{ $contacts->facebook }}">
                                                </div>



                                                <div class="form-group  col-md-12">
                                                    <label for="instagram_input" class="form-label">Instagram</label>
                                                    <input type="text" class="form-control" id="instagram_input"
                                                        name="instagram" autocomplete="off"
                                                        value="{{ $contacts->instagram }}">
                                                </div>




                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Update Contact Page" />
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







<script type="text/javascript">
function mainThumbUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThumb').attr('src', e.target.result).width(500);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>






@endsection
@extends('admin.admin_master')
@section('admin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.css') }}">
<script src="{{ asset('backend/assets/plugins/trumbowyg/trumbowyg.min.js') }}"></script>

<!-- 
<script src="https://unpkg.com/lite-editor@1.6.39/js/lite-editor.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/lite-editor@1.6.39/css/lite-editor.css"> -->


<style>
    .lite-editor {
        height: 200px;
    }
</style>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Property</h4> <br><br>

                        <form id="myForm" method="post" action="{{ route('update.property') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $props->id }}">
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="form-group mb-3">
                                                <label for="title_input" class="form-label">Property Title</label>
                                                <input type="text" name="title" id="title_input" class="form-control" placeholder="Enter property title" autocomplete="off" value="{{ $props['title']['title'] }}">
                                                @error('title')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="address_input" class="form-label">Property
                                                    Address</label>
                                                <input type="text" name="address" id="address_input" class="form-control" placeholder="Enter property address" autocomplete="off" value="{{ $props['address']['address'] }}">
                                                @error('address')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>




                                            <div class="form-group  mb-3">
                                                <label for="my-editor" class="form-label">Description</label>
                                                <textarea id="my-editor" name="description" class="form-control">{{ $props['title']['description'] }}</textarea>
                                                <!-- <textarea class=" js-editor" name="description"></textarea> -->
                                                @error('description')
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>






                                            <div></div>




                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="is_sell" type="checkbox" value="1" id="is_sell" {{ $props->is_sell == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="selling_price_input">Sell</label>
                                                            </div>
                                                            <input type="number" name="selling_price" id="selling_price_input" class="form-control" placeholder="00.00" value="{{ $props->selling_price }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="is_rent" type="checkbox" value="1" id="is_rent" {{ $props->is_rent == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="renting_price_input" for="checkdefault">Rent</label>

                                                            </div>
                                                            <input type="number" name="renting_price" id="renting_price_input" class="form-control" placeholder="00.00" value="{{ $props->renting_price }}">
                                                        </div>


                                                    </div>

                                                </div>




                                                <div class="form-group  col-md-6">
                                                    <label for="bed_input" class="form-label">Bed</label>
                                                    <input type="number" class="form-control" id="bed_input" name="bed" placeholder="2" autocomplete="off" value="{{ $props->bed }}">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="bath_input" class="form-label">Bath</label>
                                                    <input type="number" class="form-control" id="bath_input" name="bath" placeholder="2" autocomplete="off" value="{{ $props->bath }}">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="area_input" class="form-label">Area
                                                        (ตร.ม.)</label>
                                                    <input type="number" class="form-control" name="area" id="area_input" placeholder="2" autocomplete="off" value="{{ $props->area }}">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="land_input" class="form-label">Land (ตร.ว.)</label>
                                                    <input type="number" class="form-control" name="land" placeholder="2" autocomplete="off" id="land_input" value="{{ $props->land }}">
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="built_year_input" class="form-label">Built Year</label>
                                                    <input type="number" class="form-control" name="built_year" placeholder="2530" autocomplete="off" id="built_year_input" value="{{ $props->built_year }}">
                                                </div>

                                                <div class="form-group  col-md-6">
                                                    <label for="agent_id_input" class="form-label">Agent</label>
                                                    <select name="agent_id" class="form-select" id="agent_id_input">
                                                        <option></option>
                                                        @foreach($agents as $item)
                                                        <option value="{{ $item->id }}" {{ $props->agent_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('agent_id')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>



                                                <div class="form-group  col-12">
                                                    <label for="category_id_input" class="form-label">Category</label>
                                                    <select name="category_id" class="form-select" id="category_id_input">
                                                        <option></option>

                                                        @foreach($categories as $item)
                                                        <option value="{{ $item->id }}" {{ $props->category_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_id')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror


                                                </div>
                                                <div class="form-group  col-12">
                                                    <label for="location_id_input" class="form-label">Location</label>
                                                    <select name="location_id" class="form-select" id="location_id_input">
                                                        <option></option>
                                                        @foreach($locations as $item)
                                                        <option value="{{ $item->id }}" {{ $props->location_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>

                                                    @error('location_id')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group  col-md-6">
                                                    <label for="owner_name_input" class="form-label">Owner Name</label>
                                                    <input type="text" class="form-control" name="owner_name" placeholder="John" autocomplete="off" id="owner_name_input" value="{{ $props['owner']['owner_name'] }}">
                                                    @error('owner_name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="owner_phone_input" class="form-label">Owner
                                                        Phone</label>
                                                    <input type="text" class="form-control" id="owner_phone_input" name="owner_phone" placeholder="087-125-2121" autocomplete="off" value="{{ $props['owner']['owner_phone'] }}">
                                                    @error('owner_phone')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>




                                                <div class="col-12">

                                                    <div class="row g-3">

                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="is_featured" type="checkbox" value="1" id="is_featured_input" {{ $props->is_featured == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="is_featured_input">Featured</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="is_active" type="checkbox" value="1" id="is_active_input" {{ $props->is_active == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="is_active_input">Active</label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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



                <!-- Images Edit -->
                <h6 class="mb-0 text-uppercase">Update Images</h6>
                <hr>
                <div class="card">
                    <form id="myForm" method="post" action="{{ route('update.property.cover') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $props->id }}">
                        <input type="hidden" name="old_img" value="{{ $props->cover_photo }}">

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Choose Cover Image</label>
                                <input name="cover_photo" class="form-control" type="file" id="formFile" onChange="mainThumbUrl(this)">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <img id="mainThumb" src="{{ asset($props->cover_photo) }}" style="width:100px; ">
                            </div>

                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                        </div>
                    </form>
                </div>

                <!-- Multi Images Edit -->
                <h6 class="mb-0 text-uppercase">Update Multi Images</h6>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <table class="table md-0 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Change Images</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="myForm" method="post" action="{{ route('update.property.multiimage') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $props->id }}">
                                    @foreach($multiImg as $key => $img)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td><img src="{{ asset($img->photo_name) }}" style="width:100px;"></td>
                                        <td><input type="file" class="form-group" name="multi_img[{{ $img->id }}]"></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary px-4" value="Update">
                                            <a href="{{ route('property.multiimg.delete',$img->id)  }}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Images Edit -->
                <h6 class="mb-0 text-uppercase">Add More Images</h6>
                <hr>
                <div class="card">
                    <form id="myForm" method="post" action="{{ route('store.property.more.photo') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $props->id }}">


                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Choose Multiple Images</label>
                                <input class="form-control" id="multiImg" type="file" multiple="" name="multi_img[]">
                                <div class="row" id="preview_img"></div>
                            </div>



                            <input type="submit" class="btn btn-primary px-4" value="Add More Images">
                        </div>
                    </form>
                </div>


            </div> <!-- end col -->
        </div>



    </div>
</div>





<script>
    $('#my-editor').trumbowyg();

    // new LiteEditor('.js-editor');
</script>




<script type="text/javascript">
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e
                                    .target.result).width(100); //create image element 
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>




@endsection
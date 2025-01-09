@section('title')
ซื้อ ขาย ให้เช่า {{ $props[0]['category']['name'] }} พัทยา | Goodpattaya
@endsection

@extends('frontend.main_master')
@section('main')



@section('meta')
<meta property="og:title" content="ซื้อ ขาย ให้เช่า {{ $props[0]['category']['name'] }} พัทยา | Goodpattaya">
<meta property="og:image" content="{{ asset('frontend/assets/images/img_2.jpg') }}">
@endsection

@php
$route = Route::current()->getName();
$categories = App\Models\PropertyCategory::first()->get();
$locations = App\Models\PropertyLocation::first()->get();
$purposes = App\Models\PropertyPurpose::first()->get();

@endphp



@include('frontend.home.slide')

<div class="site-section site-section-sm pb-0">
    <div class="container">
        <div class="row">


            <form id="myForm" method="get" action="{{ route('prop.search') }}" class="form-search col-md-12" style="margin-top: -100px;">

                @csrf

                <div class="row  align-items-end">
                    <div class="col-md-3 form-group">
                        <label for="list-types">ประเภท</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="category_id" id="list-types" class="form-control d-block rounded-0">
                                <option></option>
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="offer-types">จุดประสงค์</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="purpose_id" id="offer-types" class="form-control d-block rounded-0">
                                <option></option>
                                @foreach($purposes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="select-city">ตำแหน่ง</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="location_id" id="select-city" class="form-control d-block rounded-0">
                                <option></option>
                                @foreach($locations as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="ค้นหา">
                    </div>
                </div>
            </form>




        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <div class="mr-auto">
                        <a href="#" id="normal-btn" class="icon-view view-module" onclick="viewnormal()"><span class="icon-view_module"></span></a>
                        <a href="#" id="list-btn" class="icon-view view-list" onclick="viewlist()"><span class="icon-view_list"></span></a>

                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="{{ route('home') }}" class="view-list px-3 border-right {{ ($route == 'home')? 'active' : '' }}">ทั้งหมด</a>
                            <a href="{{ route('home.prop.sell') }}" class="view-list px-3 border-right {{ ($route == 'home.prop.sell')? 'active' : '' }}">ขาย</a>
                            <a href="{{ route('home.prop.rent') }}" class="view-list px-3 {{ ($route == 'home.prop.rent')? 'active' : '' }}">ให้เช่า</a>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="normalView">
    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row mb-5">

                @php($i = 1)
                @foreach($props as $item)

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('prop.details',$item->id) }}" class="property-thumbnail">
                            <div class="offer-type-wrap">

                                @if($item->is_sell > 0)
                                <span class="offer-type bg-danger">ขาย</span>
                                @endif
                                @if($item->is_rent > 0)
                                <span class="offer-type bg-success">ให้เช่า</span>
                                @endif

                            </div>
                            <img src="{{ asset($item->cover_photo) }}" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">

                            <h2 class="property-title"><a href="{{ route('prop.details',$item->id) }}">{{ $item['title']['title'] }}</a>
                            </h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{ $item['address']['address'] }}</span>

                            @if($item->is_rent > 0 && $item->is_sell > 0)
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->selling_price) }}
                                - ฿{{ number_format($item->renting_price) }}/เดือน</strong>


                            @elseif($item->is_sell > 0)
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->selling_price) }}</strong>

                            @else
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->renting_price) }}/เดือน</strong>
                            @endif



                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                @if($item->bed > 0 )
                                <li>
                                    <span class="property-specs">ห้องนอน</span>
                                    <span class="property-specs-number">{{ $item->bed }}</span>

                                </li>
                                @endif
                                @if($item->bath > 0 )
                                <li>
                                    <span class="property-specs">ห้องน้ำ</span>
                                    <span class="property-specs-number">{{ $item->bath }}</span>

                                </li>
                                @endif
                                @if($item->area > 0 )
                                <li>
                                    <span class="property-specs">พื้นที่ (ตร.ม.)</span>
                                    <span class="property-specs-number">{{ number_format($item->area) }}</span>

                                </li>
                                @else
                                <li>
                                    <span class="property-specs">ที่ดิน (ตร.ว.)</span>
                                    <span class="property-specs-number">{{ number_format($item->land) }}</span>

                                </li>
                                @endif
                            </ul>


                        </div>
                    </div>
                </div>

                @endforeach


            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    {{ $props->links('vendor.pagination.custom') }}
                </div>
            </div>

        </div>
    </div>
</div>

<div id="listView">
    <div class="site-section site-section-sm bg-light">
        <div class="container">

            @php($i = 1)
            @foreach($props as $item)
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="property-entry horizontal d-lg-flex">

                        <a href="{{ route('prop.details',$item->id) }}" class="property-thumbnail h-100">
                            <div class="offer-type-wrap">

                                @if($item->is_sell > 0)
                                <span class="offer-type bg-danger">ขาย</span>
                                @endif
                                @if($item->is_rent > 0)
                                <span class="offer-type bg-success">ให้เช่า</span>
                                @endif

                            </div>
                            <img src="{{ asset($item->cover_photo) }}" alt="Image" class="img-fluid">
                        </a>

                        <div class="p-4 property-body">

                            <h2 class="property-title"><a href="{{ route('prop.details',$item->id) }}">{{ $item['title']['title'] }}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{ $item['address']['address'] }}</span>

                            @if($item->is_rent > 0 && $item->is_sell > 0)
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->selling_price) }}
                                - ฿{{ number_format($item->renting_price) }}/เดือน</strong>


                            @elseif($item->is_sell > 0)
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->selling_price) }}</strong>

                            @else
                            <strong class="property-price text-primary mb-3 d-block text-success">฿{{ number_format($item->renting_price) }}/เดือน</strong>
                            @endif

                            <p>{!! Str::words(strip_tags($item['title']['description']), 2, '') !!}</p>


                            <ul class="property-specs-wrap mb-3 mb-lg-0">

                                @if($item->bed > 0 )
                                <li>
                                    <span class="property-specs">ห้องนอน</span>
                                    <span class="property-specs-number">{{ $item->bed }}</span>

                                </li>
                                @endif
                                @if($item->bath > 0 )
                                <li>
                                    <span class="property-specs">ห้องน้ำ</span>
                                    <span class="property-specs-number">{{ $item->bath }}</span>

                                </li>
                                @endif
                                @if($item->area > 0 )
                                <li>
                                    <span class="property-specs">พื้นที่ (ตร.ม.)</span>
                                    <span class="property-specs-number">{{ number_format($item->area) }}</span>

                                </li>
                                @else
                                <li>
                                    <span class="property-specs">ที่ดิน (ตร.ว.)</span>
                                    <span class="property-specs-number">{{ number_format($item->land) }}</span>

                                </li>
                                @endif


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach






            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    {{ $props->links('vendor.pagination.custom') }}
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function viewlist() {
        $('#listView').show();
        $('#normalView').hide();
        $('#list-btn').addClass('active');
        $('#normal-btn').removeClass('active');

    }

    function viewnormal() {
        $('#normalView').show();
        $('#listView').hide();
        $('#normal-btn').addClass('active');
        $('#list-btn').removeClass('active');
    }

    function selectElement(id, valueToSelect) {
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }


    $(document).ready(function() {
        $('#listView').hide();
        $('#normal-btn').addClass('active');



    });

    $(document).ready(function() {
        let text = $("title").text();

        let cat1 = text.includes("บ้าน");
        let cat2 = text.includes("คอนโด");
        let cat3 = text.includes("ที่ดิน");
        let cat4 = text.includes("อาคาร");

        if (cat1)
            selectElement('list-types', '1');
        else if (cat2)
            selectElement('list-types', '3');
        else if (cat3)
            selectElement('list-types', '4');
        else if (cat3)
            selectElement('list-types', '5');

    });
</script>
</script>


@endsection
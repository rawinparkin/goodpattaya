@extends('frontend.main_master')
@section('main')


@section('title')
{{ $infos['title']['title'] }} | Goodpattaya
@endsection


@section('meta')
<meta property="og:title" content="{{ $infos['title']['title'] }}">
<meta property="og:image" content="{{ asset($infos->cover_photo) }}">
@endsection


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{ asset($infos->cover_photo) }}')" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">รายละเอียดของประกาศ</span>
                <h1 class="mb-2">{{ $infos['address']['address'] }}</h1>

                @if($infos->is_sell > 0 && $infos->is_rent > 0)
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">฿{{ number_format($infos->selling_price) }} -
                        {{ number_format($infos->renting_price) }}/เดือน
                    </strong>
                </p>
                @elseif($infos->is_sell > 0)
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">฿{{ number_format($infos->selling_price) }}
                    </strong>
                </p>
                @else
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{ number_format($infos->renting_price) }} /
                        เดือน</strong>
                </p>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div>
                    <div class="slide-one-item home-slider owl-carousel">


                        <div><img src="{{ asset($infos->cover_photo) }}" alt="Image" class="img-fluid"></div>

                        @foreach($multiImage as $image)
                        <div><img src="{{ asset($image->photo_name) }}" alt="Image" class="img-fluid"></div>

                        @endforeach

                    </div>
                </div>
                <div class="bg-white property-body border-bottom border-left border-right">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            @if($infos->is_sell > 0 && $infos->is_rent > 0)
                            <strong class="text-success h1 mb-3">฿{{ number_format($infos->selling_price) }} -
                                {{ number_format($infos->renting_price) }}/เดือน</strong>
                            @elseif($infos->is_sell > 0)
                            <strong class="text-success h1 mb-3">฿{{ number_format($infos->selling_price) }}</strong>
                            @else
                            <strong class="text-success h1 mb-3">฿{{ number_format($infos->renting_price) }} /
                                เดือน</strong>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">

                                @if( $infos->bed > 0)
                                <li>
                                    <span class="property-specs">ห้องนอน</span>
                                    <span class="property-specs-number">{{ $infos->bed }}</span>

                                </li>
                                @endif
                                @if( $infos->bath > 0)
                                <li>
                                    <span class="property-specs">ห้องน้ำ</span>
                                    <span class="property-specs-number">{{ $infos->bath }}</span>

                                </li>
                                @endif
                                @if( $infos->area > 0)
                                <li>
                                    <span class="property-specs">พื้นที่ ตร.ม.</span>
                                    <span class="property-specs-number">{{ number_format($infos->area) }}</span>
                                </li>


                                @endif


                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">ประเภท</span>
                            <strong class="d-block">{{ $infos['category']['name'] }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            @if( $infos->built_year > 0)
                            <span class="d-inline-block text-black mb-0 caption-text">ปีที่สร้าง</span>
                            <strong class="d-block">{{ $infos->built_year }}</strong>
                            @endif
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">ที่ดิน (ตร.ว.)</span>
                            <strong class="d-block">{{ number_format($infos->land) }}</strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black">รายละเอียด</h2>

                    <p>{!! $infos['title']['description'] !!}</p>

                    <div></div>
                    <br>
                    <p class="border d-inline p-3">รหัสประกาศ: {{ $infos->id }}</p>

                    <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">รูปภาพ</h2>
                        </div>



                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ asset($infos->cover_photo) }}" class="image-popup gal-item"><img src="{{ asset($infos->cover_photo) }}" alt="Image" class="img-fluid"></a>
                        </div>

                        @foreach($multiImage as $image)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ asset($image->photo_name) }}" class="image-popup gal-item"><img src="{{ asset($image->photo_name) }}" alt="Image" class="img-fluid"></a>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="bg-white widget border rounded">
                    <h4 class="h5 text-black mb-3">สอบถาม</h4>

                    <form id="myForm" method="post" action="{{ route('store.message') }}" class="form-contact-agent">

                        @csrf

                        <input type="hidden" name="customer_subject" class="form-control" value="ประกาศ {{ route('prop.details',$infos->id) }}">

                        <div class="form-group">
                            <label for="customer_name_input">ชื่อ</label>
                            <input type="text" name="customer_name" id="customer_name_input" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="customer_phone_input">เบอร์โทร</label>
                            <input type="text" name="customer_phone" id="customer_phone_input" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="customer_message_input">ข้อความ</label>
                            <textarea name="customer_message" id="customer_message_input" class="form-control" autocomplete="off" style="height:100px;"></textarea>

                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ส่งข้อความ">
                        </div>
                    </form>
                </div>

                <div class="bg-white widget border rounded">

                    <h4 class="h5 text-black mb-3">ติดต่อเรา</h4>


                    <h5 class="mb-4 ">{{ $infos['agent']['name'] }}</h5>

                    <p class="mb-0 font-weight-bold">โทรศัพท์</p>
                    <p class="mb-4">{{ $infos['agent']['phone'] }}</p>

                    <p class="mb-0 font-weight-bold">ไลน์ไอดี</p>
                    <p class="mb-0">{{ $infos['agent']['line'] }}</p>





                </div>



            </div>

        </div>
    </div>
</div>

<div class="site-section site-section-sm bg-light">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>ประกาศใกล้เคียง</h2>
                </div>
            </div>
        </div>

        <div class="row mb-5">


            @foreach($neightbors as $item)

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
    </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                customer_name: {
                    required: true,
                },
                customer_phone: {
                    required: true,
                },

                customer_message: {
                    required: true,
                },
            },
            messages: {
                customer_name: {
                    required: 'Please Enter Name',
                },
                customer_phone: {
                    required: 'Please Enter Phone',
                },
                customer_message: {
                    required: 'Please Enter Message',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


@endsection
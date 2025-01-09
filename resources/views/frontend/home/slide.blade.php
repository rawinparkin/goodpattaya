@php
$slides = App\Models\Property::where('is_featured',1)->first()->get();
@endphp

<div class="slide-one-item home-slider owl-carousel">

    @php($i = 1)
    @foreach($slides as $item)

    <div class="site-blocks-cover overlay" style="background-image: url('{{ asset($item->cover_photo) }}'); width:100vw;" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">

                    @if($item->is_sell > 0)

                    <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded" style="font-size:15px;">ขาย</span>
                    @endif
                    @if($item->is_rent > 0)
                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded" style="font-size:15px;">ให้เช่า</span>
                    @endif



                    <h1 class="mb-2">{{ $item['address']['address'] }}</h1>

                    @if($item->is_rent > 0 && $item->is_sell > 0)

                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">฿{{ number_format($item->selling_price) }}
                            - ฿{{ number_format($item->renting_price) }}/เดือน</strong></p>
                    @elseif($item->is_sell > 0)

                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">฿{{ number_format($item->selling_price) }}</strong>
                    </p>
                    @else

                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">฿{{ number_format($item->renting_price) }}/เดือน</strong>
                    </p>
                    @endif






                    <p><a href="{{ route('prop.details',$item->id) }}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2" style="font-size:14px;">ดูรายละเอียด</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @endforeach



</div>
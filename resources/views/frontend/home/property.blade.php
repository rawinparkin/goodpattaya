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
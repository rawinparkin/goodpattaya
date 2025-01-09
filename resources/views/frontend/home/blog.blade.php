@php
$blogs = App\Models\Blog::latest()->limit(3)->get();
@endphp


<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <div class="site-section-title">
                    <h2>บทความล่าสุด</h2>
                </div>
                <p>ไม่ว่าคุณจะกำลังมองหาที่พักหรือการลงทุนในพัทยา พวกเราคือเพื่อนที่คุณสามารถเชื่อถือได้
                    มาร่วมเรียนรู้เกี่ยวกับบริการของเราและติดต่อเราวันนี้
                    เพื่อให้เรามีโอกาสช่วยเหลือคุณในการสร้างภูมิคุ้มกันที่ดีที่สุดในการลงทุนที่อสังหาริมทรัพย์ของคุณในพัทยา
                </p>
            </div>
        </div>
        <div class="row">

            @php($i = 1)
            @foreach($blogs as $item)

            @if($i % 2 ==0)

            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('blog.details',$item->id) }}"><img src="{{ asset($item->blog_image) }}" alt="Image"
                        class="img-fluid"></a>
                <div class="p-4 bg-white">
                    <span
                        class="d-block text-secondary small text-uppercase">{{ $item->created_at->format('M d, Y') }}</span>
                    <h2 class="h5 text-black mb-3 mt-2"><a
                            href="{{ route('blog.details',$item->id) }}">{{ $item->blog_title }}</a>
                    </h2>
                    <p>{!! Str::words(strip_tags($item->blog_description), 2, '...') !!}</p>
                </div>
            </div>

            @else
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('blog.details',$item->id) }}"><img src="{{ asset($item->blog_image) }}" alt="Image"
                        class="img-fluid"></a>
                <div class="p-4 bg-white">
                    <span
                        class="d-block text-secondary small text-uppercase">{{ $item->created_at->format('M d, Y') }}</span>
                    <h2 class="h5 text-black mb-3 mt-2"><a
                            href="{{ route('blog.details',$item->id) }}">{{ $item->blog_title }}</a>
                    </h2>
                    <p>{!! Str::words(strip_tags($item->blog_description), 2, '...') !!}</p>
                </div>
            </div>
            @endif

            @php($i ++)
            @endforeach



        </div>

    </div>
</div>
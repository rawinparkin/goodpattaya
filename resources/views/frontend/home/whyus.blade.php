@php
$abouts = App\Models\AboutPage::find(1);
@endphp


<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <div class="site-section-title">
                    <h2>{{ $abouts->title_why }}</h2>
                </div>
                <p>{{ $abouts->description_why }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-house"></span>
                    <h2 class="service-heading">{{ $abouts->title_reason_1 }}</h2>
                    <p>{{ $abouts->reason_1 }}</p>

                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-sold"></span>
                    <h2 class="service-heading">{{ $abouts->title_reason_2 }}</h2>
                    <p>{{ $abouts->reason_2 }}</p>

                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-camera"></span>
                    <h2 class="service-heading">{{ $abouts->title_reason_3 }}</h2>
                    <p>{{ $abouts->reason_3 }}</p>

                </a>
            </div>
        </div>
    </div>
</div>
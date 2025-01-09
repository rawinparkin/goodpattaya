@php
$route = Route::current()->getName();
$categories = App\Models\PropertyCategory::first()->get();
$locations = App\Models\PropertyLocation::first()->get();
$purposes = App\Models\PropertyPurpose::first()->get();


@endphp

<div class="site-section site-section-sm pb-0">
    <div class="container">
        <div class="row">


            <form method="get" action="{{ route('prop.search') }}" class="form-search col-md-12"
                style="margin-top: -100px;">

                @csrf
                <div class="row  align-items-end">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="ค้นหา">
                    </div>
                </div>
            </form>




        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <div class="mr-auto">
                        <a href="{{ route('home.prop.all') }}"
                            class="icon-view view-module {{ ($route == 'home.prop.all')? 'active' : '' }}"><span
                                class="icon-view_module"></span></a>
                        <a href="{{ route('home.prop.list') }}"
                            class="icon-view view-list {{ ($route == 'home.prop.list')? 'active' : '' }}"><span
                                class="icon-view_list"></span></a>

                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="{{ route('home') }}"
                                class="view-list px-3 border-right {{ ($route == 'home')? 'active' : '' }}">ทั้งหมด</a>
                            <a href="{{ route('home.prop.sell') }}"
                                class="view-list px-3 border-right {{ ($route == 'home.prop.sell')? 'active' : '' }}">ขาย</a>
                            <a href="{{ route('home.prop.rent') }}"
                                class="view-list px-3 {{ ($route == 'home.prop.rent')? 'active' : '' }}">ให้เช่า</a>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
function selectElement(id, valueToSelect) {
    let element = document.getElementById(id);
    element.value = valueToSelect;
}


$(document).ready(function() {
    // let text = $("title").text();
    // let sell = text.includes("ขาย");
    // let rent = text.includes("ให้เช่า");
    // if (sell)
    //     selectElement('offer-types', '1');
    // if (rent)
    //     selectElement('offer-types', '2');

    // let cat1 = text.includes("บ้าน");
    // let cat2 = text.includes("คอนโด");
    // let cat3 = text.includes("ที่ดิน");
    // let cat4 = text.includes("อาคาร");

    // if (cat1)
    //     selectElement('list-types', '1');
    // else if (cat2)
    //     selectElement('list-types', '3');
    // else if (cat3)
    //     selectElement('list-types', '4');
    // else if (cat3)
    //     selectElement('list-types', '5');



});
</script>
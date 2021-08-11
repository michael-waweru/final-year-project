@section('title')
    Home
@endsection

<div class="hero v2 section-padding" style="background-image: url(/frontend/images/header/hero_1.jpg)">
    <div class="overlay op-2"></div>
    <!--Listing filter starts-->
    <div class="container pos-abs">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="header-text v1">
                    <h1>Let us guide you home</h1>
                </div>
            </div>

        </div>
    </div>
    <!--Listing filter ends-->
</div>
<!--Hero section ends-->
<!--Popular City starts-->
<div class="container pt-130">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title v1">
                <p>Browse popular properties</p>
                <h2>Find Properties in popular towns</h2>
            </div>
        </div>
    </div>
</div>
<div class="property-place pb-60 hideme" style="background-image: url(/frontend/images/bg/map-bg-1.png)">
    <div class="container">
        <div class="row">
            <div class="swiper-container popular-place-wrap v1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="location-left-sidebar.html"><img src="{{ asset('frontend/images/places/place_5.jpg') }}" alt="place-image"></a>
                            <a class="single-place-title" href="location-left-sidebar.html">Nakuru</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>{{ $nakuru_all }}</span>Apartment Listing</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="location-left-sidebar.html"><img src="{{ asset('frontend/images/places/place_1.jpg') }}" alt="place-image"></a>
                            <a class="single-place-title" href="location-left-sidebar.html">Dubai</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>{{ \App\Models\Property::where('location_id',3)->count() }}</span>Property Listings</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="location-left-sidebar.html"><img src="{{ asset('frontend/images/places/place_4.jpg') }}" alt="place-image"></a>
                            <a class="single-place-title" href="location-left-sidebar.html">New york</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>{{ \App\Models\Property::where('location_id',4)->count() }}</span>Luxury Apartment</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide single-place-wrap">
                        <div class="single-place-image">
                            <a href="location-left-sidebar.html"><img src="{{ asset('frontend/images/places/place_16.jpg') }}" alt="place-image"></a>
                            <a class="single-place-title" href="location-left-sidebar.html">Prague</a>
                        </div>
                        <div class="single-place-content">
                            <h3><span>{{ \App\Models\Property::where('location_id',5)->count() }}</span>Luxury Apartment</h3>
                            <a href="grid-fullwidth-map.html">See all Listings <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="slider-btn v2 popular-next"><i class="lnr lnr-arrow-right"></i></div>
                <div class="slider-btn v2 popular-prev"><i class="lnr lnr-arrow-left"></i></div>
            </div>
        </div>
    </div>
</div>
<!--Popular City ends-->

<div class="trending-places pb-130 mt-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v2">
                    <p>Browse some of our</p>
                    <h2>Recent Properties</h2>
                </div>
            </div>
            <div class="swiper-container trending-place-wrap">
                <div class="swiper-wrapper">
                    @foreach ($rproperties as $rproperty)
                        <div class="swiper-slide">
                            <div class="single-property-box">
                                <div class="property-item">
                                    <a class="property-img" href="{{ route('property.detail',['slug'=>$rproperty->slug]) }}"><img src="{{ asset('files/assets/real') }}/{{ $rproperty->image }}" alt="{{ $rproperty->name }}"> </a>
                                    <ul class="feature_text">
                                        <li class="feature_or"><span>For {{ $rproperty->status }}</span></li>
                                    </ul>
                                    <div class="property-author-wrap">
                                        <a href="#" class="property-author">
                                            <img src="{{ asset('files/assets/real') }}/{{ $rproperty->image }}" alt="{{ $rproperty->name }}">
                                            <span>Admin</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="property-title-box">
                                    <h4><a href="{{ route('property.detail',['slug' => $rproperty->slug]) }}">{{ $rproperty->name }}</a></h4>
                                    <div class="property-location">
                                        <i class="fa fa-map-marker-alt"></i>
                                        <p>{{ $rproperty->location->name }}</p>
                                    </div>
                                    <ul class="property-feature">
                                        <li> <i class="fas fa-bed"></i>
                                            <span>{{ $rproperty->bedrooms }} Bedrooms</span>
                                        </li>
                                        <li> <i class="fas fa-car"></i>
                                            <span>Garage {{ $rproperty->garage }}</span>
                                        </li>
                                    </ul>
                                    <div class="trending-bottom">
                                        <div class="trend-left float-left">
                                           <i class="lnr lnr-calendar-full"></i> {{ $rproperty->created_at->diffForHumans() }}</i>
                                        </div>
                                        <a class="trend-right float-right">
                                            <div class="trend-open">
                                                <p>Ksh. {{ $rproperty->price }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="trending-pagination"></div>
        </div>
    </div>
</div>

<!--Trending events starts-->
<div class="trending-places pt-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <p>Find rental properties anywhere</p>
                    <h2>Discover Popular Properties</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs list-details-tab">
                    <li class="nav-item active">
                        <a data-toggle="tab" href="#all_property">All Property</a>
                    </li>
                    <li class="nav-item ">
                        <a data-toggle="tab" href="#for_sale">For Sale</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#for_rent">For Rent</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content mt-30">
                    <div class="tab-pane fade show active" id="all_property">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_1.jpg') }}" alt="#">
                                        </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agent_min_1.jpg') }}" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href=".html" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="images/single-listing/property_view_1.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_2.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_3.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_4.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_5.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_6.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_7.jpg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Hartford</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>2854 Meadow View Drive, Hartford, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>4 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2142 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$25000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_3.jpg') }}" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agency_2.jpg') }}" alt="...">
                                                <span>Zilion Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Family home in Glasgow</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>60 High St, Glasgow, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1982 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_6.jpg') }}" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> New</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agent_min_2.jpg') }}" alt="...">
                                                <span>Bob Haris</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Video"><a href="https://www.youtube.com/watch?v=v_ATnE02qFs" class="property-yt"><i class="fas fa-play"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Apartment in Cecil Lake</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>131 midlas , Cecil Lake, BC</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1600 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$9000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="for_sale">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_4.jpg') }}" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agency_4.jpg') }}" alt="...">
                                                <span>Hexa Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Office Space in Thatcham</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>Colthrop Lane, Thatcham, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-home"></i>
                                                <span>6 Rooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1400 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$12000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_5.jpg') }}" alt="#">
                                        </a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agency_3.jpg') }}" alt="...">
                                                <span>Seaside Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href=".html" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="images/single-listing/property_view_1.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_2.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_3.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_4.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_5.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_6.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_7.jpg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Luxury Villa in Birmingham</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>159 Dudley Rd, Birmingham, UK</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>5 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>4 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>3000 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$21000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_1.jpg') }}" alt="#"></a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Sale</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agent_min_1.jpg') }}" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href=".html" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="images/single-listing/property_view_1.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_2.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_3.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_4.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_5.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_6.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_7.jpg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Hartford</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>2854 Meadow View Drive, Hartford, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>4 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2142 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p><span class="per_sale">starts from</span>$25000</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="for_rent">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_7.jpg') }}" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agency_1.jpg') }}" alt="...">
                                                <span>Carmen Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Villa on Sunbury</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>39 Casey Ave, Sunbury, VIC 3429</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>5 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>4 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>2048 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>2 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$9200<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_8.jpg') }}" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agent_min_1.jpg') }}" alt="...">
                                                <span>Tony Stark</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="Photos"><a href=".html" class="btn-gallery"><i class="lnr lnr-camera"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                            <div class="hidden photo-gallery">
                                                <a href="images/single-listing/property_view_1.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_2.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_3.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_4.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_5.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_6.jpg') }}"></a>
                                                <a href="images/single-listing/property_view_7.jpg') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Comfortable Family Apartment</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>4210 Khale Street, Florence, USA</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>2 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>2 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1500 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="single-listing-two.html"><img src="{{ asset('frontend/images/property/property_3.jpg') }}" alt="#"> </a>
                                        <ul class="feature_text">
                                            <li class="feature_or"><span>For Rent</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('frontend/images/agents/agency_2.jpg') }}" alt="...">
                                                <span>Zilion Properties</span>
                                            </a>
                                            <ul class="save-btn">
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Bookmark"><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                                <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Compare"><a href="#"><i class="fas fa-arrows-alt-h"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="single-listing-one.html">Family home in Glasgow</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>60 High St, Glasgow, London</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>3 Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-bath"></i>
                                                <span>3 Bath</span>
                                            </li>
                                            <li> <i class="fas fa-arrows-alt"></i>
                                                <span>1982 sq ft</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span>1 Garage</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <ul class="product-rating">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>$7500<span class="per_month">month</span> </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-1">
                <a href="tab-fullwidth.html" class="btn v9">Browse More</a>
            </div>
        </div>
    </div>
</div>
<!--Trending events ends-->
 <!--Value Calculator starts-->
 <div class="value-calculator-section py-80 mt-50 v1 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="value-img bg-h" style="background-image: url(/frontend/images/property/property_val.jpg)">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="value-content-wrap">
                    <div class="section-title v2">
                        <p>Get a property Valuation</p>
                        <h2>How much is my property worth?</h2>
                    </div>
                    <div class="value-content">
                        <p>The first step in selling your property is to get a valuation from local experts. They will inspect your home and take into account its unique features, the area and market conditions before providing you with the most accurate valuation.</p>
                        <div class="value-input-wrap">
                            <form action="#">
                                <input type="text" placeholder="Enter Your Property Address...">
                                <button type="submit">Price My Property</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Value Calculator ends-->

<!--Promo Section starts-->
<div class="promo-section mt-30 v2">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-12">
                <div class="promo-desc">
                    <div class="section-title v2">
                        <p>Lorem ipsum dolor sit.</p>
                        <h2>Why choose us</h2>
                    </div>
                    <div class="promo-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat, repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla quae alias tempora. </p>
                    </div>
                    <div class="row pt-5">
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-apartment"></i>
                                <h6 class="counter-value" data-from="0" data-to="10" data-speed="1500">
                                </h6>
                                <p>Years of experience</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-thumbs-up"></i>
                                <h6 class="counter-value" data-from="0" data-to="585" data-speed="1000">
                                </h6>
                                <p> Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="counter-text v2">
                                <i class="lnr lnr-user"></i>
                                <h6 class="counter-value" data-from="0" data-to="100" data-speed="1500">
                                </h6>
                                <p>Real estate Agent</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="promo-content-wrap">
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/pin.png') }}" alt="...">
                                <h4>Personalized Service.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/rent.png') }}" alt="...">
                                <h4>Financing made easy.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/customer_support.png') }}" alt="...">
                                <h4>24/7 support.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/deal.png') }}" alt="...">
                                <h4>Trusted by thousands.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquid cumque.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Promo Section ends-->
<!--Call to action starts-->
<div class="call-to-action bg-fixed bg-h mt-4 consult-form v1" style="background-image: url(/frontend/images/bg/call-to-action-bg.jpg)">
    <div class="overlay op-7"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 text-center">
                <div class="action-title sm-center">
                    <h2>Get a Free Consultation</h2>
                    <p>
                        With no pressure to commit and no money collected until we sell your home, why not schedule your
                        free consultation and let our expert knowledge and resources help you realize your goal of buying, renting or
                        selling a home.
                    </p>
                </div>
            </div>
        </div>
        <form action="{{ route('consultation') }}" method="POST">
            @csrf
            <div class="row consult-form">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control filter-input @error('name') is-invalid @enderror"
                         placeholder="Your name">
                        @error('name') <p class="text-danger"> {{ $message }} </p> @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control filter-input @error('name') is-invalid @enderror"
                        placeholder="Your mail">
                        @error('email') <p class="text-danger"> {{ $message }} </p> @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <input type="text" name="location" class="form-control filter-input @error('location') is-invalid @enderror"
                        placeholder="Your location">
                        @error('location') <p class="text-danger"> {{ $message }} </p> @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control filter-input @error('name') is-invalid @enderror"
                         placeholder="Your phone number">
                        @error('phone') <p class="text-danger"> {{ $message }} </p> @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="form-group">
                        <select name="need" class="listing-input hero__form-input form-control custom-select @error('location') is-invalid @enderror">
                            <option>Select your interest</option>
                            <option>Buy a property</option>
                            <option>Rent a property</option>
                            <option>Others </option>
                        </select>
                        @error('need') <p class="text-danger"> {{ $message }} </p> @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <button type="submit" class="btn v8">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                    <h2>Discover Our Properties</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs list-details-tab">
                    <li class="nav-item active">
                        <a data-toggle="tab" href="#all_property">All Property</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content mt-30">
                    <div class="tab-pane fade show active" id="all_property">
                        <div class="row">
                            @foreach($randomProperties as $randonP)
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="single-property-box">
                                    <div class="property-item">
                                        <a class="property-img" href="{{ route('property.detail', ['slug' => $randonP->slug]) }}">
                                            <img src="{{ asset('files/assets/real') }}/{{ $randonP->image }}" alt="{{ $randonP->name }}">
                                        </a>
                                        <ul class="feature_text">
                                            <li class="feature_cb"><span> Featured</span></li>
                                            <li class="feature_or"><span>For {{ $randonP->status }}</span></li>
                                        </ul>
                                        <div class="property-author-wrap">
                                            <a href="#" class="property-author">
                                                <img src="{{ asset('files/assets/real') }}/{{ $randonP->image }}" alt="{{ $randonP->name }}">
                                                <span>Admin</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="property-title-box">
                                        <h4><a href="{{ route('property.detail', ['slug' => $randonP->slug]) }}">{{ $randonP->name }}</a></h4>
                                        <div class="property-location">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <p>{{ $randonP->location->name }}</p>
                                        </div>
                                        <ul class="property-feature">
                                            <li> <i class="fas fa-bed"></i>
                                                <span>{{ $randonP->bedrooms }} Bedrooms</span>
                                            </li>
                                            <li> <i class="fas fa-car"></i>
                                                <span> Garage {{ $randonP->garage }}</span>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom">
                                            <div class="trend-left float-left">
                                                <i class="lnr lnr-calendar-full"></i> {{ $randonP->created_at->diffForHumans() }}</i>
                                            </div>
                                            <a class="trend-right float-right">
                                                <div class="trend-open">
                                                    <p>Ksh. {{ $randonP->price }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center mt-1">
                <a href="{{ route('property') }}" class="btn v9">Browse More</a>
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
                        <p>Sit Back and Relax</p>
                        <h2>Why choose us</h2>
                    </div>
                    <div class="promo-text">
                        <p>
                            We are a leader in the field. We implore modern technology to our processes to ensure that all aspects
                            of management done via our system are at their optimum best. Our processes employ a modern end-to-end security.
                            Our team of developers ensure that our clients data is always secure and unreachable by unauthorized personnel.
                        </p>

                        <p class="mt-2">
                            Not only do we guarantee safety and reliability, our system sees to it that clients yield the bes results and have
                            an easier time in management as opposed t older methods.
                        </p>
                    </div>
                    <div class="row pt-5">
                        <div class="col-sm-4 col-6">
                            <div class="counter-text v2">
                                <i class="lnr lnr-apartment"></i>
                                <h6 class="counter-value" data-from="0" data-to="4" data-speed="2500"></h6>
                                <p>Years of experience</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="counter-text v2">
                                <i class="lnr lnr-thumbs-up"></i>
                                <h6 class="counter-value" data-from="0" data-to="82" data-speed="2000">
                                </h6>
                                <p> Happy Customers</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="counter-text v2">
                                <i class="lnr lnr-user"></i>
                                <h6 class="counter-value" data-from="0" data-to="56" data-speed="2500">
                                </h6>
                                <p>Registered Real Estate Agents</p>
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
                                <img src="{{ asset('frontend/images/category/pin.png') }}" alt="service">
                                <h4>Personalized Service.</h4>
                                <p>We offer tailor made customized services based on user needs and user specifications.</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/rent.png') }}" alt="financing">
                                <h4>Financing made easy.</h4>
                                <p>Strain no more. No more middlemen and conmen. Get the right property with trust.</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/customer_support.png') }}" alt="support">
                                <h4>24/7 support.</h4>
                                <p>We are here to listen and support you. Do not hesitate to <a href="{{ route('contact') }}">reach out</a>.</p>
                            </div>
                            <div class="promo-content">
                                <img src="{{ asset('frontend/images/category/deal.png') }}" alt="trust">
                                <h4>Trusted by many.</h4>
                                <p>We keep our word. Our clients are satisfied and trust our system to serve them at all times with no failure.</p>
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

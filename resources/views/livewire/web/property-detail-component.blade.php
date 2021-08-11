@section('title')
    Property Detail
@endsection

<div class="property-details-wrap bg-cb">
    <!--Listing Details Hero starts-->
    <div class="single-property-header v1 bg-h mt-60" style="background-image: url(/frontend/images/single-listing/property_header_1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="list-details-title v1">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-12">
                                <div class="single-listing-title float-left">
                                    <h2>{{ $property->name }}<span class="btn v5">For {{ $property->status }}</span></h2>
                                    <p><i class="fa fa-map-marker-alt"></i> {{ $property->location->name }}</p>
                                    <a href="#" class="property-author">
                                        <img src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                        <span>Admin</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-12">
                                <div class="list-details-btn text-right sm-left">
                                    <div class="trend-open">
                                        <p><span class="per_sale">starts from</span>Ksh {{ $property->price }}</p>
                                    </div>
                                    <ul class="list-btn">
                                        <li class="share-btn">
                                            <a href="#" class="btn v2" data-toggle="tooltip" title="Share"><i class="fas fa-share-alt"></i></a>
                                            <ul class="social-share">
                                                <li class="bg-fb"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="bg-tt"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li class="bg-ig"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </li>
                                        <li class="print-btn">
                                            <a href="#" class="btn v2" data-toggle="tooltip" title="Print"><i class="lnr lnr-printer"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Listing Details Hero ends-->
    <!--Listing Details Info starts-->
    <div class="single-property-details v1 mt-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="listing-desc-wrap mr-30">
                        <div id="list-menu" class="list_menu">
                            <ul class="list-details-tab fixed_nav">
                                <li class="nav-item active"><a href="#description" class="active">Description</a></li>
                                <li class="nav-item"><a href="#gallery">Image</a></li>
                                <li class="nav-item"><a href="#details">Details</a></li>
                                <li class="nav-item"><a href="#nearby">Nearby</a></li>
                                <li class="nav-item"><a href="#book_tour">Book a Tour</a></li>
                            </ul>
                        </div>
                        <!--Listing Details starts-->
                        <div class="list-details-wrap">
                            <div id="description" class="list-details-section">
                                <h4>Property Brief</h4>
                                <div class="overview-content">
                                    <p class="mb-10">
                                        {{ $property->description }}
                                    </p>
                                    <p class="mb-10">
                                       {{ $property->description }}
                                    </p>
                                </div>
                                <div class="mt-40">
                                    <h4 class="list-subtitle">Location</h4>
                                    <ul class="listing-address">
                                        <li>Address : <span>{{ $property->precise_location }}</span></li>
                                        <li>State/county : <span>{{ $property->location->county }}</span></li>
                                        <li>Neighborhood : <span>{{ $property->known_neighborhood }}</span></li>
                                        <li>Zip/Postal Code : <span>{{ $property->location->zip }}</span></li>
                                        <li>Country : <span>{{ $property->location->country }}</span></li>
                                        <li>City : <span>{{ $property->location->name }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="gallery" class="list-details-section">
                                <h4>Property Image(s)</h4>
                                <!--Carousel Wrapper-->
                                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails list-gallery pt-2" data-ride="carousel">
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                        </div>
                                    </div>
                                    <!--Controls starts-->
                                    <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                        <span class="lnr lnr-arrow-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                        <span class="lnr lnr-arrow-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <!--Controls ends-->
                                </div>
                                <!--/.Carousel Wrapper-->
                            </div>

                            <div id="details" class="list-details-section">
                                <div class="mb-40">
                                    <h4>Property Details</h4>
                                    <ul class="property-info">
                                        <li>Property ID : <span>{{ $property->id }}</span></li>
                                        <li>Property Type : <span>{{ $property->property_type->name }}</span></li>
                                        <li>Property status : <span>{{ $property->status }}</span></li>
                                        <li>Property Price : <span>Ksh {{ $property->price }}</span></li>
                                        <li>Bedrooms: <span>{{ $property->bedrooms }}</span></li>
                                        <li>Garage: <span>{{ $property->garage }}</span></li>
                                        @php
                                            $date = $property->year_built;
                                            $timestamp = strtotime($date);
                                            $new_date = date("d-m-Y", $timestamp);
                                        @endphp
                                        <li>Year Built: <span>{{ $new_date }}</span></li>
                                    </ul>
                                </div>
                                <div class="mb-40">
                                    <h4>Amenities</h4>
                                    <ul class="listing-features">
                                        <li><i class="fas fa-basketball-ball"></i> basketball court</li>
                                        <li><i class="fas fa-smoking-ban"></i> No Smoking zone</li>
                                        <li><i class="fas fa-car-side"></i> Free Parking on premises</li>
                                        <li><i class="fas fa-fan"></i>Air Conditioned</li>
                                        <li><i class="fas fa-dumbbell"></i> Gym</li>
                                        <li><i class="fab fa-accessible-icon"></i> Wheelchair Friendly</li>
                                        <li><i class="fas fa-swimmer"></i>Swimming Pool </li>
                                        <li><i class="fas fa-paw"></i>Pet Friendly </li>
                                        <li><i class="fas fa-dumpster"></i>washer and dryer </li>
                                        <li><i class="fas fa-tv"></i>Home Theater</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4>Property Documents</h4>
                                    <ul class="listing-features pp_docs">
                                        <li><a target="_blank" href="images/property-file/demo.docx"><i class="lnr lnr-file-empty"></i>Sample Property Document </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="nearby" class="list-details-section">
                                <div class="container no-pad-lr">
                                    <h4>What's Nearby?</h4>
                                    <div class="nearby-wrap pt-2">
                                        <h4><span><i class="fas fa-church"></i></span>Religious Institution</h4>
                                        <div class="row align-items-center">
                                            <div class="col-md-6 col-6">
                                                <p class="nearby-place">{{ $property->church }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nearby-wrap">
                                        <h4><span><i class="fas fa-university"></i></span>Education</h4>
                                        <div class="row align-items-center">
                                            <div class="col-md-6 col-7">
                                                <p class="nearby-place">{{ $property->school }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nearby-wrap">
                                        <h4><span><i class="fas fa-medkit"></i></span>Medical Institution</h4>
                                        <div class="row align-items-center">
                                            <div class="col-md-6 col-7">
                                                <p class="nearby-place">{{ $property->medical }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="book_tour" class="list-details-section">
                                <h4 class="list-details-title">Schedule a Tour</h4>
                                <form class="tour-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="datepicker-from" class="input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" placeholder="Tour Date">
                                                <span class="input-group-addon"><i class="lnr lnr-calendar-full"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="listing-input hero__form-input  form-control custom-select">
                                                <option>Tour Time</option>
                                                <option>9.00 am</option>
                                                <option>10.00 am</option>
                                                <option>12.00 pm</option>
                                                <option>2.00 pm</option>
                                                <option>4.15 pm</option>
                                                <option>5.30 pm</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control filter-input" placeholder="Your name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control filter-input" placeholder="Your Phone" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control filter-input" placeholder="Your email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="contact-form__textarea mb-25" name="comment" id="comment" placeholder="Your Message" required></textarea>
                                            <input class="btn v3" type="submit" name="submit-contact" id="submit_contact" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div id="list-sidebar" class="listing-sidebar">
                        <div class="widget">
                            <h3 class="widget-title">Recently Added</h3>
                            @foreach ($rproperties as $rproperty)
                                <li class="row recent-list">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="{{ asset('files/assets/real') }}/{{ $rproperty->image }}" alt="{{ $rproperty->name }}">
                                            <span>New</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8 no-pad-left">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="{{ route('property.detail',['slug'=>$rproperty->slug]) }}">{{ $rproperty->name }}</a></h4>
                                            <div class="property-location">
                                                <i class="fa fa-map-marker-alt"></i>
                                                <p>{{ $rproperty->location->name }}</p>
                                            </div>
                                            <div class="trend-open">
                                                <p>Ksh {{ $rproperty->price }}</p>
                                                <p class="list-date float-end ml-3"><i class="lnr lnr-calendar-full"></i> {{ $rproperty->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </div>
                        <div class="widget">
                            <h3 class="widget-title">Featured Property</h3>
                            <div class="swiper-container single-featured-list">
                                <div class="swiper-wrapper">
                                    @foreach ($fproperties as $fproperty)
                                        <div class="swiper-slide single-property-box">
                                            <div class="property-item">
                                                <a class="property-img" href="{{ route('property.detail',['slug'=>$fproperty->slug]) }}">
                                                    <img src="{{ asset('files/assets/real') }}/{{ $fproperty->image }}" alt="{{ $fproperty->name }}">
                                                </a>
                                                <ul class="feature_text">
                                                    <li class="feature_cb"><span> Featured</span></li>
                                                    <li class="feature_or"><span>For {{ $fproperty->status }}</span></li>
                                                </ul>
                                                <div class="property-author-wrap">
                                                    <h4><a href="{{ route('property.detail',['slug'=>$fproperty->slug]) }}" class="property-author">
                                                            {{ $fproperty->name }}
                                                        </a>
                                                    </h4>
                                                    <div class="featured-price">
                                                        <p><span class="per_sale">starts from</span>Ksh {{ $fproperty->price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slider-btn v3 single-featured-next"><i class="lnr lnr-arrow-right"></i></div>
                                <div class="slider-btn v3 single-featured-prev"><i class="lnr lnr-arrow-left"></i></div>
                            </div>
                        </div>
                        <div class="widget mortgage-widget">
                            <h3 class="widget-title">Property Mortgage</h3>
                            <form action="#" method="GET" enctype="multipart/form-data">
                                <div class="mortgage-group">
                                    <span class="mortgage-icon">$</span>
                                    <input class="mortgage-field" type="text" name="amount-one" id="amount-one" placeholder="Total Amount">
                                </div>
                                <div class="mortgage-group">
                                    <span class="mortgage-icon">$</span>
                                    <input class="mortgage-field" type="text" name="amount-two" id="amount-two" placeholder="Down Payment">
                                </div>
                                <div class="mortgage-group">
                                    <span class="mortgage-icon">$</span>
                                    <input class="mortgage-field" type="text" name="amount-three" id="amount-three" placeholder="Loan Terms(Years)">
                                </div>
                                <div class="mortgage-group">
                                    <span class="mortgage-icon">%</span>
                                    <input class="mortgage-field" type="text" name="amount-four" id="amount-four" placeholder="Total Amount">
                                </div>
                                <div class="mortgage-btn">
                                    <button type="submit" data-toggle="modal" data-target="#mortgage_result">Calculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Listing Details Info ends-->
    <!--Similar Listing starts-->
    <div class="similar-listing-wrap pb-70 mt-70">
        <div class="container">
            <div class="col-md-12 px-0">
                <div class="similar-listing">
                    <div class="section-title v2">
                        <h2>Listings for Rent</h2>
                    </div>
                    <div class="swiper-container similar-list-wrap">
                        <div class="swiper-wrapper">
                            @foreach ($sproperties as $sproperty)
                                <div class="swiper-slide">
                                    <div class="single-property-box">
                                        <div class="property-item">
                                            <a class="property-img" href="single-listing-two.html"><img src="{{ asset('files/assets/real') }}/{{ $sproperty->image }}" alt="#"> </a>
                                            <ul class="feature_text">
                                                <li class="feature_or"><span>For {{ $sproperty->status }}</span></li>
                                            </ul>
                                            <div class="property-author-wrap">
                                                <a href="#" class="property-author">
                                                    <img src="{{ asset('files/assets/real') }}/{{ $sproperty->image }}" alt="{{ $sproperty->name }}">
                                                    <span>Admin</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="property-title-box">
                                        <h4><a href="{{ route('property.detail',['slug'=>$sproperty->slug]) }}">{{ $sproperty->name }}</a></h4>
                                            <div class="property-location">
                                                <i class="fa fa-map-marker-alt"></i>
                                                <p>{{ $sproperty->location->name }}</p>
                                            </div>
                                            <ul class="property-feature">
                                                <li> <i class="fas fa-bed"></i>
                                                    <span>{{ $sproperty->bedrooms }} Bedrooms</span>
                                                </li>
                                                <li> <i class="fas fa-car"></i>
                                                    <span>Garage {{ $sproperty->garage }}</span>
                                                </li>
                                            </ul>
                                            <div class="trending-bottom">
                                                <div class="trend-left float-left">
                                                    <p class="list-date"><i class="lnr lnr-calendar-full"></i> {{ $property->created_at->diffForHumans() }}</p>
                                                </div>
                                                <a class="trend-right float-right">
                                                    <div class="trend-open">
                                                        <p>Ksh. {{ $sproperty->price }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="slider-btn v2 similar-next"><i class="lnr lnr-arrow-right"></i></div>
                    <div class="slider-btn v2 similar-prev"><i class="lnr lnr-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!--Similar Listing ends-->
</div>
<!--Agent Chat box starts-->
<div class="chatbox-wrapper">
    <div class="chat-popup chat-bounce" data-toggle="tooltip" title="Have any query? Ask Me !" data-placement="top">
        <i class="fas fa-comment-alt"></i>
    </div>
    <div class="agent-chat-form v1">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img class="agency-chat-img" src="{{ asset('frontend/images/agents/agent_min_1.jpg') }}" alt="...">
                </div>
                <div class="col-8 pl-0">
                    <ul class="agent-chat-info">
                        <li><i class="fas fa-user"></i>Tony Stark</li>
                        <li><i class="fas fa-phone-alt"></i>+440 3456 345</li>
                        <li><a href="single-agent.html">View Listings</a></li>
                    </ul>
                    <span class="chat-close"><i class="lnr lnr-cross"></i></span>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-12">
                    <form action="#" method="POST">
                        <div class="chat-group mt-1">
                            <input class="chat-field" type="text" name="chat-name" id="chat-name" placeholder="Your name">
                        </div>
                        <div class="chat-group mt-1">
                            <input class="chat-field" type="text" name="chat-phone" id="chat-phone" placeholder="Phone">
                        </div>
                        <div class="chat-group mt-1">
                            <input class="chat-field" type="text" name="chat-email" id="chat-email" placeholder="Email">
                        </div>
                        <div class="chat-group mt-1">
                            <textarea class="form-control chat-msg" name="message" rows="4" placeholder="Description">Hello, I am interested in [Luxury apartment bay view]</textarea>
                        </div>
                        <div class="chat-button mt-3">
                            <a class="chat-btn" data-toggle="modal" data-target="#mortgage_result">Send Message</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

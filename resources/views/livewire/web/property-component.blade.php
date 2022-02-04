@section('title')
    Our Property
@endsection

<div class="breadcrumb-section bg-h" style="background-image: url(/frontend/images/breadcrumb/breadcrumb_1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="breadcrumb-menu">
                    <h2>Property Listing</h2>
                    <span><a href="/">Home</a></span>
                    <span>Our Properties</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="filter-wrapper style1 section-padding">
    <div class="container">
        <div class="row">
            <!--Listing filter starts-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="hero__form v1 filter listing-filter property-filter">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                                    <div class="input-search">
                                        <input type="text" name="place-event" id="place-event" placeholder="Enter Property, Location, Landmark ...">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 py-3 pl-30 pr-0">
                                    <div class="submit_btn">
                                        <button class="btn v3" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Listing filter ends-->
            <div class="col-md-12">
                <div class="row pt-60   align-items-center">
                    <div class="col-lg-3 col-sm-5 col-5">
                        <div class="item-view-mode res-box">
                            <!-- item-filter-list Menu starts -->
                            <ul class="nav item-filter-list" role="tablist">
                                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fas fa-th"></i></a></li>
                                <li><a  data-toggle="tab" href="#list-view"><i class="fas fa-list"></i></a></li>
                            </ul>
                            <!-- item-filter-list Menu ends -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-7 col-7">
                        <select class="listing-input hero__form-input  form-control custom-select">
                            <option>Sort by Newest</option>
                            <option>Sort by Oldest</option>
                            <option>Sort by Featured</option>
                            <option>Sort by Price(Low to High)</option>
                            <option>Sort by Price(Low to High)</option>
                        </select>
                    </div>
                </div>
                <div class="item-wrapper pt-40   ">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane  show active  fade property-grid" id="grid-view">
                            <div class="row">
                                @foreach ($properties as $property)
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <div class="single-property-box">
                                            <div class="property-item">
                                                <a class="property-img" href="{{ route('property.detail',['slug'=>$property->slug]) }}">
                                                    <img src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                                </a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For {{ $property->status }}</span></li>
                                                </ul>
                                                <div class="property-author-wrap">
                                                    <a href="#" class="property-author">
                                                        <img src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                                        <span>{{ $property->landlord}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-title-box">
                                                <h4><a href="{{ route('property.detail',['slug'=>$property->slug]) }}">{{ $property->name }}</a></h4>
                                                <div class="property-location">
                                                    <i class="fa fa-map-marker-alt"></i>
                                                    <p>{{ $property->location->name }}</p>
                                                </div>
                                                <ul class="property-feature">
                                                    <li> <i class="fas fa-bed"></i>
                                                        <span>{{ $property->bedrooms }} Bedrooms</span>
                                                    </li>
                                                    <li> <i class="fas fa-car"></i>
                                                        <span>Garage {{ $property->garage }}</span>
                                                    </li>
                                                </ul>
                                                <div class="trending-bottom">
                                                    <div class="trend-left float-left">
                                                        <p class="list-date"><i class="lnr lnr-calendar-full"></i> {{ $property->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <a class="trend-right float-right">
                                                        <div class="trend-open">
                                                            <p><span class="per_sale">starts from</span>Ksh. {{ $property->price }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade property-list fullwidth" id="list-view">
                            @foreach ($properties as $property)
                                <div class="single-property-box">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-4 col-md-12">
                                            <div class="property-item">
                                                <a class="property-img" href="{{ route('property.detail',['slug'=>$property->slug]) }}">
                                                    <img src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                                </a>
                                                <ul class="feature_text">
                                                    <li class="feature_or"><span>For {{ $property->status }}</span></li>
                                                </ul>
                                                <div class="property-author-wrap">
                                                    <a href="#" class="property-author">
                                                      <img src="{{ asset('files/assets/real') }}/{{ $property->image }}" alt="{{ $property->name }}">
                                                        <span>{{ $property->landlord }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 col-md-12">
                                            <div class="property-title-box">
                                                <h4><a href="{{ route('property.detail',['slug'=>$property->slug]) }}">{{ $property->name }}</a></h4>
                                                <div class="property-location">
                                                    <i class="fa fa-map-marker-alt"></i>
                                                    <p>{{ $property->location->name }}</p>
                                                </div>
                                                <ul class="property-feature">
                                                    <li> <i class="fas fa-bed"></i>
                                                        <span>{{ $property->bedrooms }} Bedrooms</span>
                                                    </li>
                                                    <li> <i class="fas fa-car"></i>
                                                        <span>Garage {{ $property->garage }}</span>
                                                    </li>
                                                </ul>
                                                <div class="trending-bottom">
                                                    <div class="trend-left float-left">
                                                        <p class="list-date"><i class="lnr lnr-calendar-full"></i>{{ $property->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12">
                                            <div class="row list-extra">
                                                <div class="col-md-12 col-7 sm-left">
                                                    <div class="trend-open">
                                                        <p><span class="per_sale">starts from</span>Ksh. {{ $property->price }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-5">
                                                    <a href="$" class="btn v7">Schedule a tour</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

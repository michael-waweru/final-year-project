@section('title')
    About Us
@endsection

<div class="breadcrumb-section bg-h" style="background-image: url(/frontend/images/breadcrumb/breadcrumb_1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="breadcrumb-menu">
                    <h2>About us</h2>
                    <span><a href="{{ route('homepage') }}">Home</a></span>
                    <span>About us</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-section  pt-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="testimonial-video" style="background-image: url(/frontend/images/bg/about.jpg)">
                    <div class="overlay op-3"></div>
                    <div class="testimonial-btn">
                        <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                {{-- <div class="section-title v3">
                    <p>Sit Back and Relax.</p>
                    <h2>We'll help you to find a place that you'll love.</h2>
                </div> --}}
                <div class="about-text res-box">
                   <span>All You Need in Just One Place</span>
                    <h2>We’ve made a life that will change you</h2>
                    <p>
                        We are a modern company in Kenya. Our area expertise range from modernizing and digitizing the entire house
                        seeking process whilst transforming the management processes seamlessly. We have a team of highly competent
                        professionals that guide clients to find solutions that best suit their needs.
                    </p>

                    <p class="mt-2">
                        With over three years of experience, we have managed to transform over 50 different landlords all over Kenya and
                        migrated their operations to digital centralized management. We have also worked with various property agents and
                        brokers to incorporate our modern tech to their day to day operations.
                    </p>
                    <p class="mt-2">
                        Be sure to give us a ring to schedule a walk through or placement if you are seeking for residency. You can also
                        visit our <a href="{{ route('property') }}">properties </a>page to explore our properties for sale and rent.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="promo-section pt-120 v2">
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

<div class="hero-client-section pt-130">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title v1">
                    <p>Lorem ipsum dolor.</p>
                    <h2>Hear from our clients</h2>
                </div>
            </div>
            <div class="col-md-12 mb-70">
                <div class="testimonial-wrapper swiper-container ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/frontend/images/testimonial/testimonial-2.jpg)">
                                            <div class="overlay op-2"></div>
                                            <div class="testimonial-btn">
                                                <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Smith &amp; Sarah Williamson</h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/frontend/images/testimonial/testimonial-5.jpg)">

                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Bob &amp; Ana Franklin </h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial-item">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="testimonial-video" style="background-image: url(/frontend/images/testimonial/testimonial-7.jpg)">
                                            <div class="overlay op-3"></div>
                                            <div class="testimonial-btn">
                                                <a href="https://www.youtube.com/watch?v=EFB33r7u4tY" class="property-yt hvr-ripple-out"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-quote">
                                        <h4>Jhon &amp; Ketty Doe</h4>
                                        <span>North Carolina, USA</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, dignissimos, delectus? Molestias a deleniti quam quas, ex, expedita necessitatibus quis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="client-btn-wrap">
                    <div class="client-prev"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="client-next"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="partner-section style1 pb-130 pt-90 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title v1">
                    <h2>Our Partners</h2>
                </div>
            </div>
            <div class="col-md-12">
              <div class="swiper-container partner-wrap">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_7.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_3.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_8.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_2.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_1.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_4.jpg') }}" alt="...">
                        </div>
                        <div class="swiper-slide single-partner">
                            <img src="{{ asset('frontend/images/partners/partner_9.jpg') }}" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

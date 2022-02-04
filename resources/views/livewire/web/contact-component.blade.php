@section('title')
    Contact Us
@endsection

<div class="breadcrumb-section bg-h" style="background-image: url(/frontend/images/breadcrumb/breadcrumb_1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="breadcrumb-menu">
                    <h2>Contact us</h2>
                    <span><a href="/">Home</a></span>
                    <span>Contact us</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-info section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Corporate Office</h4>
                    <p>Wa-wahu Hunters Area, Suite 315
                        Kasarani, NBI</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-item">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Direct Contact</h4>
                    <p><strong>Phone : </strong> <a href="tel:+254713672772"> +254 713 672 772 </a> </p>
                    <p><strong>Email : </strong> <a href="mailto:info@westpoint.com">info@westpoint.com </a> </p>
                    <p><strong>Website : </strong> <a href="/">westpoint.com</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-item">
                    <i class="fas fa-business-time"></i>
                    <h4>Business Hours</h4>
                    <p><strong>Sunday : </strong> Closed</p>
                    <p><strong>Monday-Friday : </strong>9AM - 5PM</p>
                    <p><strong>Saturday : </strong>10AM - 3PM</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-section v1 mt-10 mb-120">
    <div class="container">
        <div class="contact-map v1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.909251531742!2d36.92157541418998!3d-1.223116135904128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f151830fd08d3%3A0x2a57ed58349c720!2swa%20wahu%20plaza!5e0!3m2!1sen!2ske!4v1627363673388!5m2!1sen!2ske" width="650" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="row">
            <div class="col-lg-5 offset-lg-6 col-md-12">
                <div class="section-title v2">
                    <h2>Write to us</h2>
                </div>
                <form wire:submit.prevent="storeMessage">
                    @csrf
                    <div class="form-control-wrap mt-4">
                        <div class="form-group">
                            <input name="name"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name*" wire:model="name">
                            @error('name') <p class="text-danger"> {{ $message }} </p> @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Enter Email*" value="{{ old('email') }}" wire:model="email">
                            @error('email') <p class="text-danger"> {{ $message }} </p> @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="8" placeholder="Your Message"></textarea>
                            @error('message') <p class="text-danger"> {{ $message }} </p> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn v7">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

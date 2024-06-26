@extends('layouts.app')
@section('content')
 

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section mt-5 text-white">CONTACT US</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 mb-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text">
                                <p class="text-white"><span>Address:</span> {{ $con->address }}</p>
                              </div>
                          </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="text">
                                <p class="text-white"><span>Phone:</span> <a href="tel://{{ $con->phone1 }}">{{ $con->phone1 }}</a><br/>
                                    <a href="tel://{{ $con->phone2 }}">{{ $con->phone2 }}</a></p>
                              </div>
                          </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-paper-plane"></span>
                                </div>
                                <div class="text">
                                <p class="text-white"><span>Email:</span> <a href="mailto:{{ $con->email }}">{{ $con->email }}</a></p>
                              </div>
                          </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact-wrap">
                                <h3 class="mb-4 text-center">Get in touch with us</h3>
                                <div id="form-message-warning" class="mb-4 w-100 text-center"></div> 
                          <div id="form-message-success" class="mb-4 w-100 text-center">
                        Your message was sent, thank you!
                          </div>
                                <form method="get" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 @push('scripts')
 

 @endpush
@endsection
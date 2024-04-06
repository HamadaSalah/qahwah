@extends('layouts.app')
@section('content')
 
<div class="googlemaps" style="text-align: center;">
    <div class="container">
        <div class="row">
            <h1 class="mt-5 mb-5 text-white">OUR LOCATION ON MAPS</h1>
            <div class="locc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6907.461482627155!2d31.202700486140646!3d30.044581729714924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145841349d5ddfdf%3A0x26c53305f6f4db22!2sShooting%20Club%20Dokki!5e0!3m2!1sen!2seg!4v1712339584248!5m2!1sen!2seg" width="100%" height="600" style="border:0;border-radius: 25px;" allowfullscreen="" loading="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
   </div>
 
 @push('scripts')
 

 @endpush
@endsection
@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Edit Slider </h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('slider.update', $slider->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Head (AR)</label>
        <input type="name" class="form-control" id="name" name="head"  placeholder="Write Head.." required value="{{$slider->head}}">
    </div>
    {{-- <div class="form-group">
        <label for="name">Description</label>
        <input type="name" class="form-control" id="name" name="desc"  placeholder="Write description.." required  value="{{$slider->desc}}">
    </div> --}}

    <div class="form-group">
        <label for="img">IMG</label>
        <input type="file" class="form-control" id="img" name="img"  placeholder="Write Body..">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection

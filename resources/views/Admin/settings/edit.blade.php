
@extends('Admin.master')
@section('content')
<form method="POST" action="{{route('settings.store')}}" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label for="name">Footer Description</label>
		<input type="text" class="form-control" name="footer_desc" id="name" value="{{$settings->footer_desc}}" >
	</div>
	<div class="form-group">
		<label for="name">About Head</label>
		<input type="text" class="form-control" name="about_head" id="name" value="{{$settings->about_head}}" >
	</div>
	<div class="form-group">
		<label for="about_p1">About Paragraph One</label>
		<input type="text" class="form-control" name="about_p1" id="about_p1" value="{{$settings->about_p1}}" >
	</div>
	<div class="form-group">
		<label for="about_p2">About Paragraph Two</label>
		<input type="text" class="form-control" name="about_p2" id="about_p2" value="{{$settings->about_p2}}" >
	</div>
	<div class="form-group">
		<label for="fb">Facebook</label>
		<input type="text" class="form-control" name="fb" id="fb" value="{{$settings->fb}}" >
	</div>
	<div class="form-group">
		<label for="tw">Twitter</label>
		<input type="text" class="form-control" name="tw" id="tw" value="{{$settings->tw}}" >
	</div>
	<div class="form-group">
		<label for="ins">Instagram</label>
		<input type="text" class="form-control" name="ins" id="ins" value="{{$settings->ins}}" >
	</div>
	<div class="form-group">
		<label for="address">Address</label>
		<input type="text" class="form-control" name="address" id="address" value="{{$settings->address}}" >
	</div>
	<div class="form-group">
		<label for="phone1">Phone 1</label>
		<input type="text" class="form-control" name="phone1" id="phone1" value="{{$settings->phone1}}" >
	</div>
	<div class="form-group">
		<label for="phone2">Phone 2</label>
		<input type="text" class="form-control" name="phone2" id="phone2" value="{{$settings->phone2}}" >
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="email" id="email" value="{{$settings->email}}" >
	</div>
    <div class="form-group">
    <button class="btn btn-primary">Update Data</button>
    </div>
@endsection
@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush

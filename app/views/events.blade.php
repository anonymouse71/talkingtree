@extends('layouts.calendarm')

@section('title')
  <link rel="stylesheet" type="text/css" href="/assets/css/pages/events.css">
@stop

@section('content')

<div class= "row">
	<div class= "col-sm-4">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=events%2C%20timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&hide_cta=true&show_facepile=false&appId" width="500" height="700" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
	<div class= "col-sm-2">&nbsp;</div>
	<div class= "col-sm-4">
		  <!-- div to hold Google map -->
    	<div id="map-canvas"></div>
	</div>
	<div class= "col-sm-2">&nbsp;</div>
</div>
@stop

@section('bottom-script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRbQFZw1KmV6RQmeMTDQi40tAjMKuP84E"></script>
    <script type="text/javascript" src="/assets/js/events.js"></script>
@stop
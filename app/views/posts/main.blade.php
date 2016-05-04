@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Education and Training!</title>

@stop

@section('content')
<div class="container">
@if (Auth::check()&& Auth::user()->isAdmin())
<a href="{{{action('PostsController@create')}}}" class="btn btn-info" role="button">Create New Posts</a>
@endif
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{{ action('PostsController@index') }}}?category_id=1">Composting</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=2">General Farming</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=3">Experiments</a></li>
    <li><a href="{{{ action('PostsController@index') }}}">All</a></li>
  </ul>
</div>
<hr>
<div class="text-center">
@foreach ($posts as $post)
 <a href="{{{ action('PostsController@show', $post->id) }}}"><img src="{{{$post->image}}}" alt="" width="300" height="300"></a>
@endforeach








</div>
</div>

@stop


@section('bottom-script')

@stop

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <div type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'wordplate') !!}
    </div>

    {!! get_search_form(false) !!}
  @endif
@endsection

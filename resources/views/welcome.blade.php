@extends('base')

@section('content')
	<a href="fr">fr</a> | <a href="en">en</a>
	<br />
    <div class="title">{{ trans('contact.welcome') }}</div>
    <br />
    {!! link_to_route('contact_show', trans('leave feedback'), ['locale' => App::getLocale()]) !!}
    <br />
@endsection
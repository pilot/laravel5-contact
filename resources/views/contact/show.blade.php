@extends('base')

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif

    <h1>{{ trans('contact.contact_us') }}</h1>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open(array('route' => 'contact_send', 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label(Lang::get('first name')) !!}
        {!! Form::text('firstname', null, array('required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(Lang::get('last name')) !!}
        {!! Form::text('lastname', null, array('required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(Lang::get('email')) !!}
        {!! Form::text('email', null, array('required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(Lang::get('photo')) !!}
        {!! Form::file('image', null, array('required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(Lang::get('message')) !!}
        {!! Form::textarea('message', null, array('required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit(Lang::get('send'), array('class' => 'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}

@endsection
@extends('layouts.master')

@section('about')
    active
@endsection
@section('content')
    <div class="container">
    <div class="row nospace" id="about-description">
        <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12" id="about-description-left">
            <p><h1 style="letter-spacing:1px; font-size:40px;">Our Philosophy</h1></p>
            <br/>
            <p style="text-align: justify;">Our process is designed to incorporate the client ’ s needs,
                concerns and ideas. We work closely with our clients throughout
                the process in order to meet their goals and express their ideas
                within the design.
            </p><br/>
            <p style="text-align: justify;">It is our belief that a properly planned landscape project can be
                both aesthetically pleasing as well as fully functional. We
                welcome the challenge of combining the client ’ s desires with
                the unique characteristics of each space and the natura
                surroundings of the area.
            </p>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12" id="about-description-right">
            <img src="https://cbsla.files.wordpress.com/2012/08/makeupstore_stor.jpg" class="img-responsive" style="border-radius:15px;">
        </div>
    </div>
    </div>
@endsection

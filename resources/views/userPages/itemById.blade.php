@extends('layouts.master')

@section('shopNow')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row nospace" style="padding-top: 50px; padding-bottom: 50px; letter-spacing: 1px;">

            @foreach($item as $item)
            <div class="col-md-8 col-md-offset-2 ">
                <h1>{{$item->name}}</h1>
            </div>

        </div>

        <div class="row nospace">
            <div class="col-md-4 text-center col-xs-12" style="margin-bottom: 10px;">
                <img src="{{$item->img_link}}" alt="Pure Anada Natural Mascara" class="responsive-img  img-thumbnail">
            </div>
            <div class="col-md-8">
                <h4>
                    <strong>Brand:</strong>
                    {{$item->brand}}
                </h4>


                <h4>
                    <strong>Price:</strong>
                    ${{$item->price}}
                </h4>

                <h4>
                    <strong>Star rating:</strong>
                    <i class="fa fa-star" aria-hidden="true"></i> {{$item->rate}}
                </h4>

                <form method="post" action="/addToCard/order-now">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="item_id"  value="{{$item->id}}">
                    {{--<input type="hidden" name="item_id"  value="{{$item->id}}">--}}
                    <button type="submit" class="btn btn-danger">Add to Card</button>
                </form>
                <hr>
                <p style="text-align: justify; font-size: 18px;">
                    <strong>Description:</strong>
                    {{$item->description}}
                </p>
            </div>
            @endforeach

        </div>
    </div>

    @endsection




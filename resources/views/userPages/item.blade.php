@extends('layouts.master')

@section('shopNow')
    active
@endsection

@section('content')
        <div class="container">
            <div class="row nospace" style="padding-top: 50px;">
                <form method="get" action="/search/getInBetweenPrice">
                    {{ csrf_field() }}
                    <div class="col-sm-1 col-sm-offset-3 col-xs-2 ">
                        <label style="padding-top: 5px; font-size: 17px; letter-spacing: 1px; float: right;">Price</label>
                    </div>
                    <div class="col-sm-2 col-xs-3">
                        <input type="text" name="min" class="form-control" placeholder="minimum Price..." value="{{  isset($min) ? $min: '' }}">
                    </div>
                    <div class="col-sm-2 col-xs-3">
                        <input type="text" name="max" class="form-control" placeholder="maximum Price..." value="{{  isset($max) ? $max: '' }}">
                    </div>
                    <div class="col-sm-1 col-xs-2">
                        <button type="submit" class="btn btn-default">Go !</button>
                    </div>
                </form>


            </div>
        </div>

        <div class="row nospace" style="padding-top: 50px;">
            <div class="col-md-8 col-md-offset-2">
                @foreach($items as $item)

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body" style="height: 280px;">
                                <div class="col-xs-6">
                                    <img class="img-responsive" src="{{$item->img_link}}"/>
                                </div>
                                <div class="col-xs-6">
                                    <h3>{{$item->brand}}</h3>
                                    <h4>{{$item->name}}</h4>
                                    <p>${{$item->price}}</p>
                                    <p><strong>Category: </strong>{{$item->category->name}}</p>
                                    <i class="fa fa-star" aria-hidden="true"></i> 5.0
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pull-right">
                                        @if(Auth::user()->status==0)
                                            <a href="product_delete/{{$item->id}}" class="btn btn-danger pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a href="edit_product/{{$item->id}}" class="btn btn-default pull-right"><i class="fa fa-pencil"></i></a>
                                        @else
                                            <a href="see_item/{{$item->id}}" class="btn btn-danger  pull-right">View more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                         @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="container">
            <div class="row nospace">
                <div class="col-md-2 col-md-offset-5">
                    {{ $item->paginate(4) }}
                </div>
        </div>

        </div>

@endsection
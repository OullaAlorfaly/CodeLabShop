@extends('layouts.master')
@section('content')

        <div class="row nospace" style="padding-top: 50px; padding-bottom: 50px;">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center">Order ID</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Item Description</th>
                        <th class="text-center">Item Price</th>
                        <th class="text-center">Item Image</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </tr>

                    @foreach($orders as $order)
                        @foreach($order->items as $item)
                            <tr>
                                <td class="text-center">{{$order->id}}</td>
                                <td class="text-center">{{$order->user->id}}</td>
                                <td class="text-center">{{$order->user->full_name}}</td>
                                <td class="text-center">{{$item->name}}</td>
                                <td class="text-center">{{$item->description}}</td>
                                <td class="text-center">{{$item->price}}</td>
                                <td class="text-center"> <img class="img-responsive" src="{{$item->img_link}}"/></td>
                                <td class="text-center">
                                    <a href="/order/delete/{{$order->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>

    @endsection
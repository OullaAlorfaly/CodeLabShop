@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row nospace">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>

                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$user->count()}}</div>
                                <div>Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="/dashboard/user">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$item->count()}}</div>
                                <div>Items</div>
                            </div>
                        </div>
                    </div>
                    <a href="/dashboard/item">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tags fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$category->count()}}</div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="/dashboard/category">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    <div class="row nospace" style="padding-top: 40px;">
                    <div class="row nospace">
                        <div class="col col-sm-3">
                            <h1 style="padding-left: 15px;">Latest Orders</h1>
                        </div>

                    </div>
                </div>

                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="text-center">#</th>
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
                                    <td class="text-center"> <img class="img-responsive" width="100px" height="100px" src="{{$item->img_link}}"/></td>
                                    <td class="text-center">
                                        <a href="dashboard/order_delete/{{$order->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </table>

                </div>



    <!-- /.row -->
    @endsection
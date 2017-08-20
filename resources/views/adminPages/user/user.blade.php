@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-top: 50px;">
            <div class="col-md-10 col-md-offset-1  col-sm-12 col-xs-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Phone Number</th>
                        {{--<th class="text-center">Grade In String</th>--}}
                        <th class="text-center">Address</th>
                        <th class="text-center">Orders</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->first_name}}</td>
                            <td class="text-center">{{$user->last_name}}</td>
                            <td class="text-center">{{$user->full_name}}</td>
                            <td class="text-center">{{$user->phone_number}}</td>
                            <td class="text-center">{{$user->address}}</td>
                            <th class="text-center">
                                <a href="userOrders/{{$user->id}}" class="btn btn-success pull-right">Orders</a>
                            </th>
                            <th class="text-center">
                                {{--<a href="edit_customer/{{$user->id}}" class="btn btn-default pull-left">Edit</a>--}}
                                <a href="delete/{{$user->id}}" class="btn btn-danger pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </th>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>

    </div>




@endsection
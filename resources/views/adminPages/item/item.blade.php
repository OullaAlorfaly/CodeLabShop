@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="row nospace" style="padding-top: 50px;">
                <div class="col-md-10 col-md-offset-1  col-sm-12 col-xs-12">

                         <div class="col col-md-12 nospace">
                              <p class="pull-left nospace" style="font-size: 24px;">Latest Items</p>
                             <a href="/dashboard/add_item" class="btn btn-sm btn-primary pull-right">Create New Item</a>
                         </div>



                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Item Brand</th>
                                    <th class="text-center">Item Name</th>
                                    {{--<th class="text-center">Item Description</th>--}}
                                    <th class="text-center">Item Price</th>
                                    <th class="text-center">Item Rating</th>
                                    <th class="text-center">Item Image</th>
                                    <th class="text-center"><i class="fa fa-cog"></i></th>
                                </tr>

                                @foreach($items as $item)
                                        <tr>
                                            <td class="text-center">{{$item->id}}</td>
                                            <td class="text-center">{{$item->brand}}</td>
                                            <td class="text-center">{{$item->name}}</td>
                                            {{--<td class="text-center">{{$item->description}}</td>--}}
                                            <td class="text-center">{{$item->price}}</td>
                                            <td class="text-center">{{$item->rate}}</td>
                                            <td class="text-center"> <img class="img-responsive" width="100px" height="100px" src="{{$item->img_link}}"/></td>
                                            <td class="text-center">
                                                <a href="/dashboard/edit_item/{{$item->id}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="/dashboard/item_delete/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                            </table>

                        </div>

                        <div class="row">
                        <div class="col col-m-4 col-md-offset-5">
                            {{ $item->paginate(4) }}
                        </div>

                        </div>
                        </div>
    </div>

@endsection
@extends('layouts.app')
@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($item as $item)
                <form class="form-horizontal" method="post" action="/dashboard/edit_item/{{$item->id}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Brand Name</label>
                        <div class="col-sm-10">
                            <input name="brand" type="text" class="form-control" value="{{$item->brand}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">item Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" value="{{$item->name}}">
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-2 control-label" style="text-align: left;">Category Name</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<select name="categories" class="form-control">--}}
                                {{--@foreach($item->category as $category)--}}
                                    {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" >{{$item->description}}"</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Image Link</label>
                        <div class="col-sm-10">
                            <input name="img_link" type="text" class="form-control" value="{{$item->img_link}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Rating</label>
                        <div class="col-sm-10">
                            <input name="rate" type="number" class="form-control" value="{{$item->rate}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Price</label>
                        <div class="col-sm-10">
                            <input name="price" type="number" class="form-control" value="{{$item->price}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </div>
                </form>
                    @endforeach
            </div>
        </div>


@endsection
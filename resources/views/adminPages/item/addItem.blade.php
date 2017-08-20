@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" method="post" action="/dashboard/add_item/addItem">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Brand Name</label>
                        <div class="col-sm-10">
                            <input name="brand" type="text" class="form-control "placeholder="Brand Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Item Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control "placeholder="Item Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Category Name</label>
                        <div class="col-sm-10">
                            <select name="categories" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control "placeholder="Item Description..."></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Image Link</label>
                        <div class="col-sm-10">
                            <input name="img_link" type="text" class="form-control "placeholder="Item Image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Rating</label>
                        <div class="col-sm-10">
                            <input name="rate" type="text" class="form-control "placeholder="Item Rating">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: left;">Price</label>
                        <div class="col-sm-10">
                            <input name="price" type="number" class="form-control" placeholder="Price">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
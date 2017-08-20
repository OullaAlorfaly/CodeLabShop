@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">Add New Category</div>
                    <div class="panel-body">
                        @foreach($category as $category)
                        <form class="form-horizontal" method="POST" action="/dashboard/edit_category/{{$category->id}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="text-align: left;">Category Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" value="{{$category->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
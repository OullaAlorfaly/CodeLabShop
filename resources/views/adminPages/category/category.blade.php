@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">Add New Category</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/dashboard/category/addCategory">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label   for="email" class="col-md-4 control-label">Category Name</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <table class="table table-striped table-bordered">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center">{{$category->id}}</td>
                            <td class="text-center">{{$category->name}}</td>
                            <th class="text-center">
                                <a href="edit_category/{{$category->id}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="category_delete/{{$category->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>




@endsection
@extends('layouts.app')

@section('navtitle')
Category Edit

@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('c.update')}}" method="POST">
                @csrf()
                @method('post')
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" placeholder="Enter Category name Here..">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="description">Category Description</label>
                        <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Category description Here.."> -->
                        <textarea name="description" id="description" class="form-control" rows="2" placeholder="Enter Category description Here..">{{$category->description}}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <button class="btn btn-success " type="submit" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
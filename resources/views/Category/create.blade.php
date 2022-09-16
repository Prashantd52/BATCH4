@extends('layouts.app')

@section('navtitle')
Category Create

@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
            <form action="{{route('c.store')}}" method="POST">
                @csrf()
                @method('post')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category name Here.." >
                        @error('name')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="description">Category Description</label>
                        <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Category description Here.."> -->
                        <textarea name="description" id="description" class="form-control" rows="2" placeholder="Enter Category description Here.."></textarea>
                        @error('description')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <button class="btn btn-success " type="submit" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
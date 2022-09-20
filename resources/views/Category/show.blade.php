@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-title m-2">
            <h4>{{$category->name}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img class="col" src="{{asset($category->file_path)}}" alt="test">
                </div>
                <div class="col-md-8">
                    {{$category->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('navtitle')
Category Index &nbsp;<a href="{{route('c.create')}}">+</a>
@endsection

@section('content')
 
<div class="container">
    <div class="table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>

                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->created_at}}</td>
                        <td><div class="row">
                            <a class="btn btn-primary" href="{{route('c.edit',$category->id)}}">edit</a>&nbsp;
                            <form action="{{route('c.delete')}}" method="post">
                                @csrf()
                                @method('post')
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <button class="btn btn-danger" type="submit" title="delete this category"> Delete</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('navtitle')
Category Index &nbsp;@auth<a href="{{route('c.create')}}">+</a>@endauth
@endsection

@section('content')
<div class="row">
    <div class="col"></div>
    <div class=" row col-md-3">
        <form action="{{route('c.index')}}" method="get">
            <input type="text" value="{{$search ?? ''}}" name="search" class="col-sm-11" placeholder="Enter search term">
            <button  type="submit" ><i >&#128269;</i></button>
        </form>
    </div>
</div>
 
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
                            @if($category->deleted_at)
                                <a class="btn btn-warning" href="{{route('c.restore',$category->id)}}">Restore</a>&nbsp;
                            @endif
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
        @if(!($search ?? '1'))
        {{$categories->links()}}
        @endif
    </div>
</div>
@endsection

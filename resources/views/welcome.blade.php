@extends('template')

@section('title', 'welcome')

@section('body')


@foreach ($employees as $employee)
    <div class="card" style="margin: 6rem">
        <div class="card-body">
            <h5 class="card-title">{{$employee->name}}</h5>
            <p class="card-text">{{$employee->age}}</p>
            <p class="card-text">{{$employee->address}}</p>
            <p class="card-text">{{$employee->phone}}</p>
            <a href="{{route('edit', $employee->id)}}" class="btn btn-success">Edit</a>
            <form action="/delete/{{$employee->id}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endforeach


@endsection

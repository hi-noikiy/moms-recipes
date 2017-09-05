@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <ul>
                @foreach ($ingredients as $ingredient)
                    <li>{{ $ingredient->name }}</li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </div>>
</div>
@endsection

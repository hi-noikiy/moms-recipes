@extends('layouts.app')

@section('content')
<div class="container">

    @if (auth()->check())
        <div class="row">
            <div class="col s8 offset-s2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Add Recipe</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col s8 offset-s2">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Recipes</span>

                    @foreach ($recipes as $recipe)
                        <article>
                            <h4><a href="{{ $recipe->path()}}">{{ $recipe->title }}</a></h4>
                            <p>
                                {{ $recipe->description }}
                            <p>
                        </article>

                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>>
</div>
@endsection

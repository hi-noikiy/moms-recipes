@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">{{ $recipe->title }}</span>
                    <p>
                        {{ $recipe->description }}
                    </p>

                    <ul>
                        @foreach($recipe->ingredients as $ingredient)
                            <li>{{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check())
        <div class="row">
            <div class="col s8 offset-s2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Add Ingredient</span>

                        <form method="POST" action="{{ $recipe->path() . '/ingredients'}}">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach ($recipe->steps as $step)
        <div class="row">
                <div class="col s8 offset-s2">
                    <div class="card">
                        <div class="card-content">
                            <p>
                                {{ $step->body }}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

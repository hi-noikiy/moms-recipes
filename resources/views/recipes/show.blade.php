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

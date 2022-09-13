@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Hello,')}} {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <h1>My anime list</h1>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="favotire-tab" data-bs-toggle="tab" data-bs-target="#favorite-tab" type="button" role="tab" aria-controls="favorite-tab" aria-selected="true">Favorite</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="watched-tab" data-bs-toggle="tab" data-bs-target="#watched-tab" type="button" role="tab" aria-controls="watched-tab" aria-selected="false">Watched</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="will-watch-tab" data-bs-toggle="tab" data-bs-target="#will-watch-tab" type="button" role="tab" aria-controls="will-watch-tab" aria-selected="false">Will watch</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="abandoned-tab" data-bs-toggle="tab" data-bs-target="#abandoned-tab" type="button" role="tab" aria-controls="abandoned-tab" aria-selected="false">Abandoned</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="favorite-tab" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="watched-tab" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="will-watch-tab" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="abandoned-tab" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
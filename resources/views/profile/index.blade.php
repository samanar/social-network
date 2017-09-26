@extends('layouts.app')

@section('content')

    <div class="uk-container uk-margin">
        <div class="uk-width-1-1 uk-flex uk-flex-center">
            <div class="uk-card uk-card-default uk-card-hover uk-width-2-3">
                <div class="uk-card-header">
                    <div class="uk-flex uk-flex-middle uk-flex-center" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-rounded profile_avatar" alt="avatar"
                                 src="{{ Storage::url($user->avatar) }}">
                        </div>
                        <div class="uk-width-expand">
                            <div class="uk-card-title">
                                {{ $user->slug }}'s profile page
                            </div>
                            <div class="uk-text-meta">
                                Joined on {{ $user->created_at->toFormattedDateString() }}
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                    </div>
                    <div class="uk-card-footer">
                        <a href="#" class="uk-button uk-button-text">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
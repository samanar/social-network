@extends('layouts.app')

@section('content')

    <div class="uk-container uk-margin">
        <div class="uk-width-1-1 uk-flex uk-flex-center">
            <div class="uk-card uk-card-default uk-card-hover uk-card-large uk-width-2-3">
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
                        <div class="uk-margin" uk-grid>
                            <div class="uk-width-1-3 label">Name :</div>
                            <div class="uk-width-2-3 text">{{ $user->name }}</div>
                            <div class="uk-width-1-3 label">Email :</div>
                            <div class="uk-width-2-3 text">{{ $user->email }}</div>
                            <div class="uk-width-1-3 label">Gender :</div>
                            <div class="uk-width-2-3 text">{{ ($user->gender) ? 'Male' : 'Female' }}</div>
                            <div class="uk-width-1-3 label">Phone :</div>
                            <div class="uk-width-2-3 text">
                                @if(isset( $user->profile()->phone ))
                                    {{ $user->profile()->phone }}
                                @else
                                    -
                                @endif
                            </div>
                            <div class="uk-width-1-3 label">Location :</div>
                            <div class="uk-width-2-3 text">
                                @if(isset( $user->profile()->location ))
                                    {{ $user->profile()->location }}
                                @else
                                    -
                                @endif
                            </div>
                            <div class="uk-width-1-3 label">About me :</div>
                            <div class="uk-width-2-3 text">
                                @if(isset( $user->profile()->description ))
                                    {{ $user->profile()->description }}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    </div>
                    @if( Auth::user()->id == $user->id )
                        <div class="uk-card-footer">
                            <a href="#" class="uk-button uk-button-primary">Edit profile info</a>
                            <a href="#" class="uk-button uk-button-danger">Edit credentials</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
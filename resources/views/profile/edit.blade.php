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
                            <form class="uk-form-stacked" role="form" method="POST"
                                  action="{{ route('profile.update') }}">

                                {{ csrf_field() }}

                                <div>
                                    <label class="uk-form-label">Name</label>
                                    <input id="name" type="text"
                                           class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}"
                                           name="name"
                                           value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Email Address</label>
                                    <input id="email" type="email"
                                           class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Gender</label>
                                    <select name="gender" id="gender"
                                            class="uk-select {{ $errors->has('gender') ? ' uk-form-danger' : '' }}">
                                        <option value="1" @if(old('gender') == 1) selected @endif>Male</option>
                                        <option value="0 @if(old('gender') == 0) selected @endif">Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('gender') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Password</label>
                                    <input id="password" type="password"
                                           class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}"
                                           name="password" value="{{ old('password') }}" required>

                                    @if ($errors->has('password'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password"
                                           class="uk-input{{ $errors->has('password_confirmation') ? ' uk-form-danger' : '' }}"
                                           name="password_confirmation" value="{{ old('password_confirmation') }}"
                                           required>

                                    @if ($errors->has('password_confirmation'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary" type="submit" name="button">Register
                                    </button>
                                    <a class="uk-float-right" href="{{ route('login') }}">
                                        Already have an account?
                                    </a>
                                </div>

                            </form>
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
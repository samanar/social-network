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
                        <div class="uk-margin">
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
                                           value="{{ $user->email }}" required>

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
                                        <option value="1" @if($user->gender == 1) selected @endif>Male</option>
                                        <option value="0" @if($user->gender == 0) selected @endif>Female</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('gender') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Phone</label>
                                    <input id="phone" type="text"
                                           placeholder="phone"
                                           class="uk-input{{ $errors->has('phone') ? ' uk-form-danger' : '' }}"
                                           name="phone" value="{{ $profile->phone }}">

                                    @if ($errors->has('phone'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">Location</label>
                                    <input id="location" type="text"
                                           placeholder="location"
                                           class="uk-input{{ $errors->has('location') ? ' uk-form-danger' : '' }}"
                                           name="location" value="{{ $profile->location }}"
                                    >

                                    @if ($errors->has('location'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('location') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <label class="uk-form-label">About me:</label>

                                    <textarea name="description" id="description" rows="5"
                                              placeholder="About me"
                                              class="uk-textarea">{{ $profile->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <div class="uk-alert-danger" uk-alert>
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary uk-width-1-1" type="submit"
                                            name="button">
                                        Edit Data
                                    </button>
                                    <a href="{{ route('profile' , $user->slug) }}"
                                       class="uk-button uk-button-danger uk-width-1-1 uk-margin">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
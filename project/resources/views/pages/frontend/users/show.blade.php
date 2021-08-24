@extends('layouts.frontend')

@section('title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="ui stackable equal width grid container">
        <div class="five wide column">
            <div class="ui cards">
            <div class="ui card">
                <div class="image">
                  <!--   <div class="ui {{ $settings->color }} right ribbon label">
                        <i class="star icon"></i> {{ __('app.rank') }} {{ $user->rank }}
                    </div> -->
                    <img src="{{ $user->avatar_url }}">
                </div>
                <div class="content">
                    <div class="header">{{ $user->name }}</div>
                    <div class="meta">
                        <i class="calendar outline icon"></i>
                        {{ __('users.joined') }} {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
                @if (auth()->user()->id == $user->id)
                    <div class="extra content">
                        <a class="ui basic {{ $settings->color }} button" href="{{ route('frontend.users.edit', $user) }}">{{ __('users.edit') }}</a>
                    </div>
                @endif
            </div>
            </div>
        </div>
        <div class="eleven wide column">
            <div id="user-stats" class="ui equal width stackable grid">
                <div class="center aligned column">
                    <div class="ui {{ $inverted }} segment">
                        <div class="ui {{ $inverted }} statistic">
                            <div class="value">
                                {{ $trades_count }}
                            </div>
                            <div class="label">
                                {{ __('app.closed_trades') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="center aligned column">
                    <div class="ui {{ $inverted }} segment">
                        <div class="ui {{ $inverted }} green statistic">
                            <div class="value">
                                {{ $profitable_trades_count }}
                            </div>
                            <div class="label">
                                {{ __('app.profitable_trades') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="center aligned column">
                    <div class="ui {{ $inverted }} segment">
                        <div class="ui {{ $inverted }} red statistic">
                            <div class="value">
                                {{ $unprofitable_trades_count }}
                            </div>
                            <div class="label">
                                {{ __('app.unprofitable_trades') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
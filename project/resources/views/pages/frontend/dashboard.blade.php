@extends('layouts.frontend')

@section('title')
{{ __('app.dashboard') }}
@endsection



@section('content')

<!-- @if ($first_time_login)
<h3>Welcome Popup</h3>
@else
<h3>Hey! 🖐 Nothing to Show</h3>
@endif -->

<!-- @if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->
<div class="ui stackable grid container">
    <div class="ten wide column">
        <img src="{{ asset('images/trading.jpeg') }}" style="height: 100%;width:100%" class="image">
        <!-- <h2 class="ui {{ $settings->color }} dividing header">
                {{ __('app.top_traded') }}
            </h2>
            <div class="ui equal width stackable grid">
                @if($top_traded_assets->isEmpty())
                    <div class="column">
                        <div class="ui {{ $inverted }} segment">
                            <p>{{ __('app.no_open_trades') }}</p>
                        </div>
                    </div>
                @else
                    @foreach($top_traded_assets->chunk(3) as $top_traded_assets_chunk)
                        <div class="row">
                            @foreach($top_traded_assets_chunk as $asset)
                                <div class="center aligned column">
                                    <div class="ui {{ $inverted }} segment">
                                        <div class="ui small {{ $inverted }} statistic">
                                            <img class="ui tiny centered image" src="{{ $asset->logo_url }}">
                                            <div class="value">
                                                {{ $asset->symbol }}
                                            </div>
                                            <div class="label">
                                                {{ $asset->_trades_count }}
                                                {{ __('app.trades') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div>
            <h2 class="ui {{ $settings->color }} dividing header">
                {{ __('app.top_traders') }}
            </h2>
            <div class="ui equal width stackable grid">
                @if($top_traders->isEmpty())
                    <div class="column">
                        <div class="ui {{ $inverted }} segment">
                            <p>{{ __('app.no_closed_trades') }}</p>
                        </div>
                    </div>
                @else
                    @foreach($top_traders->chunk(3) as $top_traders_chunk)
                        <div class="row">
                            @foreach($top_traders_chunk as $trader)
                            <div class="column">
                                <div class="ui cards">
                                    <div class="top-trader card">
                                        <div class="content">
                                            <a href="{{ route('frontend.users.show', $trader->user) }}">
                                                <img class="right floated mini ui image" src="{{ $trader->user->avatar_url }}">
                                            </a>
                                            <div class="header">
                                                {{ $trader->user->name }}
                                            </div>
                                            <div class="meta">
                                                {{ __('app.joined') }}
                                                {{ $trader->user->append('created_at')->created_at->diffForHumans() }}
                                            </div>
                                            <div class="description">
                                                <span class="ui circular {{ $settings->color }} label">{{ $trader->profitable_trades }}</span>
                                                {{ __('app.profitable_trades') }}
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <div class="ui two buttons">
                                                <a href="{{ route('frontend.users.show', $trader->user) }}" class="ui basic {{ $settings->color }} button">{{ __('app.view_profile') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
            </div> -->
    </div>
    <div class="six wide column">
        <!--  <h2 class="ui {{ $settings->color }} dividing header">
                {{ __('app.top_trades') }}
            </h2>
            <div class="ui one column stackable grid">
                @if($top_trades->isEmpty())
                    <div class="column">
                        <div class="ui {{ $inverted }} segment">
                            <p>{{ __('app.no_closed_trades') }}</p>
                        </div>
                    </div>
                @else
                    <div class="column">
                        <div class="ui large feed">
                            @foreach($top_trades as $top_trade)
                                <div class="event">
                                    <div class="label">
                                        <a href="{{ route('frontend.users.show', $top_trade->user) }}">
                                            <img src="{{ $top_trade->user->avatar_url }}">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="date">
                                            {{ __('app.closed_at') }}
                                            {{ $top_trade->closed_at->diffForHumans() }}
                                        </div>
                                        <div class="content">
                                            <i class="arrow {{ $top_trade->direction == \App\Models\Trade::DIRECTION_BUY ? 'up green' : 'down red' }} icon"></i>
                                            <span class="ui {{ $top_trade->direction == \App\Models\Trade::DIRECTION_BUY ? 'green' : 'red' }} tiny basic ">
                                                {{ __('app.trade_direction_' . $top_trade->direction) }}
                                            </span>
                                            {{ $top_trade->_quantity }} <img class="ui inline image" src="{{ $top_trade->asset->logo_url }}"> <b>{{ $top_trade->asset->symbol }}</b>
                                        </div>
                                        <div class="content">
                                            <span class="ui right pointing {{ $settings->color }} basic label">{{ __('app.profit') }}</span>
                                            <span class="tooltip" data-tooltip="{{ _('app.open_price') }}: {{ $top_trade->_price_open }}, {{ _('app.close_price') }}: {{ $top_trade->_price_close }}" {{ $inverted ? 'data-inverted="false"' : '' }}>
                                                {{ $top_trade->_pnl }} {{ $top_trade->currency->code }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui divider"></div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div> -->
        <h2 class="ui {{ $settings->color }} dividing header">
            {{ __('app.top_traded') }}
        </h2>
        <div class="ui equal width stackable grid">
            @if($top_traded_assets->isEmpty())
            <div class="column">
                <div class="ui {{ $inverted }} segment">
                    <p>{{ __('app.no_open_trades') }}</p>
                </div>
            </div>
            @else
            @foreach($top_traded_assets->chunk(3) as $top_traded_assets_chunk)
            <div class="row">
                @foreach($top_traded_assets_chunk as $asset)
                <div class="center aligned column" style="max-width: 144px;max-height:150px;">
                    <div class="ui {{ $inverted }} segment " style="height:150px;width: 118px">
                        <div class="ui small {{ $inverted }} statistic">
                            <img class="ui tiny centered image" src="{{ $asset->logo_url }}">
                            <div class="">
                                {{ $asset->symbol }}
                            </div>
                            <div class="label">
                                {{ $asset->_trades_count }}
                                {{ __('app.trades') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
        </div>


        <h2 class="ui {{ $settings->color }} dividing header">
            <!-- {{ __('app.top_traded') }} -->Recent Treades
        </h2>
        <div class="ui equal width stackable grid">
            @if($recent_TradedAssets->isEmpty())
            <div class="column">
                <div class="ui {{ $inverted }} segment">
                    <p>
                        <!-- {{ __('app.no_open_trades') }} -->No recent trade yet.
                    </p>
                </div>
            </div>
            @else
            @foreach($recent_TradedAssets->chunk(3) as $recent_TradedAssets_chunk)
            <div class="column">
                <!--     @foreach($recent_TradedAssets_chunk as $assets) -->
                <div class="center aligned column">
                    <!-- <div class="ui {{ $inverted }} segment">
                                        <div class="ui small {{ $inverted }} statistic"> -->
                    <li>
                        <!--    <div class=""> -->
                        {{ $assets->name }}
                        <!-- </div> -->
                    </li>
                    <!-- </div>
                                    </div> -->
                </div>
                <!--  @endforeach -->
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
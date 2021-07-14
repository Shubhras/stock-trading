<div id="header" class="ui container">
    <div class="ui equal width middle aligned grid">
        <div id="menu-top-bar" class="row">
            <div class="mobile only column">
                <!-- Mobile menu -->
                <div class="ui vertical icon {{ $inverted }} menu">
                    <div class="ui left pointing dropdown icon item">
                        <i class="bars icon"></i>
                        <div class="ui stackable large menu">
                            <a href="{{ route('frontend.dashboard') }}" class="item {{ Route::currentRouteName()=='frontend.dashboard' ? 'active' : '' }}">
                                <i class="home icon"></i>
                                {{ __('app.dashboard') }}
                            </a>
                            <a href="{{ route('frontend.competitions.index') }}" class="item {{ strpos(Route::currentRouteName(),'frontend.competitions.')!==FALSE ? 'active' : '' }}">
                                <i class="trophy icon"></i>
                                {{ __('app.competitions') }}
                            </a>
                            <a href="{{ route('frontend.assets.index') }}" class="item {{ Route::currentRouteName()=='frontend.assets.index' ? 'active' : '' }}">
                                <i class="chart bar icon"></i>
                                {{ __('app.markets') }}
                            </a>
                            <a href="{{ route('frontend.rankings') }}" class="item {{ Route::currentRouteName()=='frontend.rankings' ? 'active' : '' }}">
                                <i class="star icon"></i>
                                {{ __('app.rankings') }}
                            </a>
                            @if(config('broadcasting.connections.pusher.key'))
                            <a href="{{ route('frontend.chat.index') }}" class="item {{ Route::currentRouteName()=='frontend.chat.index' ? 'active' : '' }}">
                                <i class="comments outline icon"></i>
                                {{ __('app.chat') }}
                            </a>
                            @endif
                            <a href="{{ route('frontend.help') }}" class="item {{ Route::currentRouteName()=='frontend.help' ? 'active' : '' }}">
                                <i class="question icon"></i>
                                {{ __('app.help') }}
                            </a>
                            @if(auth()->check())
                            <div class="item">
                                <div class="text">
                                    <img class="ui avatar image" src="{{ auth()->user()->avatar_url }}">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="menu">
                                    @if(auth()->user()->admin())
                                    <a href="{{ route('backend.dashboard') }}" class="item">
                                        <i class="setting icon"></i>
                                        {{ __('app.backend') }}
                                    </a>
                                    @endif
                                    <a href="{{ route('frontend.users.show', auth()->user()) }}" class="item">
                                        <i class="user icon"></i>
                                        {{ __('users.profile') }}
                                    </a>

                                    @packageview('includes.frontend.header')

                                    <log-out-button token="{{ csrf_token() }}" class="item">
                                        <i class="sign out alternate icon"></i>
                                        {{ __('auth.logout') }}
                                    </log-out-button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- END Mobile menu -->
            </div>
            <div class="tablet only computer only column">
                <h4>
                    <a href="{{ route('frontend.index') }}">
                        <img src="{{ asset('images/logo.png') }}" class="ui image">
                        {{ __('app.app_name') }}
                    </a>
                </h4>
            </div>
            <div class="right aligned column">
                <locale-select :locales="{{ json_encode($locale->locales()) }}" :locale="{{ json_encode($locale->locale()) }}"></locale-select>
            </div>
        </div>
        <div class="row">
            <div class="tablet only computer only column">
                <!-- Desktop menu -->
                <div class="ui stackable {{ $inverted }} menu">
                    <a href="{{ route('frontend.dashboard') }}" class="item {{ Route::currentRouteName()=='frontend.dashboard' ? 'active' : '' }}">
                        <i class="home icon"></i>
                        {{ __('app.dashboard') }}
                    </a>
                    <a href="{{ route('frontend.assets.index') }}" class="item {{ Route::currentRouteName()=='frontend.assets.index' ? 'active' : '' }}">
                        <i class="chart bar icon"></i>
                        <!-- {{ __('app.markets') }} -->Assets
                    </a>
                    <a href="{{ route('frontend.assets.index') }}" class="item {{ Route::currentRouteName()=='frontend.assets.index' ? 'active' : '' }}">
                        <i class="dollar icon"></i>
                        <!-- {{ __('app.markets') }} -->Transactions
                    </a>
                    <a href="{{ route('frontend.assets.index') }}" class="item {{ Route::currentRouteName()=='frontend.assets.index' ? 'active' : '' }}">
                        <i class="money icon"></i>
                        <!-- {{ __('app.markets') }} -->Wallet
                    </a>
                    <a href="{{ route('frontend.competitions.index') }}" class="item {{ strpos(Route::currentRouteName(),'frontend.competitions.')!==FALSE ? 'active' : '' }}">
                        <i class="trophy icon"></i>
                        {{ __('app.competitions') }}
                    </a>

                    <a href="{{ route('frontend.rankings') }}" class="item {{ Route::currentRouteName()=='frontend.rankings' ? 'active' : '' }}">
                        <i class="star icon"></i>
                        {{ __('app.rankings') }}
                    </a>
                    @if(config('broadcasting.connections.pusher.key'))
                    <a href="{{ route('frontend.chat.index') }}" class="item {{ Route::currentRouteName()=='frontend.chat.index' ? 'active' : '' }}">
                        <i class="comments outline icon"></i>
                        {{ __('app.chat') }}
                    </a>
                    @endif
                    <a href="{{ route('frontend.help') }}" class="item {{ Route::currentRouteName()=='frontend.help' ? 'active' : '' }}">
                        <i class="question icon"></i>
                    </a>
                    @if(auth()->check())
                    <div class="right menu">
                        <div class="ui item dropdown">
                            <div class="text">
                                <img class="ui avatar image" src="{{ auth()->user()->avatar_url }}">
                                {{ auth()->user()->name }}
                            </div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                @if(auth()->user()->admin())
                                <a href="{{ route('backend.dashboard') }}" class="item">
                                    <i class="setting icon"></i>
                                    {{ __('app.backend') }}
                                </a>
                                @endif
                                <a href="{{ route('frontend.users.show', auth()->user()) }}" class="item">
                                    <i class="user icon"></i>
                                    {{ __('users.profile') }}
                                </a>

                                @packageview('includes.frontend.header')

                                <log-out-button token="{{ csrf_token() }}" class="item">
                                    <i class="sign out alternate icon"></i>
                                    {{ __('auth.logout') }}
                                </log-out-button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- END Desktop menu -->
            </div>
        </div>
    </div>
</div>

@if(auth()->user()->id !==1)
<div style="text-align: right;">
 <button href="#" style="margin-right: 108px;margin-top:10px;" data-toggle="modal" data-target="#RequestPoint" class="ui small basic blue icon submit nowrap button">Request Points</button>
 </div>
@endif

<!-- Modal -->
<div class="modal fade" id="RequestPoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Request Points</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      {{csrf_field()}}
      <div class="modal-body">
      
  <div class="form-group">
    <p style="text-align: center;"><b>Request Points from site admin</b></p><br/>
    <input type="number" style="width:200px;margin-left:140px" class="form-control" aria-describedby="emailHelp" placeholder="Enter Points"><br/>
  </div>
<p style="text-align: center;">
  <button type="submit" class="btn btn-primary">Submit</button>
</p>
      </div>
       <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
</div>
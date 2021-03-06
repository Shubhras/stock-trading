<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <!--   <div class="right aligned column">
                <locale-select :locales="{{ json_encode($locale->locales()) }}" :locale="{{ json_encode($locale->locale()) }}"></locale-select>
            </div> -->
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
                    <a href="{{ route('frontend.transactions.index') }}" class="item {{ Route::currentRouteName()=='frontend.transactions.index' ? 'active' : '' }}">
                        <i class="dollar icon"></i>
                        <!-- {{ __('app.markets') }} -->Transactions
                    </a>
                    <a href="{{ route('frontend.wallet.index') }}" class="item {{ Route::currentRouteName()=='frontend.wallet.index' ? 'active' : '' }}">
                        <i class="money icon"></i>
                        <!-- {{ __('app.markets') }} -->Wallet
                    </a>
                    <a href="{{ route('frontend.myassets.index') }}" class="item {{ Route::currentRouteName()=='frontend.myassets.index' ? 'active' : '' }}">
                        <i class="briefcase icon"></i>
                        <!-- {{ __('app.markets') }} -->My Assets
                    </a>
                    <!--  <a href="{{ route('frontend.competitions.index') }}" class="item {{ strpos(Route::currentRouteName(),'frontend.competitions.')!==FALSE ? 'active' : '' }}">
                        <i class="trophy icon"></i>
                        {{ __('app.competitions') }}
                    </a>

                    <a href="{{ route('frontend.rankings') }}" class="item {{ Route::currentRouteName()=='frontend.rankings' ? 'active' : '' }}">
                        <i class="star icon"></i>
                        {{ __('app.rankings') }}
                    </a> -->
                    @if(config('broadcasting.connections.pusher.key'))
                    <a href="{{ route('frontend.chat.index') }}" class="item {{ Route::currentRouteName()=='frontend.chat.index' ? 'active' : '' }}">
                        <i class="comments outline icon"></i>
                        {{ __('app.chat') }}
                    </a>
                    @endif
                    <a href="{{ route('frontend.help') }}" class="item {{ Route::currentRouteName()=='frontend.help' ? 'active' : '' }}">
                        <i class="desktop icon"></i>Help
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

<!--                                 @packageview('includes.frontend.header')
 -->
                               <!--  <log-out-button token="{{ csrf_token() }}" class="item">
                                    <i class="sign out alternate icon"></i>
                                    {{ __('auth.logout') }}
                                </log-out-button> -->

                               

                                    <form method="POST" action="/stock-trading/logout"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="item">
                                    <i class="sign out alternate icon"></i>
                                        <input type="submit" style="border:0px;background-color:white" value="Log out" />
                                        </a>
                                    </form>
                              
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- END Desktop menu -->
            </div>

        </div>
    </div>

    @if(auth()->user()->id !==1)


    <div class="row">
        <div class="4" style="text-align: left;">
            <!-- <h4 href="#" style="margin-right: 108px;margin-top:10px; border:white" class="ui small basic blue icon submit nowrap">Wallet - Available Balance:</h4> -->
            <h3 class="ui blue header" style="margin-right: 108px;margin-top:10px;">Wallet - Available Balance: ${{ auth()->user()->wallet_balance }}</h3>
        </div>

        <div class="8" style="margin-inline-start: auto; margin-right: 26px;">
            <button href="#" style="margin-top:10px; float:right; " data-toggle="modal" data-target="#RequestPoint" class="ui small basic blue icon submit nowrap button">Request Points</button>
        </div>
    </div>
    @endif

</div>


<div class="modal fade" id="RequestPoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Request Points</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addform">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <p style="text-align: center;"><b>Request Points from site admin</b></p><br />
                        <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="name" class="form-control" value="{{ auth()->user()->name }}">
                        <input type="hidden" name="email" class="form-control" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="status" class="form-control" value="Inactive">
                        
                       <!--  <input type="text" name="fund_request" class="form-control" style="width:200px;margin-left:140px" id="volume" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Please Enter Points"> -->

                        <input type="text" name="fund_request" style="width:200px;margin-left:140px" class="form-control" aria-describedby="emailHelp" placeholder="Enter Points" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><br />
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script text="text/javascript">
    $(document).ready(function() {
        $('#addform').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "userpointadd",
                data: $('#addform').serialize(),
                success: function(response) {
                    console.log(response)
                    $("#RequestPoint").modal('hide')
                    // alert("Request Sent");
                    location.reload();

                },
                error: function(error) {
                    console.log(error)
                    // alert("Request Not sent");
                }
            });
        });
    })
</script>
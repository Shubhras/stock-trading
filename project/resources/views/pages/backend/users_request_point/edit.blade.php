@extends('layouts.backend')

@section('title')
    {{ $user->name }} :: {{ __('User Request Point') }}
@endsection

@section('content')
    <div class="ui one column stackable grid container">
        <div class="column">
            <div class="ui {{ $inverted }} segment">
                <form class="ui {{ $inverted }} form" method="POST" action="{{ route('backend.users_request_point.update', $release_fund_user->id) }}" enctype="multipart/form-data" id="request_point_form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    
                    <input type="hidden" name="id" placeholder="" value="<?php echo $release_fund_user->id ?>">
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>{{ __('users.name') }}</label>
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="name" placeholder="{{ __('users.name') }}" value="<?php echo $release_fund_user->name ?>" required autofocus disabled>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('role') ? 'error' : '' }}">
                        
                    </div>
                   
                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>{{ __('users.email') }}</label>
                        <div class="ui left icon input">
                            <i class="mail icon"></i>
                            <input type="email" name="email" placeholder="{{ __('users.email') }}" value="<?php echo $release_fund_user->email ?>" required autofocus disabled>
                        </div>
                    </div>

                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>{{ __('Fund Request') }}</label>
                        <div class="ui left icon input">
                            <i class="dollar icon"></i>
                            <input type="text" name="fund_request" placeholder="Fund Request" value="<?php echo $release_fund_user->fund_request ?>" required autofocus disabled>
                        </div>
                    </div>

                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <label>{{ __('Release Fund') }}</label>
                        <div class="ui left icon input">
                            <i class="dollar icon"></i>
                            <input type="text" name="release_fund" placeholder="Release fund" value="<?php echo $release_fund_user->release_fund ?>" autofocus required>
                        </div>
                    </div>
                   
                    
                    <button class="ui large {{ $settings->color }} submit icon button">
                        <i class="save icon"></i>
                        {{ __('users.save') }}
                    </button>
                    <!-- <a href="{{ route('backend.users.delete', $user) }}" class="ui large red submit right floated icon button">
                        <i class="trash icon"></i>
                        {{ __('users.delete') }}
                    </a> -->
                </form>
            </div>
        </div>
        <div class="column">
            <a href="{{ url()->previous() }}"><i class="left arrow icon"></i> {{ __('users.back_all') }}</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#user-role-dropdown').dropdown('set selected', '{{ $user->role }}');
        $('#user-status-dropdown').dropdown('set selected', '{{ $user->status }}');
    </script>

<script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/mycustom.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/moment-with-locales.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.method.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.tagsinput.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/tag-it.min.js')}}"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
   $("#request_point_form").validate({
      rules: {

        release_fund: {
           required: true,
           minlength: 1,

         },

      },
      messages: {

        release_fund: {
                   required: "Please Enter release fund",
                   minlength: "Specification field accept minimum 1 value",

               },

           },
   });
</script>
@endpush
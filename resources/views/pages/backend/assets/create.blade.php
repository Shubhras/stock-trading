@extends('layouts.backend')

@section('title')
    {{ __('app.assets') }} :: {{ __('app.create') }}
@endsection

@section('content')
    <div class="ui one column stackable grid container">
        <div class="column">
            <div class="ui {{ $inverted }} segment">
                <form class="ui {{ $inverted }} form" method="POST" action="{{ route('backend.assets.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <image-upload-input name="logo" default-image-url="{{ asset('images/asset.png') }}" class="{{ $errors->has('logo') ? 'error' : '' }}" color="{{ $settings->color }}">
                        {{ __('app.logo') }}
                    </image-upload-input>
                    <div class="field {{ $errors->has('price') ? 'error' : '' }}">
                        <label><!-- {{ __('app.price') }} -->ID</label>
                        <div class="ui input">
                            <input type="text" name="price" placeholder="Enter ID" value="{{ old('price') }}" required autofocus>
                        </div>
                    </div>
                   
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label>{{ __('app.name') }}</label>
                        <div class="ui input">
                            <input type="text" name="name" placeholder="{{ __('app.name') }}" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('price') ? 'error' : '' }}">
                        <label>{{ __('app.price') }}</label>
                        <div class="ui input">
                            <input type="text" name="price" placeholder="{{ __('app.price') }}" value="{{ old('price') }}" required autofocus>
                        </div>
                    </div>
                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <label><!-- {{ __('app.name') }} -->Description</label>
                        <div class="ui input">
                            <textarea type="text" name="name" placeholder="Message" value="{{ old('name') }}" required autofocus></textarea>
                        </div>
                    </div>
                   
                    <button class="ui large {{ $settings->color }} submit button">
                        <i class="save icon"></i>
                        {{ __('app.save') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="column">
            <a href="{{ route('backend.assets.index') }}"><i class="left arrow icon"></i> {{ __('app.back_all_assets') }}</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#asset-market-dropdown').dropdown('set selected', '{{ old('market') }}');
        $('#asset-currency-dropdown').dropdown('set selected', '{{ old('currency') }}');
    </script>
@endpush
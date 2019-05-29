@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="is-size-3">@lang('pages.home.feedback')</h1>

            <form action="">
                <div class="field">
                    <label for="name" class="label">@lang('pages.home.name')</label>
                    <div class="control">
                        <input id="name" class="input" type="text" placeholder="@lang('pages.home.name')" required/>
                    </div>
                </div>

                <div class="field">
                    <label for="phone" class="label">
                        @lang('pages.home.phone') <span class="has-text-grey has-text-weight-light">+{1}(000)000-00-00</span>
                    </label>
                    <div class="control">
                        <input id="phone" class="input" type="text" placeholder="@lang('pages.home.phone')" required/>
                    </div>
                </div>

                <div class="field">
                    <label for="message" class="label">@lang('pages.home.message')</label>
                    <div class="control">
                        <textarea id="message" class="textarea" placeholder="@lang('pages.home.message')" required></textarea>
                    </div>
                </div>

                <button class="button is-primary is-medium">@lang('pages.home.submit')</button>
            </form>
        </div>
    </div>
@endsection

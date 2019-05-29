@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="columns">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="is-size-3">@lang('pages.home.feedback')</h1>

            <form action="{{ route('post.feedback') }}" id="feedback-form">
                <div class="field">
                    <label for="name" class="label">@lang('pages.home.name')</label>
                    <div class="control">
                        <input
                                id="name"
                                name="name"
                                class="input"
                                type="text"
                                maxlength="255"
                                placeholder="@lang('pages.home.name')"
                                required
                        />
                        <p class="help is-danger is-hidden"></p>
                    </div>
                </div>

                <div class="field">
                    <label for="phone" class="label">
                        @lang('pages.home.phone')
                        <span class="has-text-grey has-text-weight-light">+{1}(000)000-00-00</span>
                    </label>
                    <div class="control">
                        <input
                                id="phone"
                                name="phone"
                                class="input"
                                type="text"
                                maxlength="20"
                                placeholder="@lang('pages.home.phone')"
                                required
                        />
                        <p class="help is-danger is-hidden"></p>
                    </div>
                </div>

                <div class="field">
                    <label for="message" class="label">@lang('pages.home.message')</label>
                    <div class="control">
                        <textarea
                                id="message"
                                name="message"
                                class="textarea"
                                maxlength="500"
                                placeholder="@lang('pages.home.message')"
                                required
                        ></textarea>
                        <p class="help is-danger is-hidden"></p>
                    </div>
                </div>

                <button type="submit" class="button is-primary is-medium">@lang('pages.home.submit')</button>
            </form>
        </div>
    </div>
@endsection

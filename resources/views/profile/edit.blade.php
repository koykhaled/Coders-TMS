@include('layouts.main')
<main class="update-account layout">
    <div class="container">
        <div class="layout__box edit__profile" id="edit_box">
            <div class="layout__boxHeader">
                <div class="layout__boxTitle">
                    <a href="{{ route('profile.show') }}">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 32 32">
                            <title>arrow-left</title>
                            <path
                                d="M13.723 2.286l-13.723 13.714 13.719 13.714 1.616-1.611-10.96-10.96h27.625v-2.286h-27.625l10.965-10.965-1.616-1.607z">
                            </path>
                        </svg>
                    </a>
                    <h3>Edit your profile</h3>
                </div>
            </div>
            <div class="layout__body">
                <form class="form" action="{{ route('profile.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    {{-- Name --}}
                    <div class="form__group">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- Email --}}
                    <div class="form__group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                            :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                    {{ __('Your email address is unverified.') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                        @endif
                    </div>
                    {{-- Description --}}
                    <div class="form__group">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                            :value="old('description', $user->description)" autofocus autocomplete="description" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>


                    <div class="avatar avatar--large active">
                        @if ($user->photo == null)
                            <img src="{{ asset('assets/avatar.svg') }}" />
                        @else
                            <img src="{{ asset($user->photo) }}" />
                        @endif
                    </div>
                    <div class="form__group">

                        <x-input-label for="photo" :value="__('Photo')" />
                        <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full"
                            :value="old('photo', $user->photo)" autofocus autocomplete="photo" enctype="multipart/form-data" />
                        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                    </div>

                    <div class="form__action">
                        <a class="btn btn--dark" href="{{ route('profile.show') }}">Cancel</a>
                        <button class="btn btn--main" type="submit">Update</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</main>

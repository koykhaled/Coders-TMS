@include('layouts.main')
@section('title')
    Delete profile
@endsection
<main class="update-account layout">
    <div class="container">
        <div class="layout__box">
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
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.
                                                                                                                                                                        Please enter
                                                                                                                                                                        your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="form__group">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="form__action">
                        <a class="btn btn--dark" href="{{ route('profile.show') }}">Cancel</a>
                        <button class="btn btn--main" type="submit">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6 mt-12">Profile</h1>

    <div class="max-w-4xl space-y-6">
        {{-- Update Profile Info --}}
        <div class="p-6 bg-gray-800 rounded-lg shadow">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Update Password --}}
        <div class="p-6 bg-gray-800 rounded-lg shadow">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Delete Account --}}
        <div class="p-6 bg-gray-800 rounded-lg shadow">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection

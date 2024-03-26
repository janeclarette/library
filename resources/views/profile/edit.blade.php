<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @if($profileImage)
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                <h3 class="text-lg font-semibold">Current Profile Image:</h3>
                                <img src="{{ $profileImage }}" alt="Profile Image" class="mt-4" style="max-width: 200px;">
                            </div>
                        </div>
                    @else
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <p>No profile image found.</p>
                        </div>
                    @endif


                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form method="POST" action="{{ route('profile.update-image') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        <div class="mb-4">
                            <label for="img_path">Upload New Profile Image:</label>
                            <input type="file" id="img_path" name="img_path" accept="image/*" class="block mt-1 w-full">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload Image</button>
                    </form>
                    </div>
                    </div>

    



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

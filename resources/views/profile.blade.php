<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FilmSales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url()->previous() }}" class="text-sky-600 font-black">< Back</a>
                </div>
            </div>
        </div>
    </div>

  <div class="container max-w-7xl mx-auto">
    <div style="min-height:80vh;">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
    <div class="px-6 py-12 bg-white border-b border-gray-200">
            <h3 class="text-center text-4xl ">Profile</h3>

            <!-- message -->
            <p class="text-center">{{session()->get('message')}}</p>
             <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="mx-auto" style="width:60%; margin-top:2em;" method="POST" action="{{ route('user_update') }}" id="updateProfileForm">
                @method('PATCH')
                {{ csrf_field() }}
                <div class="pt-4">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" type="text" placeholder="Your Name" class="block mt-1 w-full" type="text" name="name" value="{{$user['name']}}" autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <x-input id="email" placeholder="Your Email"  class="block mt-1 w-full" type="email" name="email" value="{{$user['email']}}"  autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="address" :value="__('Address')" />
    
                    <x-input id="address" placeholder="Your Address"  class="block mt-1 w-full" type="text" name="address" value="{{$user['address'] ? $user['address'] : null}}" autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="date_of_birth" :value="__('Date Of Birth')" />
    
                    <x-input id="date_of_birth" placeholder="Your Date Of Birth"  class="block mt-1 w-full" type="date" name="date_of_birth" value="{{$user['date_of_birth'] ? $user['date_of_birth'] : null}}" autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="password" :value="__('Password')" />
    
                    <x-input id="password" placeholder="Your Password"  class="block mt-1 w-full" type="password" name="password"  autofocus />
                </div>

                <div class="pt-4">
                    <x-label for="password_confirmation" :value="__('Password Confirmation')" />
    
                    <x-input id="password_confirmation" placeholder="Confirm Password"  class="block mt-1 w-full" type="password" name="password_confirmation" autofocus />
                </div>
            
                <x-button class="m-3 mt-6" style="font-size:1.2em; padding:0.6em 3.5em;">
                    {{ __('Update') }}
                </x-button>  

            </form>
        </div>
    </div>
</div>
</div>
    
</x-app-layout>

<x-admin.app-layout>

    <x-admin.top-bar/>
    <x-admin.sidebar/>

    <div class="container max-w-7xl mx-auto">
        <div class="card-content" style="min-height:80vh;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="px-6 py-12 bg-white border-b border-gray-200">
                    <!-- message -->
                    <p class="text-center">{{session()->get('message')}}</p>

                    <div class="flex flex-row flex-nowrap gap-10 pt-6">
                        <div class="basis-1/5">
                            <h1 class="text-4xl font-black mb-4">Users</h1>
                        </div>

                        <div class="basis-4/5">
                            <form method="POST" action="{{route('filter_users_index')}}" class="float:right;">
                                @csrf

                                <div class="flex flex-row flex-nowrap">    
                                    <x-select id="filter" name="filter" type="text" autofocus>
                                        <option value="ALL">All Users</option>
                                        <option value="LESS_THAN_20">Users less than 20 years</option>
                                        <option value="BTW_20_AND_35">Users between 20 and 35 years</option>
                                        <option value="BTW_35_AND_50">Users between 35 and 50 years</option>
                                        <option value="OLDER_THAN_50">Users older than 50 years</option>
                                    </x-select>
                                    
                                    <x-button type="submit" class="ml-4 my-1.5 normal-case" style="background: #0284C7; font-size:0.9em; font-weight:normal; padding: 0.6em 1.5em;">
                                        {{ __('Search') }}
                                    </x-button><br>
                                </div>                           
                            </form>  
                        </div>
                    </div>

                    <div style="width:100%">
                        @if (($users) && (count($users) > 0))

                            <table class="table-fixed w-full">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="text-left">#</th>
                                        <th class="text-left">Name</th>
                                        <th class="text-left">Last Film Bought</th>
                                        <th class="text-left">Age</th>
                                        <th class="text-left">No of Purchases</th>
                                        <th class="text-left"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($users as $index => $user)
                                            @include('admin.user_row')
                                        @endforeach
                                </tbody>                        
                            </table>

                        @else
                            <h2 class="text-2xl font-black mb-4 text-center">No user record</h2>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-admin.app-layout>


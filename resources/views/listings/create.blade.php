<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            {{__('Create a Gig')}}
                        </h2>
                        <p class="mb-4">{{__('Post a gig to find a developer')}}</p>
                    </header>

                    <form action="{{ route('listingsStore', App::getLocale()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >{{__('Company Name')}}</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                placeholder="{{__('Example: Acme Corps')}}"
                                value="{{old('company')}}"
                            />

                            @error('company')
                                <p class="text-red-500 text-xs mt-1">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >{{__('Job Title')}}</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="{{__('Example: Senior Laravel Developer')}}"
                                value="{{old('title')}}"

                            />

                            @error('title')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >{{__('Job Location')}}</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="{{__('Example: Remote, Boston MA, etc')}}"
                                value="{{old('location')}}"

                            />

                            @error('location')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >{{__('Contact Email')}}</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                placeholder="{{__('Example: something@something.com')}}"
                                value="{{old('email')}}"

                            />

                            @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                {{__('Website/Application URL')}}
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                placeholder="{{__('Example: http://acme.com')}}"
                                value="{{old('website')}}"

                            />

                            @error('website')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                {{__('Tags (Comma Separated)')}}
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="{{__('Example: Laravel, Backend, Postgres, etc')}}"
                                value="{{old('tags')}}"

                            />

                            @error('tags')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                {{__('Company Logo')}}
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />

                             @error('logo')
                                <p class="text-red-500 text-xs mt-1">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                {{__('Job Description')}}
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="{{__('Include tasks, requirements, salary, etc')}}"
                            >{{old('description')}}</textarea>

                            @error('description')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                {{__('Create Gig')}}
                            </button>

                            <a href="{{ route('index', App::getLocale()) }}" class="text-black {{ App::isLocale('en') ? 'ml-4' : 'mr-4' }}"> {{__('Back')}} </a>
                        </div>
                    </form>
    </x-card>
</x-layout>
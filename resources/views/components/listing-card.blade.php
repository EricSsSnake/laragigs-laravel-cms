@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 md:block {{ App::isLocale('en') ? 'mr-6' : 'ml-6' }}"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{ route('show', ['id' => $listing->id, 'lang' => App::getLocale()]) }}">
                    {{$listing->title}}
                </a>
            </h3>
            <div class="text-xl font-bold mb-4">
                {{$listing->company}}
            </div>
           
            <x-listing-tags :tags="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
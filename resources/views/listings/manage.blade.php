<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                {{__('Manage Gigs Submited By')}} {{auth()->user()->name}}
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @if (empty($listings))
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">{{__('No listings were found.')}}</p>
                        </td>
                    </tr>
                @else

                @foreach ($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="{{ route('show', ['id' => $listing->id, 'lang' => App::getLocale()]) }}">
                            {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="{{ route('listingsEdit', ['lang' => App::getLocale(), 'listing' => $listing->id]) }}"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            {{__('Edit')}}</a
                        >
                    </td>

                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form action="listings/{{$listing->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i> {{__('Delete')}}
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </x-card>
</x-layout>
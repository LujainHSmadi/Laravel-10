@props(['listing'])
<x-card>
    <div class="flex">
        {{-- {{ dd($listing->getRawOriginal('logo')) }} --}}
        @if (isset($listing->logo) && file_exists('storage/'.$listing->getRawOriginal('logo')))
        <img
        class="hidden w-48 mr-6 md:block"
        src="{{ asset('storage/'.$listing->logo) }}"
        alt=""
    />
        @else
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset('images/no-image.png') }}"
            alt=""
        />
        @endif
        <div>
            <h3 class="text-2xl">
                <a href="{{route('job.show',$listing->id) }}">
                    {{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
           <x-listing-tags :tagsCsv='$listing->tags'  />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>

</x-card>

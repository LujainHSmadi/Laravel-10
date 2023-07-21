<x-layout>
    {{-- =========================================================== --}}
                {{-- ====================== Sweet Alert ======================== --}}
                {{-- =========================================================== --}}

                {{-- ===============================================================
                    =========================Header=====================================
                    ====================================================================--}}

        <x-card
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{ $listing->title }}</p>
        </header>

                        <form action="{{ route('job.update',$listing->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label
                                for="company"
                                class="inline-block text-lg mb-2"
                                >Company Name
                                <strong style="color: red">
                                    *
                                    @error('company')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                                </label
                                >
                                <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="company"
                                value="{!! isset($listing->company)? $listing->company : null !!}"

                                />
                            </div>

                            <div class="mb-6">
                                <label for="title" class="inline-block text-lg mb-2"
                                >Job Title
                                <strong style="color: red">
                                    *
                                    @error('title')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                                </label
                                >
                                <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer"
                                value="{!! isset($listing->title)? $listing->title : null !!}"

                                />
                            </div>

                            <div class="mb-6">
                                <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Job Location
                                <strong style="color: red">
                                    *
                                    @error('location')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                                </label
                                >
                                <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Boston MA, etc"
                                value="{!! isset($listing->location)? $listing->location : null !!}"

                                />
                            </div>

                            <div class="mb-6">
                                <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email
                                <strong style="color: red">
                                    *
                                    @error('email')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                                </label
                                >
                                <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{!! isset($listing->email)? $listing->email : null !!}"
                                />
                            </div>

                            <div class="mb-6">
                                <label
                                for="website"
                                class="inline-block text-lg mb-2"
                                >
                                Website/Application URL
                                <strong style="color: red">
                                    *
                                    @error('website')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                            </label>
                            <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="website"
                            value="{!! isset($listing->website)? $listing->website : null !!}"
                            />
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                                <strong style="color: red">
                                    *
                                    @error('tags')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                            </label>
                            <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc"
                            value="{!! isset($listing->tags)? implode(',',$listing->tags) : null !!}"
                            />
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                                <strong style="color: red">
                                    *
                                    @error('logo')
                                        -
                                        {{ $message }}
                                    @enderror
                                </strong>
                            </label>
                            <input
                                    type="file"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="logo"
                                    />

                                    @if(isset($listing->logo))
                                    <img src="{{ asset("storage/".$listing->logo) }}"
                                        class="hidden w-48 mr-6 md:block">
                                    @else
                                    <img
                                    class="hidden w-48 mr-6 md:block"
                                    src="{{ asset('images/no-image.png') }}"
                                    alt=""
                                />
                                    @endif
                                </div>

                                <div class="mb-6">
                                    <label
                                    for="description"
                                    class="inline-block text-lg mb-2"
                                    >
                                    Job Description
                                    <strong style="color: red">
                                        *
                                        @error('description')
                                            -
                                            {{ $message }}
                                        @enderror
                                    </strong>
                                </label>
                                <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                                >
                                {!! isset($listing->description)? $listing->description : null !!}
                            </textarea>
                            </div>

                            <div class="mb-6">
                                <button type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                Update Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
        </x-card>

            </x-layout>

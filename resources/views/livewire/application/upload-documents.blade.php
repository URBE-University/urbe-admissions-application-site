<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800">{{__("Required documents")}}</h2>
                    <p class="mt-1 text-sm text-amber-700 py-2 px-4 bg-amber-100 rounded-md flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        <span>{{__("Please know that you have 30 days from today, to submit your original documents to the University’s postal address.")}}</span>
                    </p>
                </div>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="mt-2 mb-6 w-full border-t border-slate-200"></div>
        </div>

        {{-- Official Transcripts --}}
        <div class="col-span-3">
            <label class="block text-sm font-semibold text-slate-800">{{__("Official Transcripts")}}</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="official_transcripts" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>{{__("Upload a file")}}</span>
                            <input id="official_transcripts" name="official_transcripts" wire:model="official_transcripts" type="file" class="sr-only" accept="application/pdf">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">
                    {{__("PDF up to 4MB")}}
                    </p>
                </div>
            </div>
            <div wire:loading wire:target="official_transcripts" class="mt-1 text-sm text-blue-600">{{__("Uploading...")}}</div>
            @if ($official_transcripts)
                <div class="mt-1 text-sm text-green-600 bg-green-100 rounded-md inline-flex items-center space-x-3 px-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13zm10.857 5.691a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 00-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>{{__("Document ready")}}</span>
                </div>
            @else
                @error('official_transcripts')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            @endif
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Students applying for the undergraduate program must also submit a copy of their official transcripts from their High School and have achieved a minimum grade point average of at least 2.0 (4.0).")}}</p>
        </div>

        {{-- HS / Undergrad Diploma --}}
        <div class="mt-6 col-span-3">
            <label class="block text-sm font-semibold text-slate-800">{{__("High School Diploma / Bachelor's Diploma")}}</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="hs_bs_diploma" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>{{__("Upload a file")}}</span>
                            <input id="hs_bs_diploma" name="hs_bs_diploma" wire:model="hs_bs_diploma" type="file" class="sr-only" accept="application/pdf">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">
                    {{__("PDF up to 4MB")}}
                    </p>
                </div>
            </div>
            <div wire:loading wire:target="hs_bs_diploma" class="mt-1 text-sm text-blue-600">{{__("Uploading...")}}</div>
            @if ($hs_bs_diploma)
                <div class="mt-1 text-sm text-green-600 bg-green-100 rounded-md inline-flex items-center space-x-3 px-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13zm10.857 5.691a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 00-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>{{__("Document ready")}}</span>
                </div>
            @else
                @error('hs_bs_diploma')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            @endif
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Applicants seeking admission into the program of Bachelor in Science that have an Associate Degree diploma from a state licensed, a government recognized institution or an equivalent degree from a regionally accredited institution could be accepted for the completion program after comparing the two sets of curricula and conclude that the courses are eligible for transfer.")}}</p>
        </div>

        {{-- ID or Passport photo --}}

        <div class="mt-6 col-span-3">
            <label class="block text-sm font-semibold text-slate-800">{{__("Valid ID / Passport")}}</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="id_file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>{{__("Upload a file")}}</span>
                            <input id="id_file" name="id_file" wire:model="id_file" type="file" class="sr-only" accept="application/pdf">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">
                    {{__("PDF up to 4MB")}}
                    </p>
                </div>
            </div>
            <div wire:loading wire:target="id_file" class="mt-1 text-sm text-blue-600">{{__("Uploading...")}}</div>
            @if ($id_file)
                <div class="mt-1 text-sm text-green-600 bg-green-100 rounded-md inline-flex items-center space-x-3 px-3 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13zm10.857 5.691a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 00-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>{{__("Document ready")}}</span>
                </div>
            @else
                @error('id_file')
                    <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                @enderror
            @endif
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("If you reside in the US, please attach a copy of your Driver’s License. If you live outside the US, you need to attach a copy of your updated passport.")}}</p>
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])

            <x-jet-button type="submit" wire:click="save">
                {{__("Continue")}}
            </x-jet-button>
        </div>
    </div>
</div>

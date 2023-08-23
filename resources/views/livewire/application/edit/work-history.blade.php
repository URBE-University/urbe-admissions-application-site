<div>
    <button
        wire:click="$toggle('editModal')"
        class="bg-white text-slate-600 text-xs uppercase font-semibold tracking-widest py-1 px-4 rounded-lg border shadow-sm">
        {{__("Edit")}}
    </button>

    <x-jet-dialog-modal wire:model="editModal">
        <x-slot name="title">
            <h2 class="text-3xl font-bold text-slate-800">{{__("Employment information")}}</h2>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </x-slot>
        <x-slot name="content">
            <div class="col-span-3">
                <label for="employed_q" class="block text-sm font-semibold text-slate-800">{{__("Are you currently employed?")}} <span class="text-red-600 font-bold">*</span></label>
                <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Your employer may have a partnership with us OR may help pay for your education.")}}</p>
                <div class="mt-1 flex items-center gap-4">
                    <label for="employed_yes">
                        <input type="radio" name="employed_q" id="employed_yes" wire:model="employed_q" value="yes">
                        {{__("Yes")}}
                    </label>
                    <label for="employed_no">
                        <input type="radio" name="employed_q" id="employed_no" wire:model="employed_q" value="no">
                        {{__("No")}}
                    </label>
                </div>
                @error('employed_q')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            @if ($employed_q === "yes")
                <div class="mt-6 col-span-3">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="employer_name" class="block text-sm font-semibold text-slate-800">{{__("Employer name")}}</label>
                            <input type="text" name="employer_name" id="employer_name" wire:model.defer="employer_name" class="mt-1 w-full">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="job_title" class="block text-sm font-semibold text-slate-800">{{__("Job title")}}</label>
                            <input type="text" name="job_title" id="job_title" wire:model.defer="job_title" class="mt-1 w-full">
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-6 col-span-3">
                <label class="block text-sm font-semibold text-slate-800">{{__("Upload your resume")}}</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>{{__("Upload a file")}}</span>
                            <input id="file-upload" name="file-upload" wire:model.defer="resume" type="file" class="sr-only" accept="application/pdf">
                        </label>
                            <p class="pl-1">{{__("or drag and drop")}}</p>
                        </div>
                        <p class="text-xs text-gray-500">
                        {{__("PDF up to 4MB")}}
                        </p>
                    </div>
                </div>
                <div wire:loading wire:target="resume" class="mt-1 text-sm text-blue-600">{{__("Uploading...")}}</div>
                @if ($resume)
                    <div class="mt-1 text-sm text-green-600">{{__("Document ready")}}</div>

                @else
                    @error('resume')
                        <div class="mt-1 text-sm text-red-600">{{$message}}</div>
                    @enderror
                @endif
                <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Students applying for the graduate program must also submit an updated version of their resume plus a personal statement that describes the applicant’s professional accomplishments and goals. Please include all this information in a single pdf file.")}}</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editModal')">
                {{__("Dismiss")}}
            </x-jet-secondary-button>
            <x-jet-button class="ml-2" wire:click="update">
                {{__("Update")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

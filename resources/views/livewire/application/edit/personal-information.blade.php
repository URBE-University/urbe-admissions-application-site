<div>
    <button
        wire:click="$toggle('editModal')"
        class="bg-white text-slate-600 text-xs uppercase font-semibold tracking-widest py-1 px-4 rounded-lg border shadow-sm">
        {{__("Edit")}}
    </button>

    <x-jet-dialog-modal wire:model="editModal">
        <x-slot name="title">
            <h2 class="text-3xl font-bold text-slate-800">{{__("Personal Information")}}</h2>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </x-slot>
        <x-slot name="content">
            <div class="col-span-3">
                <label for="dob" class="block text-sm font-semibold text-slate-800">{{__("Date of birth")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="date" id="dob" wire:model.defer="dob" class="mt-1 w-full">
                @error('dob')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            @if ( $dob && (Carbon\Carbon::parse($dob)->diffInYears(Carbon\Carbon::now())) < 18 )
            <div class="mt-6 col-span-3 sm:col-span-1">
                <label for="legal_guardian_name" class="block text-sm font-semibold text-slate-800">{{__("Legal Guardian Full Name")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="legal_guardian_name" wire:model="legal_guardian_name" class="mt-1 w-full">
                @error('legal_guardian_name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6 col-span-3 sm:col-span-1">
                <label for="legal_guardian_email" class="block text-sm font-semibold text-slate-800">{{__("Legal Guardian Email")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="legal_guardian_email" wire:model="legal_guardian_email" class="mt-1 w-full">
                @error('legal_guardian_email')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6 col-span-3 sm:col-span-1">
                <label for="legal_guardian_relation" class="block text-sm font-semibold text-slate-800">{{__("How is this person related to you? (i.e:father, mother, sibling...)")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="legal_guardian_relation" wire:model="legal_guardian_relation" class="mt-1 w-full">
                @error('legal_guardian_relation')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
        @endif

            <div class="mt-6 col-span-3">
                <label for="us_resident" class="block text-sm font-semibold text-slate-800">{{__("Are you a U.S citizen or resident?")}} <span class="text-red-600 font-bold">*</span></label>
                <div class="mt-1 flex items-center gap-4">
                    <label for="us_resident_yes">
                        <input type="radio" name="us_resident" id="us_resident_yes" wire:model.defer="us_resident" value="yes">
                        {{__("Yes")}}
                    </label>
                    <label for="us_resident_no">
                        <input type="radio" name="us_resident" id="us_resident_no" wire:model.defer="us_resident" value="no">
                        {{__("No")}}
                    </label>
                </div>
                @error('us_resident')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6 col-span-3">
                <label for="ssn" class="block text-sm font-semibold text-slate-800">{{__("Social Security / Passport No.")}}</label>
                <input type="password" id="ssn" wire:model.defer="ssn" class="mt-1 w-full" autocomplete="off">
                <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Your Social Security Number helps us collect your transcripts and is needed to process financial information. It will may also assist the University in preparing important tax documents help you when you file income taxes in the future.")}}</p>
            </div>

            <div class="mt-6 col-span-3">
                <label for="military" class="block text-sm font-semibold text-slate-800">{{__("Are you a current or former member of the U.S. Armed Forces, or a dependent, spouse or widow of a member of the U.S. Armed Forces?")}} <span class="text-red-600 font-bold">*</span></label>
                <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("If you're associated with the military, you may be eligible for special tuition rates.")}}</p>
                <div class="mt-1 flex items-center gap-4">
                    <label for="military_yes">
                        <input type="radio" name="military" id="military_yes" wire:model.defer="military" value="yes">
                        {{__("Yes")}}
                    </label>
                    <label for="military_no">
                        <input type="radio" name="military" id="military_no" wire:model.defer="military" value="no">
                        {{__("No")}}
                    </label>
                </div>
                @error('military')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6 col-span-3">
                <label for="military_civilian" class="block text-sm font-semibold text-slate-800">{{__("Are you employed as a civilian with the Department of Defense or the Coast Guard?")}} <span class="text-red-600 font-bold">*</span></label>
                <div class="mt-1 flex items-center gap-4">
                    <label for="military_civilian_yes">
                        <input type="radio" name="military_civilian" id="military_civilian_yes" wire:model.defer="military_civilian" value="yes">
                        {{__("Yes")}}
                    </label>
                    <label for="military_civilian_no">
                        <input type="radio" name="military_civilian" id="military_civilian_no" wire:model.defer="military_civilian" value="no">
                        {{__("No")}}
                    </label>
                </div>
                @error('military_civilian')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
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

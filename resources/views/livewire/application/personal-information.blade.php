<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-[#073260]">{{__("Personal Information")}}</h2>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </div>

        <div class="col-span-3">
            <label for="gender" class="block text-sm font-semibold text-slate-800">{{__("Gender")}} <span class="text-red-600 font-bold">*</span></label>
            <select id="gender" wire:model="gender" class="mt-1 w-full">
                <option selected="selected" >-- {{ __("select one") }} --</option>
                <option value="female">{{__("Female")}}</option>
                <option value="male">{{__("Male")}}</option>
                <option value="non-binary">{{__("Non binary")}}</option>

            </select>
            @error('gender')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="ethnicity" class="block text-sm font-semibold text-slate-800">{{__("Ethnicity")}} <span class="text-red-600 font-bold">*</span></label>
            <select id="ethnicity" wire:model="ethnicity" class="mt-1 w-full">
                <option selected="selected" >-- {{ __("select one") }} --</option>
                <optgroup label="White">
                  <option value="White English">English</option>
                  <option value="White Welsh">Welsh</option>
                  <option value="White Scottish">Scottish</option>
                  <option value="White Northern Irish">Northern Irish</option>
                  <option value="White Irish">Irish</option>
                  <option value="White Gypsy or Irish Traveller">Gypsy or Irish Traveller</option>
                  <option value="White Other">Any other White background</option>
                </optgroup>
                <optgroup label="Mixed or Multiple ethnic groups">
                  <option value="Mixed White and Black Caribbean">White and Black Caribbean</option>
                  <option value="Mixed White and Black African">White and Black African</option>
                  <option value="Mixed White Other">Any other Mixed or Multiple background</option>
                </optgroup>
                <optgroup label="Asian">
                  <option value="Asian Indian">Indian</option>
                  <option value="Asian Pakistani">Pakistani</option>
                  <option value="Asian Bangladeshi">Bangladeshi</option>
                  <option value="Asian Chinese">Chinese</option>
                  <option value="Asian Other">Any other Asian background</option>
                </optgroup>
                <optgroup label="Black">
                  <option value="Black African">African</option>
                  <option value="Black African American">African American</option>
                  <option value="Black Caribbean">Caribbean</option>
                  <option value="Black Other">Any other Black background</option>
                </optgroup>
                <optgroup label="Other ethnic groups">
                  <option value="Arab">Arab</option>
                  <option value="Hispanic">Hispanic</option>
                  <option value="Latino">Latino</option>
                  <option value="Native American">Native American</option>
                  <option value="Pacific Islander">Pacific Islander</option>
                  <option value="Other">Any other ethnic group</option>
                </optgroup>
            </select>
            @error('ethnicity')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="dob" class="block text-sm font-semibold text-slate-800">{{__("Date of birth")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="date" id="dob" wire:model="dob" class="mt-1 w-full">
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
                    <input type="radio" name="us_resident" id="us_resident_yes" wire:model="us_resident" value="yes">
                    {{__("Yes")}}
                </label>
                <label for="us_resident_no">
                    <input type="radio" name="us_resident" id="us_resident_no" wire:model="us_resident" value="no">
                    {{__("No")}}
                </label>
            </div>
            @error('us_resident')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="ssn" class="block text-sm font-semibold text-slate-800">{{__("SSN (last four digits)")}}</label>
            <input type="number" id="ssn" wire:model="ssn" class="mt-1 w-full" autocomplete="off" maxlength="4">
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Your Social Security Number helps us collect your transcripts and is needed to process financial information. It will may also assist the University in preparing important tax documents help you when you file income taxes in the future.")}}</p>
        </div>

        <div class="mt-6 col-span-3">
            <label for="dl_passport" class="block text-sm font-semibold text-slate-800">{{__("Drivers License/Passport")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" id="dl_passport" wire:model="dl_passport" class="mt-1 w-full" autocomplete="off">
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("Please only enter valid drivers license or passport number.")}}</p>
            @error('dl_passport')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="military" class="block text-sm font-semibold text-slate-800">{{__("Are you a current or former member of the U.S. Armed Forces, or a dependent, spouse or widow of a member of the U.S. Armed Forces?")}} <span class="text-red-600 font-bold">*</span></label>
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("If you're associated with the military, you may be eligible for special tuition rates.")}}</p>
            <div class="mt-1 flex items-center gap-4">
                <label for="military_yes">
                    <input type="radio" name="military" id="military_yes" wire:model="military" value="yes">
                    {{__("Yes")}}
                </label>
                <label for="military_no">
                    <input type="radio" name="military" id="military_no" wire:model="military" value="no">
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
                    <input type="radio" name="military_civilian" id="military_civilian_yes" wire:model="military_civilian" value="yes">
                    {{__("Yes")}}
                </label>
                <label for="military_civilian_no">
                    <input type="radio" name="military_civilian" id="military_civilian_no" wire:model="military_civilian" value="no">
                    {{__("No")}}
                </label>
            </div>
            @error('military_civilian')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])

            <x-jet-button type="submit" wire:click="save">
                {{__("Continue")}}
            </x-jet-button>
        </div>
    </div>
</div>

<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-[#073260]">{{__("Education background")}}</h2>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </div>

        <div class="col-span-3">
            <label for="education_level" class="block text-sm font-semibold text-slate-800">{{__("Highschool/secondary Education")}} <span class="text-red-600 font-bold">*</span></label>
            <select name="education_level" id="education_level" wire:model="education_level" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                <option value="High School Diploma">{{__("High School Diploma")}}</option>
                <option value="GED">{{__("GED")}}</option>
                <option value="Home Schooled">{{__("Home Schooled")}}</option>
                <option value="Other">{{__("Other")}}</option>
            </select>
            @error('education_level')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("If you received an alternative diploma or a diploma other than a high school diploma, please select 'Other'. In the U.S, this is high school or GED; outside the U.S., this can be high school, lyceum, gymnasium or secondary school.")}}</p>
        </div>

        <div class="mt-6 col-span-3">
            <label for="hs_name" class="block text-sm font-semibold text-slate-800">{{__("School name")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" name="hs_name" id="hs_name" wire:model="hs_name" class="mt-1 w-full">
            @error('hs_name')
                <span class="text-sm text-red-600">{{__("The school name is required.")}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="hs_city" class="block text-sm font-semibold text-slate-800">{{__("School city")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" name="hs_city" id="hs_city" wire:model="hs_city" class="mt-1 w-full">
            @error('hs_city')
                <span class="text-sm text-red-600">{{__("The school city is required.")}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="hs_country" class="block text-sm font-semibold text-slate-800">{{__("School country")}} <span class="text-red-600 font-bold">*</span></label>
            <select name="hs_country" id="hs_country" wire:model="hs_country" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                @include('partials.country-name-codes')
            </select>
            @error('hs_country')
                <span class="text-sm text-red-600">{{__("The school country is required.")}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="hs_completion_date" class="block text-sm font-semibold text-slate-800">{{__("Date of completion")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="date" name="hs_completion_date" id="hs_completion_date" wire:model="hs_completion_date" class="mt-1 w-full">
            @error('hs_completion_date')
                <span class="text-sm text-red-600">{{__("The completion date is required.")}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 w-full border-t border-slate-200"></div>

        {{-- Post Secondary Details --}}

        <div class="mt-6 col-span-3">
            <label for="ps_school_q" class="block text-sm font-semibold text-slate-800">{{__("Have you taken courses at a college or university, technical or trade school, or other higher education institution?")}}</label>
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("The actual value of your credits - particularly those earned through testing programs, trade schools, military education and non-North American schools, for example -- will be manually assessed and verified, and can impact your tuition and fees reduction amount.")}}</p>
            <div class="mt-1 flex items-center gap-4">
                <label for="ps_school_yes">
                    <input type="radio" name="ps_school_q" id="ps_school_yes" wire:model="ps_school_q" value="yes">
                    {{__("Yes")}}
                </label>
                <label for="ps_school_no">
                    <input type="radio" name="ps_school_q" id="ps_school_no" wire:model="ps_school_q" value="no">
                    {{__("No")}}
                </label>
            </div>
            @error('ps_school_q')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        @if ($ps_school_q === "yes")
        <div class="mt-6 col-span-3">
            <label for="ps_school_name" class="block text-sm font-semibold text-slate-800">{{__("Institution name")}}</label>
            <input type="text" wire:model="ps_school_name" id="ps_school_name" class="mt-1 w-full">
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="ps_school_city" class="block text-sm font-semibold text-slate-800">{{__("Institution city")}}</label>
            <input type="text" wire:model="ps_school_city" id="ps_school_city" class="mt-1 w-full">
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="ps_school_country" class="block text-sm font-semibold text-slate-800">{{__("Institution country")}}</label>
            <select name="ps_school_country" id="ps_school_country" wire:model="ps_school_country" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                @forelse (App\Models\Countries::getCountryCodes() as $country_code)
                    <option value="{{$country_code['name']}}">{{ $country_code['name']}}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="mt-6 col-span-3 sm:col-span-1">
            <label for="degree_earned" class="block text-sm font-semibold text-slate-800">{{__("Degree earned")}}</label>
            <select name="degree_earned" id="degree_earned" wire:model="degree_earned" class="mt-1 w-full">
                <option value="" selected="selected" class="gf_placeholder">Select</option>
                <option value="Associate Degree in Nursing">Associate Degree in Nursing</option>
                <option value="Associate in General Studies">Associate in General Studies</option>
                <option value="Associate in Occupational Studies">Associate in Occupational Studies</option>
                <option value="Associate in Applied Sciences">Associate in Applied Sciences</option>
                <option value="Associate of Arts">Associate of Arts</option>
                <option value="Bachelor of Arts">Bachelor of Arts</option>
                <option value="Bachelor of Commerce">Bachelor of Commerce</option>
                <option value="Bachelor of Fine Arts">Bachelor of Fine Arts</option>
                <option value="Bachelor of Liberal Arts">Bachelor of Liberal Arts</option>
                <option value="Bachelor of Science">Bachelor of Science</option>
                <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                <option value="Certificate">Certificate</option>
                <option value="CSU">CSU</option>
                <option value="Doctoral">Doctoral</option>
                <option value="IGETC">IGETC</option>
                <option value="Juris Doctorate">Juris Doctorate</option>
                <option value="Master of Arts">Master of Arts</option>
                <option value="Master of Arts in Education">Master of Arts in Education</option>
                <option value="Master of Business Administration">Master of Business Administration</option>
                <option value="Master of Counseling">Master of Counseling</option>
                <option value="Master of Management">Master of Management</option>
                <option value="Master of Public Health Administration">Master of Public Health Administration</option>
                <option value="Master of Science">Master of Science</option>
                <option value="Master of Science in Nursing">Master of Science in Nursing</option>
                <option value="Medical Doctorate">Medical Doctorate</option>
                <option value="Nursing Diploma">Nursing Diploma</option>
            </select>
        </div>
        @endif

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])
            <x-jet-button type="submit" wire:click="save">
                {{__("Continue")}}
            </x-jet-button>
        </div>
    </div>
</div>

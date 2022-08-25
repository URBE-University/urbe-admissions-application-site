<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-[#073260]">{{__("Contact details")}}</h2>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </div>

        {{-- Student Name --}}
        <div class="col-span-3 sm:col-span-1">
            <label for="first_name" class="block text-sm font-semibold text-slate-800">{{__("First Name")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" id="first_name" wire:model="first_name" class="mt-1 w-full">
            @error('first_name')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="col-span-3 sm:col-span-1">
            <label for="middle_name" class="block text-sm font-semibold text-slate-800">{{__("Middle Name")}}</label>
            <input type="text" id="middle_name" wire:model="middle_name" class="mt-1 w-full">
        </div>

        <div class="col-span-3 sm:col-span-1">
            <label for="last_name" class="block text-sm font-semibold text-slate-800">{{__("Last Name")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" id="last_name" wire:model="last_name" class="mt-1 w-full">
            @error('last_name')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        {{-- Previous Name --}}
        <div class="col-span-3 mt-6">
            <div class="">{{__("Do you have any previous legal names?")}}</div>
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("If you have any previous names, such as a maiden name, please let us know. It helps when requesting transcripts from previous schools where your name might be different.")}}</p>
            <div class="mt-1 flex items-center gap-4">
                <label for="prev_name_yes">
                    <input type="radio" name="prev_name" id="prev_name_yes" wire:model="prev_name_q" value="yes">
                    {{__("Yes")}}
                </label>
                <label for="prev_name_no">
                    <input type="radio" name="prev_name" id="prev_name_no" wire:model="prev_name_q" value="no">
                    {{__("No")}}
                </label>
            </div>
        </div>

        @if ($prev_name_q == 'yes')
        <div class="col-span-3 sm:col-span-1">
            <label for="prev_first_name" class="block text-sm font-semibold text-slate-800">{{__("Previous First Name")}}</label>
            <input type="text" id="prev_first_name" wire:model="prev_first_name" class="mt-1 w-full">
        </div>

        <div class="col-span-3 sm:col-span-1">
            <label for="prev_middle_name" class="block text-sm font-semibold text-slate-800">{{__("Previous Middle Name")}}</label>
            <input type="text" id="prev_middle_name" wire:model="prev_middle_name" class="mt-1 w-full">
        </div>

        <div class="col-span-3 sm:col-span-1">
            <label for="prev_last_name" class="block text-sm font-semibold text-slate-800">{{__("Previous Last Name")}}</label>
            <input type="text" id="prev_last_name" wire:model="prev_last_name" class="mt-1 w-full">
        </div>
        @endif

        {{-- Email Address --}}
        <div class="col-span-3 mt-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <label for="email" class="block text-sm font-semibold text-slate-800">{{__("Enter your email address")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="email" name="email" id="email" wire:model="email" class="mt-1 w-full">
                    @error('email')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="email_confirmation" class="block text-sm font-semibold text-slate-800">{{__("Confirm your email address")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="email" name="email_confirmation" id="email_confirmation" wire:model="email_confirmation" class="mt-1 w-full">
                </div>
                <div class="col-span-2">
                    <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("By entering your email address you are consenting to the University sending you notifications, updates, requests for information, and/or marketing information concerning URBE University.")}}</p>
                </div>

                <div class="col-span-2 sm:col-span-1 mt-6">
                    <label for="phone_code" class="block text-sm font-semibold text-slate-800">{{__("Select your country code")}} <span class="text-red-600 font-bold">*</span></label>
                    <select name="phone_code" id="phone_code" class="mt-1 w-full" wire:model.defer="phone_code">
                        <option>{{__("Select")}}</option>
                        @include('partials.country-phone-codes')
                    </select>
                    @error('phone_code')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1 mt-6">
                    <label for="phone" class="block text-sm font-semibold text-slate-800">{{__("Enter your phone number")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="tel" name="'phone" id="phone" wire:model="phone" class="mt-1 w-full">
                    @error('phone')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Postal Address --}}
        <div class="mt-6 col-span-3">
            <label for="street" class="block text-sm font-semibold text-slate-800">{{__("Postal address")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="text" id="street" wire:model="street" class="mt-1 w-full">
            @error('street')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="col-span-3">
            <label for="street_ext" class="block text-sm font-semibold text-slate-800">{{__("Postal address line 2")}}</label>
            <input type="text" id="street_ext" wire:model="street_ext" class="mt-1 w-full">
        </div>
        <div class="col-span-3">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <label for="city" class="block text-sm font-semibold text-slate-800">{{__("City")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="text" id="city" wire:model="city" class="mt-1 w-full">
                    @error('city')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="state" class="block text-sm font-semibold text-slate-800">{{__("State/Province")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="text" id="state" wire:model="state" class="mt-1 w-full">
                    @error('state')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="zip" class="block text-sm font-semibold text-slate-800">{{__("Zip/Postal code")}} <span class="text-red-600 font-bold">*</span></label>
                    <input type="text" id="zip" wire:model="zip" class="mt-1 w-full">
                    @error('zip')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="country" class="block text-sm font-semibold text-slate-800">{{__("Country")}} <span class="text-red-600 font-bold">*</span></label>
                    <select name="country" id="country" wire:model="country" class="mt-1 w-full">
                        <option>{{__("Select")}}</option>
                        @include('partials.country-name-codes')
                    </select>
                    @error('country')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Disclaimer --}}
        <div class="mt-6 col-span-3">
            <p class="w-full text-justify mt-1 text-xs text-slate-600">{{__("By clicking 'Continue' you are giving your express written consent for URBE University to contact you for marketing purposes concerning its educational programs and services using automated technology for calls and periodic texts to any number you provide. Message and data rates may apply. This consent is not required to purchase goods and services. This consent is not required to complete an application for admission to URBE University. If you wish to complete an application for admission without providing this consent, please request information by contacting the University directly at (844) 744-URBE. If you no longer wish to receive marketing text messages, reply STOP to cancel such future text messages. If you no longer wish to receive automated marketing phone calls, you may opt out by expressing your preference to an enrollment representative or by emailing optmeout@urbe.university")}}</p>
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            <x-jet-button type="submit" wire:click="save">
                {{__("Continue")}}
            </x-jet-button>
        </div>
    </div>
</div>

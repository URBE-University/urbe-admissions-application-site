<div>
    <button
        wire:click="$toggle('editModal')"
        class="bg-white text-slate-600 text-xs uppercase font-semibold tracking-widest py-1 px-4 rounded-lg border shadow-sm">
        {{__("Edit")}}
    </button>

    <x-jet-dialog-modal wire:model="editModal">
        <x-slot name="title">
            <h2 class="text-3xl font-bold text-slate-800">{{__("Contact Details")}}</h2>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </x-slot>
        <x-slot name="content">
            {{-- Student Name --}}
            <div class="col-span-3 sm:col-span-1">
                <label for="first_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("First Name")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="first_name" wire:model.defer="first_name" class="mt-1 w-full">
                @error('first_name')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>

            <div class="col-span-3 sm:col-span-1">
                <label for="middle_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Middle Name")}}</label>
                <input type="text" id="middle_name" wire:model.defer="middle_name" class="mt-1 w-full">
            </div>

            <div class="col-span-3 sm:col-span-1">
                <label for="last_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Last Name")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="last_name" wire:model.defer="last_name" class="mt-1 w-full">
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
                <label for="prev_first_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Previous First Name")}}</label>
                <input type="text" id="prev_first_name" wire:model.defer="prev_first_name" class="mt-1 w-full">
            </div>

            <div class="col-span-3 sm:col-span-1">
                <label for="prev_middle_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Previous Middle Name")}}</label>
                <input type="text" id="prev_middle_name" wire:model.defer="prev_middle_name" class="mt-1 w-full">
            </div>

            <div class="col-span-3 sm:col-span-1">
                <label for="prev_last_name" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Previous Last Name")}}</label>
                <input type="text" id="prev_last_name" wire:model.defer="prev_last_name" class="mt-1 w-full">
            </div>
            @endif

            {{-- Email Address --}}
            <div class="col-span-3 mt-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Enter your email address")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="email" name="email" id="email" wire:model.defer="email" class="mt-1 w-full">
                        @error('email')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="email_confirmation" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Confirm your email address")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="email" name="email_confirmation" id="email_confirmation" wire:model.defer="email_confirmation" class="mt-1 w-full">
                    </div>
                    <div class="col-span-2">
                        <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("By entering your email address you are consenting to the University sending you notifications, updates, requests for information, and/or marketing information concerning URBE University.")}}</p>
                    </div>

                    <div class="col-span-2 sm:col-span-1 mt-6">
                        <label for="phone_code" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Select your country code")}} <span class="text-red-600 font-bold">*</span></label>
                        <select name="phone_code" id="phone_code" class="mt-1 w-full" wire:model.defer="phone_code">
                            <option>{{__("Select")}}</option>
                            @include('partials.country-phone-codes')
                        </select>
                        @error('phone_code')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1 mt-6">
                        <label for="phone" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Enter your phone number")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="tel" name="'phone" id="phone" wire:model.defer="phone" class="mt-1 w-full">
                        @error('phone')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Postal Address --}}
            <div class="mt-6 col-span-3">
                <label for="street" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Postal address")}} <span class="text-red-600 font-bold">*</span></label>
                <input type="text" id="street" wire:model.defer="street" class="mt-1 w-full">
                @error('street')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
            <div class="col-span-3">
                <label for="street_ext" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Postal address line 2")}}</label>
                <input type="text" id="street_ext" wire:model.defer="street_ext" class="mt-1 w-full">
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="city" class="mt-2 block text-sm font-semibold text-slate-800">{{__("City")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="text" id="city" wire:model.defer="city" class="mt-1 w-full">
                        @error('city')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="state" class="mt-2 block text-sm font-semibold text-slate-800">{{__("State/Province")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="text" id="state" wire:model.defer="state" class="mt-1 w-full">
                        @error('state')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="zip" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Zip/Postal code")}} <span class="text-red-600 font-bold">*</span></label>
                        <input type="text" id="zip" wire:model.defer="zip" class="mt-1 w-full">
                        @error('zip')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="country" class="mt-2 block text-sm font-semibold text-slate-800">{{__("Country")}} <span class="text-red-600 font-bold">*</span></label>
                        <select name="country" id="country" wire:model.defer="country" class="mt-1 w-full">
                            <option>{{__("Select")}}</option>
                            @include('partials.country-name-codes')
                        </select>
                        @error('country')
                            <span class="text-sm text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-span-3">
                <div class="block font-semibold text-slate-800">{{ __("Are you interested in applying for a student visa?") }}</div>
                <p class="w-full text-justify mt-2 text-sm text-slate-600">{{__("Only check this box if you are interested on applying for a student visa.")}}</p>
                <label for="is_visa" class="mt-1 flex items-center space-x-3">
                    <input type="checkbox" name="is_visa" id="is_visa" wire:model="is_visa">
                    <span class="text-sm">
                        {{__("Yes. I am interested in applying for a student visa.")}}
                    </span>
                </label>
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

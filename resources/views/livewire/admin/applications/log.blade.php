<div class="flex items-center">
    <button wire:click="$toggle('modal')" class="p-1 text-black bg-slate-200 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M3.25 3A2.25 2.25 0 001 5.25v9.5A2.25 2.25 0 003.25 17h13.5A2.25 2.25 0 0019 14.75v-9.5A2.25 2.25 0 0016.75 3H3.25zm.943 8.752a.75.75 0 01.055-1.06L6.128 9l-1.88-1.693a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 01-1.06-.055zM9.75 10.25a.75.75 0 000 1.5h2.5a.75.75 0 000-1.5h-2.5z" clip-rule="evenodd" />
        </svg>
    </button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">Application progress</x-slot>
        <x-slot name="content">
            <div class="bg-black text-green-600 rounded-lg p-4">
                @forelse ($logs as $item => $log)
                    <p class="my-1 p-2 flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $log->description }}</span>
                    </p>
                @empty

                @endforelse
            </div>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-jet-dialog-modal>
</div>

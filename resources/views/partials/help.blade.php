<div class="fixed bottom-0 right-left z-50 mb-4 ml-4 text-left" x-data="{ helpMenu : false }">
    <div class="bg-white rounded-md shadow z-auto p-4 text-sm mb-2" x-show="helpMenu" @click.outside="helpMenu = ! helpMenu" x-cloak>
        <ul class="text-left flex flex-col">
            <li>
                <a class="inline-flex items-center gap-2 p-2 rounded hover:bg-sky-50 group hover:text-sky-600 transition-all duration-300" href="mailto:admissions@urbe.university?subject=Question about admissions at URBE">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:-rotate-45 transition-all duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    <span>Send us an email</span>
                </a>
            </li>
            <li>
                <a class="flex items-center gap-2 p-2 rounded hover:bg-sky-50 group hover:text-sky-600 transition-all duration-300" href="tel:+18447448723">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:scale-110 transition-all duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0l-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                    </svg>
                    <span>Give us a call</span>
                </a>
            </li>
        </ul>
    </div>
    <button @click="helpMenu = ! helpMenu" class="px-5 py-3 rounded-full bg-sky-500/90 text-xs uppercase font-semibold tracking-wider backdrop-blur-sm text-white">Need help?</button>
</div>

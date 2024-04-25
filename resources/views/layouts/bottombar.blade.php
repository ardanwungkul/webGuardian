<div class="fixed z-50 w-full h-16 -translate-x-1/2 bottom-4 left-1/2 px-3 md:hidden">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto cp-1 border border-gray-200 rounded-full  ">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-emerald-100 group rounded-l-full">
            <button data-tooltip-target="tooltip-home" type="button" class="">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                    <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                </svg>
                <span class="sr-only">Dashboard</span>
            </button>
        </a>
        <div id="tooltip-home" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
            Dashboard
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        {{-- Domain --}}
        <a href="{{ route('domain.index') }}"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-emerald-100 group">
            <button data-tooltip-target="tooltip-domain" type="button" class="">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                    <path
                        d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                </svg>
                <span class="sr-only">Domain</span>
            </button>
        </a>
        <div id="tooltip-domain" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
            Domain
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>



        {{-- Menu --}}
        <div class="flex items-center justify-center">
            <div class="menu">
                <input type="checkbox" id="toogle" class="hidden-trigger">
                <label for="toogle"
                    class="circle hover:cursor-pointer hover:bg-emerald-100 rounded-full fill-gray-700 hover:fill-gray-900 hover:border-none scale-75">
                    <div class=" flex justify-center items-center w-full h-full">
                        <div class=" w-6">
                            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m22 16.75c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z"
                                    fill-rule="nonzero" />
                            </svg>
                        </div>
                    </div>
                </label>
                <div class="subs">
                    {{-- Invoice --}}
                    <div id="tooltip-invoice-create" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border rounded-lg shadow-sm opacity-0 tooltip text-xs  whitespace-nowrap">
                        Buat Invoice
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-invoice-create">
                        <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger"
                            onclick=" window.location.href='/invoice/create'">
                        <label for="sub1">
                            <div class="flex items-center justify-center h-full fill-gray-500 hover:fill-black">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11.363 2c4.155 0 2.637 6 2.637 6s6-1.65 6 2.457v11.543h-16v-20h7.363zm.826-2h-10.189v24h20v-14.386c0-2.391-6.648-9.614-9.811-9.614zm4.811 13h-2.628v3.686h.907v-1.472h1.49v-.732h-1.49v-.698h1.721v-.784zm-4.9 0h-1.599v3.686h1.599c.537 0 .961-.181 1.262-.535.555-.658.587-2.034-.062-2.692-.298-.3-.712-.459-1.2-.459zm-.692.783h.496c.473 0 .802.173.915.644.064.267.077.679-.021.948-.128.351-.381.528-.754.528h-.637v-2.12zm-2.74-.783h-1.668v3.686h.907v-1.277h.761c.619 0 1.064-.277 1.224-.763.095-.291.095-.597 0-.885-.16-.484-.606-.761-1.224-.761zm-.761.732h.546c.235 0 .467.028.576.228.067.123.067.366 0 .489-.109.199-.341.227-.576.227h-.546v-.944z" />
                                </svg>
                            </div>
                        </label>
                    </button>
                    {{-- Domain Expired --}}
                    <div id="tooltip-domain-expired" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border rounded-lg shadow-sm opacity-0 tooltip text-xs  whitespace-nowrap">
                        Domain Expired
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-domain-expired">
                        <input value="2" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger"
                            onclick='window.location.href="/domains/expired"'>
                        <label for="sub2">
                            <div class="flex items-center justify-center h-full fill-gray-500 hover:fill-black">
                                <svg width="20" height="20" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" />
                                </svg>
                            </div>
                        </label>
                    </button>
                    {{-- Soon Expired --}}
                    <div id="tooltip-domani-soon-expired" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-gray-900 border rounded-lg shadow-sm opacity-0 tooltip text-xs  whitespace-nowrap">
                        Soon Expired
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button class="sub-circle" data-tooltip-target="tooltip-domani-soon-expired">
                        <input value="3" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger"
                            onclick=" window.location.href='/domains/soonExpired'">
                        <label for="sub3">
                            <div class="flex items-center justify-center h-full fill-gray-500 hover:fill-black">
                                <svg viewBox="0 0 24 24" width="20" height="20">
                                    <path
                                        d="M12,6a1,1,0,0,0-1,1v5a1,1,0,0,0,.293.707l3,3a1,1,0,0,0,1.414-1.414L13,11.586V7A1,1,0,0,0,12,6Z M23.812,10.132A12,12,0,0,0,3.578,3.415V1a1,1,0,0,0-2,0V5a2,2,0,0,0,2,2h4a1,1,0,0,0,0-2H4.827a9.99,9.99,0,1,1-2.835,7.878A.982.982,0,0,0,1,12a1.007,1.007,0,0,0-1,1.1,12,12,0,1,0,23.808-2.969Z">
                                    </path>
                                </svg>
                            </div>
                        </label>
                    </button>

                </div>
            </div>
        </div>

        {{-- Youtube --}}
        <a href="{{ route('youtube.index') }}"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-emerald-100 group">
            <button data-tooltip-target="tooltip-youtube" type="button" class="">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 -3 20 20">
                    <g id="SVGRepo_iconCarrier">
                        <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7442.000000)">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="sr-only">Youtube</span>
            </button>
        </a>
        <div id="tooltip-youtube" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
            Youtube
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        {{-- Logout --}}
        <div class="inline-flex flex-col items-center justify-center  rounded-r-full hover:bg-emerald-100 group">
            <form method="POST" action="{{ route('logout') }}" class="">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
            this.closest('form').submit();"
                    class=" px-5 flex items-center justify-center">
                    <button data-tooltip-target="tooltip-youtube" type="button" class="">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            viewBox="0 0 20 18">
                            <path d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" stroke-width="2">
                            </path>
                        </svg>
                        <span class="sr-only">Youtube</span>
                    </button>
                </a>
            </form>
        </div>
        <div id="tooltip-youtube" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
            Youtube
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</div>

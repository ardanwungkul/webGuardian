<div id="mySidebar" class="sidebar cp-1 md:flex flex-col gap-3 pt-10 px-1 hidden">

    <ul class="space-y-2 font-medium relative h-full">
        <li class="item-sidebar">
            <a href="{{ route('dashboard') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                    <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                </svg>
                <span class="ml-3 text-hidden">Dashboard</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('kategori.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                </svg>
                <span class="ml-3 text-hidden">Kategori</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('domain.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                    <path
                        d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                </svg>
                <span class="ml-3 text-hidden">Domain Client</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('user.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
                <span class="ml-3 text-hidden">User</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('youtube.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg viewBox="0 -3 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white">
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
                <span class="ml-3 text-hidden">Video Tutorial</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('report.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                    version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 297.001 297.001"
                    xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path
                                    d="M181.951,221.679c-2.128,0-4.168-0.845-5.674-2.35l-28.712-28.712c-4.43,6.591-7.02,14.517-7.02,23.039
                                    c0,22.831,18.574,41.405,41.405,41.405c20.087,0,36.871-14.378,40.619-33.382L181.951,221.679L181.951,221.679z" />
                                <path d="M181.951,172.251c-8.521,0-16.447,2.589-23.038,7.02l26.361,26.362h37.296
                                    C218.824,186.629,202.039,172.251,181.951,172.251z" />
                                <path
                                    d="M247.253,32.953h-33.063v9.721c0,12.809-10.421,23.23-23.23,23.23h-84.919c-12.809,0-23.23-10.421-23.23-23.23v-9.721
                                    H49.748c-4.719,0-8.557,3.838-8.557,8.556v246.935c0,4.719,3.838,8.557,8.557,8.557h197.506c4.719,0,8.557-3.838,8.557-8.557
                                    V41.509C255.811,36.791,251.972,32.953,247.253,32.953z M66.12,90.3h82.38c4.431,0,8.023,3.592,8.023,8.023
                                    c0,4.431-3.592,8.023-8.023,8.023H66.12c-4.431,0-8.023-3.592-8.023-8.023C58.097,93.892,61.69,90.3,66.12,90.3z M115.548,172.25
                                    H66.12c-4.431,0-8.023-3.592-8.023-8.023c0-4.431,3.592-8.023,8.023-8.023h49.428c4.431,0,8.023,3.592,8.023,8.023
                                    C123.571,168.658,119.979,172.25,115.548,172.25z M115.548,139.298H66.12c-4.431,0-8.023-3.592-8.023-8.023
                                    c0-4.431,3.592-8.023,8.023-8.023h49.428c4.431,0,8.023,3.592,8.023,8.023C123.571,135.705,119.979,139.298,115.548,139.298z
                                        M181.951,271.107c-31.678,0-57.451-25.773-57.451-57.451c0-31.679,25.773-57.452,57.451-57.452
                                    c31.679,0,57.452,25.773,57.452,57.452C239.404,245.334,213.631,271.107,181.951,271.107z" />
                                <path d="M106.042,49.858h84.919c3.962,0,7.184-3.222,7.184-7.184V23.66c0-3.962-3.222-7.184-7.184-7.184h-25.983
                                    c-4.431,0-8.023-3.592-8.023-8.023c0-4.661-3.792-8.453-8.453-8.453c-4.661,0-8.453,3.792-8.453,8.453
                                    c0,4.431-3.592,8.023-8.023,8.023h-25.983c-3.962,0-7.184,3.222-7.184,7.184v19.014C98.857,46.636,102.079,49.858,106.042,49.858
                                    z" />
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="ml-3 text-hidden">Report SEO</span>
            </a>
        </li>
        <li class="item-sidebar">
            <a href="{{ route('folder.index') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75 dark:fill-gray-400 group-hover:fill-gray-900 dark:group-hover:fill-white"
                    version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" xml:space="preserve">
                    <path fill-rule="evenodd"
                        d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-3 text-hidden">Folder Spintax</span>
            </a>
        </li>

        <li class="item-sidebar absolute bottom-10 w-full">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
            this.closest('form').submit();"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white flex items-center"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 20 18">
                        <path d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" stroke-width="2">
                        </path>

                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap text-hidden">Logout</span>
                </a>
            </form>
        </li>
    </ul>
    <button class="togglebtn w-3" id="togglebtn" onclick="toggleNav()">
        <svg class="w-7 h-7 z-10 text-white cp-1 rounded-full p-1" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" style="display: none" id="arrow-right" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            <path stroke="currentColor" id="arrow-left" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
        </svg>
    </button>
</div>

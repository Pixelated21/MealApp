<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
<style>
    html {
        overflow: auto;
    }
    ::-webkit-scrollbar {
        background: black;
        width: 1px;  /* Remove scrollbar space */
        /*background: transparent;  !* Optional: just make scrollbar invisible *!*/
    }
    /* Optional: show position indicator in red */
    ::-webkit-scrollbar-thumb {
        color: black;
        background: #ffffff;
    }
</style>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<header class="bg-black h-1/12 flex border-b-2 border-white" x-data="{ isOpen: false }">
    <nav class="container px-6 py-6  mx-auto md:flex te md:justify-between md:items-center">
        <div class="flex items-center justify-between sna">
            <a style="animation-iteration-count: infinite" class="text-xl animate__zoomInDown font-bold text-white transition-colors duration-300 transform md:text-2xl hover:text-gray-700"
               {{--                   href="#"><span class="text-pink-600">Pix</span>-<span class="text-blue-400">Academy</span></a>--}}
               href="{{url('/')}}"><span class="text-pink-600">Pix</span>-<span class="text-yellow-400">M</span><span class="text-green-400">e</span><span class="text-red-600">a</span><span class="text-yellow-400">ls</span>
            </a>
            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
             class="flex-col mt-2 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            {{--                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-pink-400"--}}
            {{--                       href="#">Home</a>--}}
            {{--                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-pink-400"--}}
            {{--                       href="#">Templates</a>--}}
            {{--                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-pink-400"--}}
            {{--                       href="#">Price</a>--}}
            {{--                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-pink-400"--}}
            {{--                       href="#">Help</a>--}}
            {{--            TODO Add Menu Options--}}


            @auth
                <form action="{{url('/logout')}}" method="post">
                    @csrf
                    <button class="px-4 py-1 text-sm font-medium text-center text-gray-200 transition-colors duration-300 transform border rounded hover:text-black hover:bg-pink-400"
                    >Logout
                    </button>
                </form>

            @else
                <a class="px-4 py-1 text-sm font-medium text-center text-gray-200 transition-colors duration-300 transform border rounded hover:text-black hover:bg-pink-400"
                   href="{{url('/login')}}"
                >Login
                </a>
            @endauth

        </div>
    </nav>
</header>

@if (session()->has('success'))
    <div class="w-screen flex justify-center items-center h-10 bg-gradient-to-r from-green-100 to-green-400 ">
        <p class="text-xl font-bold">{{session()->get('success')}}</p>
    </div>
@endif


<div class="h-11/12 w-full">

    <!-- component -->
    <div class="grid  place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
            <h1 class="text-xl font-semibold">Hello there 👋, <span class="font-normal">To multi-select Hold Ctrl+Click</span></h1>
            <form action="{{route("Add-Choice")}}"  method="post" class="mt-6">
        @csrf
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Meal Option</label>
                <select name="option_id[]" id="email" multiple="multiple" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required >
                    @forelse($category as $option)
                        <option value="{{$option['meal_option_id']}}">{{$option['option_nm']}}</option>

                    @empty
                        <option>No Options</option>
                    @endforelse
                </select>

                <input name="date" type="date" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">

                <input type="submit" value="Add Menu" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
            </form>
        </div>
    </div>

</div>

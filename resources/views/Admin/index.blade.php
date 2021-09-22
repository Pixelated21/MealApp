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

<div>
    <div  id="modal-cat" class="h-screen fixed  hidden  z-50 w-screen flex justify-center items-center bg-black bg-opacity-40 p-0 sm:p-12">
        <div class="mx-auto  px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl" style="width: 35vw;">
            <h1 class="text-6xl font-bold mb-20 ">Add Category</h1>
            <form action="{{route("Add-Category")}}" method="post" id="form">
                @csrf
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        name="cat_nm"
                        placeholder="Add Category"
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                </div>



                <div class="flex flex-row space-x-4">

                </div>


                <div class="flex gap-5">
                    <input
                        type="submit"
                        value="Add Category"

                        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-green-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
                    >
                    </input>
                </div>

            </form>
        </div>
    </div>

</div>

<div>
    <div  id="modal-meal" class="h-screen fixed  hidden  z-50 w-screen flex justify-center items-center bg-black bg-opacity-40 p-0 sm:p-12">
        <div class="mx-auto  px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl" style="width: 35vw;">
            <h1 class="text-6xl font-bold mb-20 ">Add Meal</h1>
            <form action="{{route("Add-Meal")}}" method="post" id="form">
                @csrf
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        name="meal_nm"
                        placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                    <label for="meal_nm" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Option Name</label>
                </div>



                <div class="flex flex-row my-4 space-x-4">
                    <select
                        name="category_id"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"

                    >
                        <option disabled selected>Select Category Below</option>
                        @forelse($options as $cat)

                            <option value="{{$cat["meal_category_id"]}}">{{$cat["category_nm"]}}</option>

                        @empty
                            <option disabled selected>No Categories Added</option>
                        @endforelse
                    </select>
                </div>


                    <input
                        id="button"
                        type="submit"
                        value="Add Option"
                        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-green-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
                    >


            </form>
        </div>
    </div>

</div>

<div class="z-0">
<header class="bg-black md:h-1/12 items-center justify-center  flex border-b-2 border-white" x-data="{ isOpen: false }">
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
                <form class=" h-full" action="{{url('/logout')}}" method="post">
                    @csrf
                    <button class="px-4  py-1 text-sm font-medium text-center text-gray-200 transition-colors duration-300 transform border rounded hover:text-black hover:bg-pink-400"
                    >Logout
                    </button>
                </form>

            @else
                <a class="px-4 py-1 text-sm font-medium text-center text-gray-200 transition-colors duration-300 transform border rounded hover:text-black hover:bg-pink-400" \
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
    <div class="w-full  grid-cols-1 grid-rows-2 grid bg-cool-gray-500 h-full">

        <div class="w-full border-2 border-black flex bg-pink-500">
            <div class="w-1/2 border-b border-l border-r flex justify-center items-center border-black h-full"><button id="add-cat" onclick="add_cat_button()" class="text-6xl h-full w-full flex justify-center items-center">Add Category</button></div>
            <div class="w-1/2 border-b border-l border-r flex justify-center items-center border-black h-full"><button id="add-meal" onclick="add_meal_button()" class="text-6xl h-full w-full flex justify-center items-center">Add Meal</button></div>
        </div>

        <div class="w-full border-2 border-black flex justify-center items-center bg-pink-500">
            <a href="{{route("View-Choice")}}" id="view-meals" class="text-6xl h-full w-full flex justify-center items-center">View Selected Meals</a>
        </div>


    </div>
</div>
</div>

<div class="bg-fixed">

    <!-- component -->
    <!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->
    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus ~ label,
        input:not(:placeholder-shown) ~ label,
        textarea:focus ~ label,
        textarea:not(:placeholder-shown) ~ label,
        select:focus ~ label,
        select:not([value='']):valid ~ label {
            /* @apply transform; scale-75; -translate-y-6; */
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
            skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus ~ label,
        select:focus ~ label {
            /* @apply text-black; left-0; */
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>

</div>

<script defer type="text/javascript">
    let x = document.getElementById('modal-cat')
    let y = document.getElementById('modal-meal')

    x.style.display="none";


    function add_meal_button(){
        y.style.display="block";

    }
    function add_cat_button(){
        x.style.display="block";

    }

    function close(){
        x.style.display="none";
        y.style.display="none";
    }

    window.onclick = function(event) {
        if(event.target == x){
            x.style.display="none";
        }
        else if(event.target == y){
            y.style.display="none"

        }
    }
</script>



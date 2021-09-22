<!-- component -->
<link rel="stylesheet" href="{{mix("css/app.css")}}">

<!-- component -->
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
<div class="container w-screen">


    <table class="text-left w-full w-screen">
        <thead class="bg-black flex text-white text-center w-full">
        <tr class="flex w-full mb-4">
            <th class="p-4 w-full">First Name</th>
            <th class="p-4 w-full">Last Name</th>
            <th class="p-4 w-full">Meal Choices</th>
            <th class="p-4 w-full">Category Name</th>
            <th class="p-4 w-full">Date</th>
        </tr>
        </thead>
        <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">

        @foreach($choices as $Choice )

        <tr class="flex w-full mb-4 text-center">
            <td class="p-4 w-full">{{$Choice['user']["first_nm"]}}</td>
            <td class="p-4 w-full">{{$Choice['user']["last_nm"]}}</td>
            <td class="p-4 w-full">{{ $Choice['option']['option_nm'] }}</td>
            <td class="p-4 w-full">{{\App\Models\Category::find($Choice['option']['category_id'])->category_nm }}</td>
            <td class="p-4 w-full">{{ $Choice['date'] }}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>

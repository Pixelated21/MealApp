<link rel="stylesheet" href="{{asset("css/app.css")}}">
<section class="flex flex-col md:flex-row h-screen items-center">

    <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
    </div>

    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

        <div class="w-full h-100">


            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Register</h1>

            <form class="mt-6" action="/reg" method="POST">
                @csrf

                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input type="text" name="first_nm" id="" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Last Name</label>
                    <input type="text" name="last_nm" id="" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="text" name="email" id="" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
                </div>

                <div class="flex gap-2">
                    <div class="mt-4">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">Password Verify</label>
                        <input type="password" name="password_confirmation" id="" placeholder="Verify Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
                    </div>
                </div>




                <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
              px-4 py-3 mt-6">Register</button>
            </form>

            <hr class="my-6 border-gray-300 w-full">


            <p class="mt-8">Need an account? <a href="/login" class="text-blue-500 hover:text-blue-700 font-semibold">Login</a></p>


        </div>
    </div>

</section>

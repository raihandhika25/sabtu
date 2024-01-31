<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Doucment</title>
</head>

<body class="flex items-center justify-center mt-16 bg-royco">


    <div
        class="w-full max-w-sm p-4 bg-[conic-gradient(at_top_left,_var(--tw-gradient-stops))] from-orange-400 to-sky-400">
        <h3 class="text-xl mb-5 font-medium text-slate-200 dark:text-white">Form Register</h3>
        @if (session('message'))
            <div class="alert alert-success text-white "> {{ session('message') }} </div>
        @endif
        <form class="space-y-6" action="{{ route('actionregister') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="name@email.com" required>
            </div>
            <div>
                <label for="username"
                    class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Username</label>
                <input type="text" name="username" id="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>
            <div>
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>
            <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Role</label>
                <input type="text" name="role" id="role" value="siswa" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>

            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            <div class="text-sm font-medium text-gray-50 dark:text-gray-300">
                Sudah Punya Akun? <a href="/" class="text-blue-700 hover:underline dark:text-blue-500">Login
                    disini</a>
            </div>

        </form>
    </div>


</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex h-screen">
            <div class="flex-1 bg-gradient-to-r from-indigo-500 to-indigo-800 text-white p-8 flex items-center justify-center">
                <div>
                    <h1 class="text-4xl font-bold mb-4">Electronic Health Records</h1>
                    <br>
                    <p class="text-lg">Digitalizing the Medical industry, one patient at a time</p>
                </div>
            </div>
        <div class="flex-1 bg-gray-100 flex justify-center items-center">
            <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
                <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Registration</h2>
                </div>
            <form action="{{route('register_post')}}" method="post" class="mt-8 space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                      Name
                    </label>
                    <div class="mt-1">
                      <input
                        id="name"
                        name="name"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    </div>
                  </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="name" autoComplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                      Password
                    </label>
                    <div class="mt-1">
                      <input
                        id="password"
                        name="password"
                        type="password"
                        autoComplete="current-password"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    </div>
                </div>
                  <div>
                    <button
                      type="submit"
                      class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Register Patient
                    </button>
                  </div>
            </form>
            <div class="text-right m-auto">
                <p class="text-sm">Already have an account? <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Login</a></p>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
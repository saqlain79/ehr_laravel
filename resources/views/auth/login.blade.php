<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                        <h2 class="text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                    </div>
                    <form action="{{route('login_post')}}" method="post">
                        @csrf
                        <div>
                            <label for="email" value="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" autoComplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                    <label for="password" value="password" class="block text-sm font-medium text-gray-700">Password</label>
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
                  <!-- <div class="pt-2 py-2">
                  @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                  </div> -->
                  <div class="pt-2 py-2">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log In</button>
                  </div>
                </form>
                <div class="m-auto text-right">
                    <p class="text-sm">Don't have an account? <a href="{{route('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Register</a></p>
                </div>
                @if(session('loginError'))
                <div class="alert alert-danger">
                    <p><ion-icon name="alert-circle-outline"></ion-icon>{{session('loginError')}}</p>
                @endif
                </div>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
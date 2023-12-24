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
            <h1 class="text-4xl font-bold mb-4">Electronic Health Records</h1>
        </div>
        <div class="flex-1 bg-gray-100 flex justify-center items-center">
            <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-md">
                <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Registration</h2>
                </div>
            <form action="" method="post" class="mt-8 space-y-6">
                @csrf
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
                        type="password"
                        autoComplete="current-password"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    </div>
                </div>
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">
                      First Name
                    </label>
                    <div class="mt-1">
                      <input
                        id="first_name"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>
                  </div>
                  <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">
                      Last Name
                    </label>
                    <div class="mt-1">
                      <input
                        id="last_name"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>
                  </div>
                  <div>
                    <label for="nid" class="block text-sm font-medium text-gray-700">
                      National Identification Number
                    </label>
                    <div class="mt-1">
                      <input
                        id="nid"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>
                  </div>
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">
                      Phone
                    </label>
                    <div class="mt-1">
                      <input
                        id="phone"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>
                  </div>
                  <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">
                      Address
                    </label>
                    <div class="mt-1">
                      <input
                        id="address"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      />
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">
                      Gender
                    </label>
                    <div>
                      <input type="radio" id="male" name="gender" value="male" />
                      <label for="male" class='pl-2 text-sm font-medium text-gray-700'>Male</label>
                    </div>
                    <div>
                      <input type="radio" id="female" name="gender" value="female" />
                      <label for="female" class='pl-2 text-sm font-medium text-gray-700'>Female</label>
                    </div>
                  </div>

                  <div>
                    <label for="DOB"class="block text-sm font-medium text-gray-700">
                       Date of Birth
                    </label>
                    <div class="mt-1">
                      <input type="date" id="DOB" class='border-2'/>
                    </div>
                  </div>
                  <div>
                    <button
                      type="submit"
                      class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                      Register Patient
                    </button>
                  </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
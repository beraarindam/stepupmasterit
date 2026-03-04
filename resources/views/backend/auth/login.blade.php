<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Education CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#1e293b',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 w-full max-w-md overflow-hidden">
        <div class="bg-secondary text-white p-6 text-center">
            <h2 class="text-2xl font-bold tracking-wider">EDU CMS</h2>
            <p class="text-sm text-gray-300 mt-1">Admin Portal Access</p>
        </div>
        <div class="p-8">
            @if ($errors->any())
                <div class="bg-red-50 text-red-500 p-4 rounded-lg text-sm mb-6 border border-red-100">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 text-red-500 p-4 rounded-lg text-sm mb-6 border border-red-100">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                            placeholder="admin@example.com">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">Remember
                            me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-primary hover:text-blue-500">Forgot password?</a>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow transition-colors duration-200">
                    Sign In
                </button>
            </form>
        </div>
        <div class="bg-gray-50 border-t border-gray-100 p-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Education CMS. All rights reserved.
        </div>
    </div>

</body>

</html>
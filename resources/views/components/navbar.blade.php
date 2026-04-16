<nav class="bg-white shadow-lg border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">Post</span>
                </div>

            </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8 md:space-x-reverse">
                    <a href="{{ route('posts.create') }}" class="text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">Create Post</a>
                    <a href="{{ route('posts.index') }}" class="text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gray-300 text-sm font-medium">view posts</a>
                </div>
            <div class="flex items-center">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition">تسجيل الدخول</button>
            </div>
        </div>
    </div>
</nav>
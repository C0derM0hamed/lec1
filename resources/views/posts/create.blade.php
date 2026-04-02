<script src="https://cdn.tailwindcss.com"></script>

<form action="/posts" class="mx-auto max-w-lg space-y-6 rounded-2xl border border-gray-100 bg-white p-8 shadow-lg shadow-gray-100 mt-16 sm:mt-24" method="POST">
  @csrf
  <div>
    <label class="mb-1.5 block text-sm font-semibold text-gray-800" for="title">Title</label>
    <input class="mt-1 block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-100" id="title" name="title" type="text" placeholder="Title of the post">
  </div>

  <div>
    <label class="mb-1.5 block text-sm font-semibold text-gray-800"  for="content">Body</label>
    <textarea class="mt-1 block w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-all duration-200 focus:border-indigo-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-100" id="content" name="content" rows="5" placeholder="Body of the post"></textarea>
  </div>


  <button type="submit" class="block w-full rounded-xl bg-indigo-600 px-6 py-3.5 text-sm font-semibold text-white shadow-md shadow-indigo-200 transition-all duration-200 hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
    Create Post
  </button>
</form>
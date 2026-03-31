<script src="https://cdn.tailwindcss.com"></script>
<form   action="/store" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6 m-20" method="POST">
  

<div>
    <label class="block text-sm font-medium text-gray-900" for="title">Title</label>
    <input class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="title" name="title" type="text" placeholder="title of the post">
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-900"  for="body">Body</label>
    <input class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="body" name="body" type="text" placeholder="body of the post">
  </div>


  <button class="block w-full rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-indigo-600" type="submit">
    Create Post
  </button>
</form>
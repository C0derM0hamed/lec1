<script src="https://cdn.tailwindcss.com"></script>

<script>
  function deletePost(postId) {
    return confirm('Are you sure you want to delete this post?');
  }
</script>

<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
<article class="rounded-2xl border border-gray-100 bg-white p-8 shadow-lg shadow-gray-100">
    <div class="mb-4 inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600">
      Post Info
    </div>

    <h3 class="text-1xl font-extrabold tracking-tight text-gray-900">Title : </h3>
    <p class="mt-5 whitespace-pre-line text-base leading-relaxed text-gray-600">{{ $post->title }}</p>
    <h3 class="text-1xl font-extrabold tracking-tight text-gray-900">Description : </h3>
    <p class="mt-5 whitespace-pre-line text-base leading-relaxed text-gray-600"> {{ $post->content }}</p>


  </article>
</div>

<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
<article class="rounded-2xl border border-gray-100 bg-white p-8 shadow-lg shadow-gray-100">
    <div class="mb-4 inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600">
      User Info
    </div>

    <h3 class="text-2xl font-extrabold tracking-tight text-gray-900"> Name : {{ $post->user->name }}</h3>

    <p class="mt-5 whitespace-pre-line text-base leading-relaxed text-gray-600">Email : {{ $post->user->email }}</p>

    <p class="mt-5 whitespace-pre-line text-base leading-relaxed text-gray-600">Created At : {{ $post->user->created_at->format('l jS \of F Y h:i:s A') }}</p>


  </article>
</div>


  @foreach($errors as $err)
    <p class="text-sm text-red-500">{{ $err }}</p>
  @endforeach
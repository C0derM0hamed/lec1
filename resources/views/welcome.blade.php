<script src="https://cdn.tailwindcss.com"></script>

@forelse(($posts ?? []) as $post)
<article class="rounded-xl bg-white p-4 ring-3 ring-indigo-50 sm:p-6 lg:p-8 m-6">
  <div class="flex items-start sm:gap-8">
    <div class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500" aria-hidden="true">
      <div class="flex items-center gap-1">
        <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
        <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
        <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
        <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
        <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
      </div>
    </div>

    <div>
      <strong class="rounded-sm border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
       @if(isset($post->id))
         {{$post->id}}
       @endif
      </strong>

      <h3 class="mt-4 text-lg font-medium sm:text-xl">
        <a href="/posts/{{ $post->id }}" class="hover:underline">
          {{ $post->title }}
        </a>
      </h3>

      <p class="mt-1 text-sm text-gray-700">
        {{ $post->content }}
      </p>
        <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
          <a href="/posts/{{ $post->id }}" class="underline hover:text-gray-700">View </a>,
          <a href="/posts/{{ $post->id }}/edit" class="underline hover:text-gray-700">Edit </a> 
          <form action="/posts/{{ $post->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="underline hover:text-gray-700">Delete</button>
          </form>
        </p>
      </div>
    </div>
  </div>
</article>

@empty
<div class="m-6 rounded-xl bg-white p-6 text-gray-600 ring-1 ring-gray-200">
  No posts found.
</div>
@endforelse
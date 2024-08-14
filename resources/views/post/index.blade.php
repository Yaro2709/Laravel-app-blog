<?php
/** @var $posts \Illuminate\Contracts\Pagination\LengthAwarePaginator*/
?>
<!-- Posts Section -->
<x-app-layout
    :meta-title="'NameBlog - ' . $category->title"
    :meta-description="'Posts filtered by category ' . $category->title"
>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
            <x-post-item :post="$post"> </x-post-item>
        @endforeach

        <!-- Pagination -->
        {{$posts->onEachSide(1)->links()}}

    </section>
    <!-- SideBar -->
    <x-sidebar />
</x-app-layout>

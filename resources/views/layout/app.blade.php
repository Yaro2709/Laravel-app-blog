<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'NameBlog' }}</title>
    <meta name="author" content="NameBlog">
    <meta name="description" content="{{$metaDescription}}">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        pre{
            padding: 1rem;
            background-color: #1a202c;
            color: white;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-50 font-family-karla">

<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{route('home')}}">
            Minimal Blog
        </a>
        <p class="text-lg text-gray-600">
            {{\App\Models\TextWidget::getTitle('header')}}
        </p>
    </div>
</header>

<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a
                href="{{route('home')}}"
                class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2
                {{Route::is('home') ? 'bg-blue-600 text-white' : ''}}"
            >
                Home
            </a>
            @foreach($categories as  $category)
                <a
                    href="{{route('by-category', $category)}}"
                    class="hover:bg-blue-600 hover:text-white  rounded py-2 px-4 mx-2
                    {{request('category')?->slug == $category->slug ? 'bg-blue-600 text-white' : ''}}"
                >
                    {{$category->title}}
                </a>
            @endforeach
            <a
                href="{{route('about-us')}}"
                class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2
                {{Route::is('about-us') ? 'bg-blue-600 text-white' : ''}}"
            >
                About us
            </a>
        </div>
    </div>
</nav>


<div class="container mx-auto flex flex-wrap py-6">

    {{$slot}}

</div>

<footer class="w-full border-t bg-white pb-12">
    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="uppercase py-6">&copy; myblog.com</div>
    </div>
</footer>
</body>
</html>

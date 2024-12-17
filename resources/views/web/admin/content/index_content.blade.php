@extends('web.layouts.template')

@section('content')


<div class="container mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Daftar Content</h1>
        <a href="{{ route('content.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            Buat Content
        </a>
    </div>

    @if (session('success'))
    <div class="px-4 py-3 mb-8 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif


    <!-- Table Content -->
    <div  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        @include('web.admin.content.table_content', ['content'=> $content])
    </div>

</div>



@endsection

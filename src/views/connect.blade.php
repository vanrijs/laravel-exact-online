@extends('layouts.app')

@section('content')

<form action="{{ route('exact.authorize') }}" method="POST">
    @csrf
    @method('POST')
    <button 
        type="submit" 
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out"
    >
        Connect with Exact Online
    </button>
</form>

@endsection

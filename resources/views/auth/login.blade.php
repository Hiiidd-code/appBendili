@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="max-w-md mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-xl font-semibold mb-4 text-center">Login Admin</h1>

        @if($errors->any())
            <div class="mb-4 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" id="email"
                       class="w-full border rounded px-3 py-2 text-sm"
                       value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full border rounded px-3 py-2 text-sm"
                       required>
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center text-xs">
                    <input type="checkbox" name="remember" class="mr-1">
                    Ingat saya
                </label>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white text-sm font-semibold py-2 rounded hover:bg-blue-700">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection

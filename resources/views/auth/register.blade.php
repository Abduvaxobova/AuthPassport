@extends('components.layouts.app')
@section('content')
<div class="auth-container">
    <h2 class="text-center mb-4">Ro'yxatdan o'tish</h2>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3">
            @error('name')
                {{$message}}
            @enderror
            <label for="username" class="form-label">Foydalanuvchi nomi</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            @error('email')
            {{$message}}
            @enderror
            <label for="email" class="form-label">Elektron pochta</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            @error('password')
            {{$message}}
            @enderror
            <label for="password" class="form-label">Parol</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            @error('confirmPassword')
            {{$message}}
            @enderror
            <label for="confirmPassword" class="form-label">Parolni tasdiqlang</label>
            <input type="password" class="form-control" name="confirmPassword">
        </div>
        <button type="submit" class="btn btn-primary w-100">Ro'yxatdan o'tish</button>
    </form>
    <p class="mt-3 text-center">Hisobingiz bormi? <a href="{{route('login')}}">Kirish</a></p>
</div>
@endsection
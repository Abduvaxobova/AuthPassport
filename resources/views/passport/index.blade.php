@extends('components.layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Xush kelibsiz!</h1>
    <p>Passport ma'lumotlaringizni kiritish yoki ko'rish uchun quyidagi tugmalardan foydalaning:</p>
    <div class="mt-4">
        @if (auth()->user())
        @if (auth()->user()->passport)
            <a href="{{ route('passports.show',$passport->id) }}" class="btn btn-secondary">
                <i class="fas fa-eye"></i> Passport ma'lumotlarini ko'rish
            </a>
            <form action="{{ route('passports.destroy', $passport->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('O\'chirishni tasdiqlaysizmi?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> O'chirish
                </button>
            </form>
        @else
            <a href="{{ route('passports.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus-circle"></i> Passport ma'lumotlarini kiriting
            </a>
        @endif
        @else
        <a href="{{ route('login') }}" class="btn btn-primary me-2">
            <i class="fas fa-user"></i> Tizimga kirish
        </a>
        @endif
    </div>
</div>
@endsection
@extends('components.layouts.app')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Passport ma'lumotlarini kiriting</h1>
    <form action="{{route('passports.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            @error('passport_number')
            {{$message}}
            @enderror
            <label for="passport_number" class="form-label">Passport raqami</label>
            <input type="text" class="form-control" name="passport_number">
        </div>
        <div class="mb-3">
            @error('issue_date')
            {{$message}}
            @enderror
            <label for="issue_date" class="form-label">Berilgan sana</label>
            <input type="date" class="form-control" name="issue_date">
        </div>
        <div class="mb-3">
            @error('expiry_date')
            {{$message}}
            @enderror
            <label for="expiry_date" class="form-label">Amal qilish muddati</label>
            <input type="date" class="form-control" name="expiry_date">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</div>
@endsection
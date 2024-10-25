@extends('components.layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Passport ma'lumotlarini tahrirlash</h1>
    <form action="{{route('passports.update',$passport->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('passport_number')
            {{$message}}
            @enderror
            <label for="passport_number" class="form-label">Passport raqami</label>
            <input type="text" class="form-control" name="passport_number" value="{{$passport->passport_number}}">
        </div>
        <div class="mb-3">
            @error('issue_date')
            {{$message}}
            @enderror
            <label for="issue_date" class="form-label">Berilgan sana</label>
            <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{$passport->issue_date}}">
        </div>
        <div class="mb-3">
            @error('expiry_date')
            {{$message}}
            @enderror
            <label for="expiry_date" class="form-label">Amal qilish muddati</label>
            <input type="date" class="form-control" name="expiry_date" value="{{$passport->expiry_date}}">
        </div>
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</div>
@endsection
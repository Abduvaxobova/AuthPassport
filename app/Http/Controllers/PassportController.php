<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Requests\StorePassportRequest;
use App\Http\Requests\UpdatePassportRequest;

class PassportController extends Controller
{
    public function index()
    {
        $passport = Auth::user()->passport;
        return view('passport.index',compact('passport'));
    }
    public function create()
    {
        return view('passport.create');
    }
    public function store(StorePassportRequest $request)
    {
        $passport = new Passport();
        $passport->user_id = Auth::id();
        $passport->passport_number = $request->passport_number;
        $passport->issue_date = $request->issue_date;
        $passport->expiry_date = $request->expiry_date;
        $passport->save();
        return redirect()->route('passports.index');
    }
    public function show()
    {
        $passport = Auth::user()->passport;
        return view('passport.show', compact('passport'));
    }
    public function edit(string $id)
    {
        $passport = Passport::findOrFail($id);
        return view('passport.edit', compact('passport'));
    }
    public function update(UpdatePassportRequest $request, string $id)
    {
        $passport = Passport::findOrFail($id);
        $passport->passport_number = $request->passport_number;
        $passport->issue_date = $request->issue_date;
        $passport->expiry_date = $request->expiry_date;
        $passport->save();
        return redirect()->route('passports.index');
    }
    public function destroy(string $id)
    {
        $passport = Passport::findOrFail($id);
        $passport->delete();
        return redirect()->route('passports.index');
    }
}
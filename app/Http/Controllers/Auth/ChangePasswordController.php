<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DogCategory; 
use App\Models\ProductCategory;
use App\Models\SiteConfig;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        view()->share('site_phone', SiteConfig::where('label','site_phone')->get());
        view()->share('site_address', SiteConfig::where('label','site_address')->get());
        view()->share('site_mail', SiteConfig::where('label','site_mail')->get());
        view()->share('dogCategories', DogCategory::all());
        view()->share('productCategories', ProductCategory::all());
    }

    public function edit()
    {
        $user = Auth::user();

        return view('auth.passwords.edit', compact('user'));

    }

    public function update(Request $request)
    {
        $this->validate($request, [ 
           'oldPassword' => 'required|min:6|max:32',
           'newPassword' => 'required|min:6|max:32',
           'confirmPassword' => 'required|min:6|max:32|same:newPassword'
       	]);

        $user = Auth::user();
        if (!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->back()->withErrors(['oldPassword' => 'The old password is invalid']);
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->route('login');
    }
}

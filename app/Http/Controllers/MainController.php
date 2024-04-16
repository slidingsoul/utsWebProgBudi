<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function createPortofolioView() {
        $portofolio = Portofolio::where('user_id', auth()->id())->first();
        return view('createPortofolio', compact('portofolio'));
    }

    public function yourView() {
        $portofolio = Portofolio::where('user_id', auth()->id())->first();
        return view('your', ['portofolio' => $portofolio]);
    }

    public function loginregisterView() {
        return view('loginRegister');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);
        
        if (auth()->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPassword']])) {
            $request->session()->regenerate();
            $portofolio = Portofolio::where('user_id', Auth::user()->id)->first();
            return redirect('/createPortofolio')->with('portofolio', $portofolio);
        }
        else{

        return redirect('/loginRegister');
        }
    }

    public function register(Request $request) {
        $comingFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min: 8', 'max: 50']
        ]);

        $comingFields['password'] = bcrypt($comingFields['password']);
        $user = User::create($comingFields);
        auth()->login($user);

        return redirect('/createPortofolio');        
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('loginRegister');
    }

    public function writeToPortofolio(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'aboutMe' => 'required',
            'telpNum' => 'required',
            'linkedin' => 'required',
            'skillTitle' => 'required',
            'skillDesc' => 'required',
        ]);

        $portofolio = Portofolio::firstWhere('user_id', auth()->id());

        if ($portofolio) {
            // Update existing Portofolio
            $portofolio->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'aboutMe' => $request->aboutMe,
                'telpNum' => $request->telpNum,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'skillTitle' => $request->skillTitle,
                'skillDesc' => $request->skillDesc
            ]);
        } else {
            // Create new Portofolio
            $portofolio = Portofolio::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'aboutMe' => $request->aboutMe,
                'telpNum' => $request->telpNum,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'user_id' => auth()->id(),
                'skillTitle' => $request->skillTitle,
                'skillDesc' => $request->skillDesc
            ]);
        }

        return view('your', ['portofolio' => $portofolio]);
    }

    public function destroy()
{
    $user_id = auth()->user()->id;
    $portfolio = Portofolio::where('user_id', $user_id)->first();

    if ($portfolio) {
        $portfolio->delete();
        return redirect('/createPortofolio')->with('success', 'Portfolio deleted successfully');
    } else {
        return redirect('/createPortofolio')->with('error', 'No portfolio found to delete');
    }
}

}

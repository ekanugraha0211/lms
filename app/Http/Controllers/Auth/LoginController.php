<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
{
    $request->validate([
        'identifier' => 'required|string',
        'password' => 'required|string',
    ]);

    $identifier = $request->identifier;
    $password = $request->password;

    // Cek login dengan email atau username langsung di tabel users
    if (Auth::attempt(['email' => $identifier, 'password' => $password]) ||
        Auth::attempt(['username' => $identifier, 'password' => $password])) {
        return $this->redirectBasedOnRole();
    }

    // Login sebagai guru via NIP
    $guru = \App\Models\Guru::where('nip', $identifier)->first();
    if ($guru && \Hash::check($password, $guru->user->password)) {
        Auth::login($guru->user);
        return redirect()->route('guru.index');
    }

    // Login sebagai siswa via NIS
    $siswa = \App\Models\Siswa::where('nis', $identifier)->first();
    if ($siswa && \Hash::check($password, $siswa->user->password)) {
        Auth::login($siswa->user);
        return redirect()->route('siswa.index');
    }

    return back()->withErrors(['identifier' => 'Email/NIP/NIS atau password salah.']);
}



    protected function redirectBasedOnRole()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'guru') {
            return redirect()->route('guru.index');
        } elseif (Auth::user()->role == 'siswa') {
            return redirect()->route('siswa.index');
        }

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('status', 'Anda telah logout.');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

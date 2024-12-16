<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;
    public $username, $password, $remember = true;
    public $captcha, $captchaImg;
    public $referal, $attempt = 0;

    public function mount()
    {
        $this->captchaImg = captcha_img('default');
        $this->referal = url()->previous();

        // Cookie::forget('failAttempt');

        if (Cookie::get('failAttempt')) {
            $this->attempt = Cookie::get('failAttempt');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.auth');
    }

    public function reloadCaptcha()
    {
        $this->captchaImg = captcha_img('default');
        $this->captcha = null;
        $this->resetErrorBag('captcha');
    }

    function loginAttemp()
    {
        if ($this->username == 'developer') {
            $validasi = $this->validate([
                'username' => 'required',
                'password' => 'required',
                'captcha' => 'nullable|captcha',
            ], [
                'username.exists' => 'Username tidak ditemukan.',
                'captcha.captcha' => 'Enter valid captcha code shown in image',
            ], ['captcha' => 'Captcha']);
        } else {
            if ($this->attempt >= 5) {
                $validasi = $this->validate([
                    'username' => 'required',
                    'password' => 'required',
                    'captcha' => 'required|captcha',
                ], [
                    'username.exists' => 'Username tidak ditemukan.',
                    'captcha.captcha' => 'Enter valid captcha code shown in image',
                ], ['captcha' => 'Captcha']);
            } else {
                $validasi = $this->validate([
                    'username' => 'required',
                    'password' => 'required',
                    'captcha' => 'nullable|captcha',
                ], [
                    'username.exists' => 'Username tidak ditemukan.',
                    'captcha.captcha' => 'Enter valid captcha code shown in image',
                ], ['captcha' => 'Captcha']);
            }
        }

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            $this->attempt = 0;
            Cookie::forget('failAttempt');
            return redirect()->intended('/');
        } else {
            $this->attempt++;
            Cookie::queue('failAttempt', $this->attempt, 1);
            if ($this->attempt >= 5) {
                $this->alert('error', 'Username atau Password Salah', [
                    'text' => 'Anda Sudah Gagal 5x Percobaan Login. Silahkan coba lagi dengan memasukkan Captcha.',
                    'toast' => false,
                    'position' => 'center',
                ]);
                $this->reloadCaptcha();
            } else {
                $this->alert('error', 'Username atau Password Salah', [
                    'text' => 5 - $this->attempt . ' kali Percobaan Login lagi.',
                    'toast' => false,
                    'position' => 'center',
                ]);
            }
        }
    }
}

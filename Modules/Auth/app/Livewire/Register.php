<?php

namespace Modules\Auth\Livewire;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Auth\Models\Otp;
use Modules\Auth\Models\User;
use Modules\Auth\Services\OtpService;

class Register extends Component
{
    public $CodeMode;

    public string $username;

    public string $password;

    public string $password_confirmation;

    public string $mobile;

    public string $otp1 = '';
    public string $otp2 = '';
    public string $otp3 = '';
    public string $otp4 = '';
    public string $otp5 = '';
    public string $otp6 = '';

    public $canResend;
    public $resendSeconds;
    public function SendCode(OtpService $otpService): void
    {
        $this->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required|unique:users,mobile|regex:/^09\d{9}$/',
        ]);

        $check = User::query()
            ->where('mobile', $this->mobile)
            ->exists();
        if ($check) {
            $this->dispatch('userExists');

            throw ValidationException::withMessages([
                'mobile' => 'این شماره قبلاً ثبت شده. لطفاً وارد حساب کاربری خودتون بشید.',
                'username' => 'این نام کاربرس قبلاً ثبت شده. لطفاً وارد حساب کاربری خودتون بشید.',

            ]);
        }
        $otpService->create($this->mobile);
        $this->CodeMode = 1;
        $this->canResend = false;
        $this->resendSeconds = 120;
    }

    public function register()
    {
        if (
            blank($this->otp1) ||
            blank($this->otp2) ||
            blank($this->otp3) ||
            blank($this->otp4) ||
            blank($this->otp5) ||
            blank($this->otp6)
        ) {
            $this->addError('all_otp', 'لطفاً کد تأیید را کامل وارد کنید.');
            return;
        }
        $code = $this->otp1 . $this->otp2 . $this->otp3 . $this->otp4 . $this->otp5 . $this->otp6;
        $otp = Otp::query()
            ->where('mobile', $this->mobile)
            ->where('code', $code)
            ->where('expires_at', '>', now())
            ->first();
        if (!$otp) {
            throw ValidationException::withMessages([
                'otp' => 'این کد معتبر نیست که',
            ]);
        }
        $user = User::query()->create([
            'mobile' => $this->mobile,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'mobile_verified_at' => now(),
        ]);
        $otp->delete();
        Auth::login($user);
        event(new Registered($user));
        session()->regenerate();
        return redirect()->route('home');
    }


    #[Layout('auth::components.layouts.master')]
    #[Title('ثبت نام')]
    public function render(): view
    {
        return view('auth::livewire.register');
    }
}

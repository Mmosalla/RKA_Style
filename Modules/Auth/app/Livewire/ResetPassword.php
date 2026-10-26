<?php

namespace Modules\Auth\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Modules\Auth\Models\Otp;
use Modules\Auth\Models\User;
use Modules\Auth\Services\OtpService;

class ResetPassword extends Component
{
    public string $mobile;
    public $CodeMode;

    public string $password;
    public string $password_confirmation;
    public string $otp1 = '';
    public string $otp2 = '';
    public string $otp3 = '';
    public string $otp4 = '';
    public string $otp5 = '';
    public string $otp6 = '';


    public function sendCode(OtpService $otpService)
    {
        $this->validate([
            'mobile' => 'required|regex:/^09\d{9}$/',
        ]);

        $check = User::query()
            ->where('mobile', $this->mobile)
            ->first();
        if (!$check) {
            $this->dispatch('userNotExists');
            return;
        }

        $otpService->create($this->mobile);
        $this->CodeMode = 1;
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
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

        $code = $this->otp1
            . $this->otp2
            . $this->otp3
            . $this->otp4
            . $this->otp5
            . $this->otp6;

        $otp = Otp::query()
            ->where('mobile', $this->mobile)
            ->where('code', $code)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            $this->dispatch('codeExpired');

            return;
        }

        $user = User::query()
            ->where('mobile', $this->mobile)
            ->first();

        if (!$user) {
            $this->dispatch('userNotExists');

            return;
        }

        $user->update([
            'password' => Hash::make($this->password),
        ]);

        $otp->delete();

        return redirect(route('auth.login'));
    }
    #[Layout('auth::components.layouts.master')]
    #[Title('بازیابی رمز عبور')]
    public function render(): view
    {
        return view('auth::livewire.reset-password');
    }
}

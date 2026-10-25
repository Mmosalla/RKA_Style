<?php

namespace Modules\Auth\Services;

use Illuminate\Validation\ValidationException;
use Modules\Auth\Jobs\SendOtpJob;
use Modules\Auth\Models\Otp;

class OtpService
{
    public function create(string $mobile): void
    {
        $this->invalidate($mobile);
        $code = random_int(100000, 999999);

        Otp::query()->create([
            'mobile' => $mobile,
            'code' => $code,
            'expires_at' => now()->addMinutes(2),
        ]);

        SendOtpJob::dispatch($mobile, $code);
    }

    private function invalidate(string $mobile): void
    {
        Otp::query()
            ->where('mobile', $mobile)
            ->whereNull('verified_at')
            ->where('expires_at', '>', now())
            ->update([
                'expires_at' => now(),
            ]);


    }
}

<?php

namespace Domain\Shared\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Lang;

class ValidFutureDate implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $inputDate = Carbon::parse($value);
        $currentDatePlus2Hours = Carbon::now()->addHours(2);

        // Cek apakah tanggal lebih dari waktu saat ini ditambah 2 jam
        if ($inputDate <= $currentDatePlus2Hours) {
            $fail(Lang::get('validation.future_date', ['attribute' => $attribute]));
        }
    }
}

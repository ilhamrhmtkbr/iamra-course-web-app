<?php

namespace Domain\Shared\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoProfanity implements ValidationRule
{
    protected array $badWords = [
        'anjing', 'babi', 'bangsat', 'kontol', 'memek', 'goblok', 'tolol', 'kampret',
        'tai', 'brengsek', 'jancok', 'setan', 'asu', 'monyet', 'sinting', 'idiot',
        'keparat', 'laknat', 'biadab', 'cocot', 'perek', 'pepek', 'lonte', 'kimak',
        'fuck', 'bitch', 'shit', 'bastard', 'dumbass', 'motherfucker'
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Memecah teks menjadi kalimat berdasarkan titik, tanda seru, dan tanda tanya
        $sentences = preg_split('/(?<=[.?!])\s+/', $value, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($sentences as $sentence) {
            // Memecah kalimat menjadi kata-kata dengan mengabaikan tanda baca
            $words = preg_split('/[\s\p{P}]+/u', $sentence, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($words as $word) {
                if (in_array(mb_strtolower($word), $this->badWords, true)) {
                    $fail("Teks mengandung kata kasar: \"$sentence\"");
                    return;
                }
            }
        }
    }
}

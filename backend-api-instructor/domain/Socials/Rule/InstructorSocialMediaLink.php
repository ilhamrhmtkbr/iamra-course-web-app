<?php

namespace Domain\Socials\Rule;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Lang;

class InstructorSocialMediaLink implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $patterns = [
            '/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9._-]+\/?$/',
            '/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[A-Za-z0-9_-]+\/?$/',
            '/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9.]+\/?$/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                return;
            }
        }

        $fail(Lang::get('validation.instructor_social_media_link'));
    }
}

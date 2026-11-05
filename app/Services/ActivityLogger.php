<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogger
{
    public static function log(
        string $action,
        ?Model $subject = null,
        ?string $description = null,
        ?array $oldValues = null,
        ?array $newValues = null
    ): void {
        $user = Auth::user();

        ActivityLog::create([
            'user_id' => $user?->id,
            'actor_name' => $user?->name ?? 'Guest',
            'actor_email' => $user?->email,
            'action' => $action,

            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id' => $subject?->getKey(),
            'subject_label' => $subject
                ? ($subject->name ?? $subject->full_name ?? $subject->course_name ?? $subject->course_code ?? $subject->reg_no ?? null)
                : null,

            'description' => $description,

            'old_values' => $oldValues,
            'new_values' => $newValues,

            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}

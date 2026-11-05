<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Services\ActivityLogger;
use Illuminate\Database\Eloquent\Model;

class ActivityObserver
{
    /**
     * Fields that must never appear in audit logs.
     */
    private function excludedFields(): array
    {
        return [
            'password',
            'remember_token',
            'two_factor_secret',
            'two_factor_recovery_codes',
            'profile_photo_path',
        ];
    }

    /**
     * Remove sensitive fields from recorded information.
     */
    private function safeValues(array $values): array
    {
        return array_diff_key(
            $values,
            array_flip($this->excludedFields())
        );
    }

    /**
     * Record newly created records.
     */
    public function created(Model $model): void
    {
        if ($model instanceof ActivityLog) {
            return;
        }

        ActivityLogger::log(
            'created',
            $model,
            class_basename($model) . ' record created.',
            null,
            $this->safeValues($model->getAttributes())
        );
    }

    /**
     * Record updated records.
     */
    public function updated(Model $model): void
    {
        if ($model instanceof ActivityLog) {
            return;
        }

        $changes = $this->safeValues($model->getChanges());

        // Do not create logs when no relevant fields changed.
        if (empty($changes)) {
            return;
        }

        $oldValues = $this->safeValues(
            array_intersect_key(
                $model->getOriginal(),
                $changes
            )
        );

        ActivityLogger::log(
            'updated',
            $model,
            class_basename($model) . ' record updated.',
            $oldValues,
            $changes
        );
    }

    /**
     * Record deleted records.
     */
    public function deleted(Model $model): void
    {
        if ($model instanceof ActivityLog) {
            return;
        }

        ActivityLogger::log(
            'deleted',
            $model,
            class_basename($model) . ' record deleted.',
            $this->safeValues($model->getAttributes()),
            null
        );
    }
}

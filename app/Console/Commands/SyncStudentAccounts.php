<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SyncStudentAccounts extends Command
{
    protected $signature = 'students:sync-accounts';

    protected $description = 'Create login accounts for students who do not have accounts';

    public function handle()
    {
        $created = 0;
        $existing = 0;
        $conflicts = 0;

        $students = Student::orderBy('id')->get();

        foreach ($students as $student) {
            $user = User::where('email', $student->email)->first();

            if ($user) {
                if ($user->role === 'student') {
                    $user->update([
                        'name' => $student->full_name,
                    ]);

                    $existing++;
                    $this->line("Already linked: {$student->reg_no}");
                } else {
                    $conflicts++;
                    $this->warn("Email conflict: {$student->email}");
                }

                continue;
            }

            $password = Str::password(12);

            DB::transaction(function () use ($student, $password) {
                User::create([
                    'name' => $student->full_name,
                    'email' => $student->email,
                    'password' => $password,
                    'role' => 'student',
                ]);
            });

            $created++;

            $this->info("Created: {$student->reg_no} | {$student->email}");
            $this->warn("Temporary password: {$password}");
            $this->newLine();
        }

        $this->newLine();

        $this->info("Synchronization completed.");
        $this->line("Accounts created: {$created}");
        $this->line("Already linked: {$existing}");
        $this->line("Email conflicts: {$conflicts}");

        if ($created > 0) {
            $this->warn("Keep the temporary passwords secure.");
        }

        return self::SUCCESS;
    }
}

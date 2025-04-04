<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Carbon\Carbon;
use App\Models\Employee;
use App\Mail\WorkAnniversaryMail;
use Illuminate\Support\Facades\Mail;

class SendWorkAnniversaryMails extends Command
{
    protected $signature = 'send:work-anniversary-mails';
    protected $description = 'Send work anniversary emails to employees';

    public function handle()
    {
        $today = Carbon::now()->format('m-d');

        $employees = Employee::whereRaw("DATE_FORMAT(date_of_joining, '%m-%d') = ?", [$today])->get();

        foreach ($employees as $employee) {
            $years = (int) Carbon::parse($employee->date_of_joining)->diffInYears(now());

            Mail::to($employee->email)
                ->bcc('abbasbitm3655@gmail.com') // Add your BCC
                ->send((new WorkAnniversaryMail($employee, $years))
                ->from('info@ronakoptik.com', 'HR Department')); // Customize From Name and Email

            $this->info("Mail sent to {$employee->name} ({$employee->email}) - {$years} year(s)");
        }

        return SymfonyCommand::SUCCESS;
    }


    // public function handle()
    // {
    //     // Static test data
    //     $employee = (object)[
    //         'name' => 'Abbas Uddin',
    //         'email' => 'abbas.uddin@ronakoptik.com',
    //         'date_of_joining' => '2023-04-03'
    //     ];

    //     $years = 2; // Static test year

    //     // 👉 Dump and Die the data to check
    //     // dd([
    //     //     'name' => $employee->name,
    //     //     'email' => $employee->email,
    //     //     'years' => $years,
    //     // ]);

    //     // Send mail (this won't be reached unless you remove the dd)
    //     Mail::to('abbas.uddin@ronakoptik.com')
    //         ->cc('abbasbitm3655@gmail.com')
    //         ->send(new WorkAnniversaryMail($employee, $years));

    //     $this->info("✅ Test mail sent to abbas.uddin@ronakoptik.com (CC: abbasbitm3655@gmail.com) - {$years} year(s)");

    //     return SymfonyCommand::SUCCESS;
    // }

}

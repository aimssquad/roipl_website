<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        EmailTemplate::create([
            'name' => 'contact_form',
            'subject' => 'New Contact Form Submission',
            'body' => '
                <h2>You have received a new contact form submission:</h2>
                <p><strong>Name:</strong> {{ $data["name"] }}</p>
                <p><strong>Phone:</strong> {{ $data["phone"] }}</p>
                <p><strong>Email:</strong> {{ $data["email"] }}</p>
                <p><strong>Message:</strong> {{ $data["message"] }}</p>
            ',
        ]);
    }
}

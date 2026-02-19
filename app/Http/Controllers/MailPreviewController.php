<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;

class MailPreviewController extends Controller
{
    public function preview()
    {
        $user = [
            'name'  => 'Excelsior',
            'email' => 'excelsior@example.com',
        ];

        return new TestMail($user);
    }
}

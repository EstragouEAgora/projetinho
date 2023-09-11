<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /* Próprio do Laravel e permite que um email seja enviado
        para recuperar a conta e refazer a senha */

    use SendsPasswordResetEmails;
}

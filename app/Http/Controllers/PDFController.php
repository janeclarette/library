<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;

class PDFController extends Controller
{
    public function index()
    {
        $data=[
            'subject' => 'Test Subject',
            'body'=> 'Message From Customer',
            'path' => '/public'
        ]; 
    }
}

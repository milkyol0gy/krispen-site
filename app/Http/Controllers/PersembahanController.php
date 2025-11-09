<?php

// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersembahanController extends Controller
{
    // Add this method
    public function persembahan()
    {
        return view('Persembahan.persembahan');
    }
}

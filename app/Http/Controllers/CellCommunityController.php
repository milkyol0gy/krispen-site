<?php

namespace App\Http\Controllers;

use App\Models\CellCommunity;
use Illuminate\Http\Request;

class CellCommunityController extends Controller
{
    public function index()
    {
        $cellCommunities = CellCommunity::all();
        return view('main.cell-community.schedule', compact('cellCommunities'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display the lecturers directory.
     */
    public function index(Request $request)
    {
        $lecturers = Lecturer::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%");
            })
            ->orderBy('full_name')
            ->paginate(10)
            ->withQueryString();

        return view('lecturers.index', compact('lecturers'));
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // GET /api/people
    public function index(Request $request)
    {
        $people = Person::paginate(10);
        return response()->json($people);
    }
}

<?php

namespace App\Http\Controllers;

use App\Person\PersonRepository;

class PersonController extends Controller
{
    protected $persons;

    public function __construct(PersonRepository $persons)
    {
        $this->persons = $persons;
    }

    public function getIndex($groupBy)
    {
        $groupedPersons = $this->persons->getAll()->groupBy($groupBy);
        
        return view('index', compact('groupedPersons'));
    }
}

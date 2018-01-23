<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns all tickets and send to the view
     *
     * @return void
     */
    public function index()
    {
        return view('ticket.index', ['tickets' => Ticket::all()]);
    }

    public function create() 
    {
        $ticket = new Ticket();
        $states = $ticket->getStates();
        $types = $ticket->getTypes();
        $subjects = $ticket->getSubjects();
        
        return view('ticket.create', ['states' => $states, 'types' => $types, 'subjects' => $subjects]);
    }
}

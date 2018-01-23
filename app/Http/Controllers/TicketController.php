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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = $this->validate(request(), [
            'type' => 'required',
            'state' => 'required',
            'subject' => 'required',
            'details' => 'required'
        ]);
        Ticket::create($ticket);

        return back()->with('success', 'Chamado salvo com sucesso.');
    }
}

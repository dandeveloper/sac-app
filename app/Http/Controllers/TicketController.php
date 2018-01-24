<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{

    private $ticket;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ticket = new Ticket();
    }

    /**
     * Returns all tickets and send to the view
     *
     * @return void
     */
    public function index()
    {
        return view('ticket.index', ['tickets' => Ticket::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $states = $this->ticket->getStates();
        $types = $this->ticket->getTypes();
        $subjects = $this->ticket->getSubjects();
        
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

        return redirect('ticket')->with('success', 'Chamado salvo com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = $this->ticket->getStates();
        $types = $this->ticket->getTypes();
        $subjects = $this->ticket->getSubjects();
        
        $ticket = Ticket::find($id);
        return view('ticket.edit', compact('ticket', 'id', 'states', 'types', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $this->validate(request(), [
            'type' => 'required',
            'state' => 'required',
            'subject' => 'required',
            'details' => 'required'
        ]);

        $ticket->type = $request->get('type');
        $ticket->state = $request->get('state');
        $ticket->subject = $request->get('subject');
        $ticket->details = $request->get('details');

        $ticket->save();
        return redirect('ticket')->with('success', 'Chamado atualizado com sucesso.');
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('ticket.show', compact('ticket', 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Ticket::find($id);
        $product->delete();
        return redirect('/ticket')->with('success','Chamado excluido com sucesso.');
    }
}

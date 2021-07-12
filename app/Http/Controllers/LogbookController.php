<?php

namespace App\Http\Controllers;

use Akaunting\Firewall\Models\Log;
use App\Models\Logbook;
use App\Models\User;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function index()
    {

        $logbook = Logbook::all()
            ->where('idUser', auth()->user()->id);

        return view('tools.logbook.show', ['logbooks' => $logbook]);
    }

    public function create()
    {
        return view('tools.logbook.create');
    }

    public function show($id)
    {
        $logbook = Logbook::findOrFail($id);

        return view('tools.logbook.create', ['logbook' => $logbook]);
    }

    public function store(Request $request)
    {
        $logbook = new Logbook();

        $logbook->title = $request->logbookTitle;
        $logbook->text = $request->logbooktext;
        $logbook->idUser = auth()->user()->id;
        $logbook->save();

        return redirect('/tools/logbooks')->with('msg', 'Logbook criado com sucesso');
    }

    public function update(Request $request)
    {
        $logbook = Logbook::findOrFail($request->id);

        $logbook->title = $request->logbookTitle;
        $logbook->text = $request->logbooktext;
        $logbook->save();

        return redirect('/tools/logbooks')
            ->with('msg', 'Logbook atualizado com sucesso');
    }

    public function destroy($id)
    {
        $logbook = Logbook::findOrFail($id)->delete();

        return redirect('/tools/logbooks')
            ->with('msg', 'Logbook excluído com sucesso');
    }

    public function indexreport()
    {
        $logbooks = User::with('logbooks')
            ->get();

        return view('reports.logbooks.show', ['logbooks' => $logbooks]);
    }

    public function showreport($id)
    {
        $logbook = Logbook::with('user')
            ->where('logbooks.id', $id)
            ->get();

        return view('reports.logbooks.showlogbook', ['logbook' => $logbook[0]]);
    }
}

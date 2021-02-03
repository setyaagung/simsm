<?php

namespace App\Http\Controllers;

use App\Model\Inbox;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        $inboxes = Inbox::orderBy('inbox_received_date', 'ASC')->get();
        return view('inbox.index', compact('inboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inbox.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = 'SuratMasuk-' . time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/surat_masuk', $request->file('file'), $filename);
        }
        Inbox::create($data);
        return redirect()->route('inbox.index')->with('create', 'Data surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inbox = Inbox::findOrFail($id);
        return view('inbox.show', compact('inbox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inbox = Inbox::findOrFail($id);
        return view('inbox.edit', compact('inbox'));
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
        $inbox = Inbox::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('file')) {
            Storage::delete($inbox->file);
            $file = $request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $filename = 'SuratMasuk-' . time() . '.' . $file_extension;
            $data['file'] = Storage::putFileAs('public/surat_masuk', $request->file('file'), $filename);
        }
        $inbox->update($data);
        return redirect()->route('inbox.index')->with('update', 'Data surat masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\SupportDetails;
use App\Models\PhotoSupport;
use App\Http\Controllers\Storage;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Support::all();
        return view('support_admin.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('support_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support, $id)
    {
        $data = Support::where('id', $id)->get();
        $data->load('SupportDetails');
        return view('support_admin.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support, $id)
    {
        $data = $request->all();

        if ($request->status == null) {
            if ($request->hasFile('photo_details')) {
                // Do something with the file
                $data['photo_details'] = $request->file('photo_details')->store('/images/photo_details', 'public');
            }
            SupportDetails::create([
                'id_support' => $id,
                'users_id' => $data['users_id'],
                'description' => $data['description'],
                'photo_details' => $data['photo_details'] ?? null,
            ]);
            $item = Support::where('id', $id)->update([
                'status' => 'Menunggu Di Balas Oleh Anda.',
            ]);

            return redirect()
                ->route('support-admin.index')
                ->with('Success', 'Balasan Telah Ditambakan !!');
        } else {
            $item = Support::where('id', $id)->update([
                'status' => $request->status,
            ]);

            return redirect()
                ->route('support-admin.index')
                ->with('Success', 'Status Telah Diupdate !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support, $id)
    {
        $details = SupportDetails::where('id_support', $id)->get();
        if ($details[0]->photo_details ?? null) {
            Storage::delete('public/' . $details[0]->photo_details);
        }
        $details->map->delete();

        $supp = Support::findOrFail($id);
        $photo = PhotoSupport::findOrFail($supp->photo_support_id);

        \Storage::delete('public/' . $photo);
        $photo->delete();
        $supp->delete();

        return redirect()
            ->route('support-admin.index')
            ->with('Success', 'Ticket Support Telah Dihapus !!');
    }
}

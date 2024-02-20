<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\SupportDetails;
use App\Models\PhotoSupport;
use App\Models\CategoryServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupportUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = Support::where('users_id', $request->id)->get();

        return view('support_user.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = CategoryServices::all();
        return view('support_user.create', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $id_support = Str::random(12);

        $data['id'] = $id_support;

        if ($request->hasFile('photo_support')) {
            // Do something with the file
            $photo_support = $request->file('photo_support')->store('/images/photo_support', 'public');
        }

        $photo = PhotoSupport::create([
            'photo' => $photo_support,
        ]);

        Support::create([
            'id' => $data['id'],
            'users_id' => $data['users_id'],
            'id_cat_services' => $data['id_cat_services'],
            'description' => $data['description'],
            'photo_support_id' => $photo->id,
            'status' => 'Menunggu Di Balas Oleh Admin.',
        ]);

        return redirect()
            ->route('support-user.index', ['id' => $data['users_id']])
            ->with('Success', 'Ticket Support Telah Ditambahkan !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support, $id)
    {
        $data = Support::where('id', $id)->get();
        $data->load('supportDetails');

        return view('support_user.edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support, $id)
    {
        $data = Support::where('id', $id)->get();
        $data->load('SupportDetails');
        return view('support_user.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support, $id)
    {
        $data = $request->all();

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
            'status' => 'Menunggu Di Balas Oleh Admin.',
        ]);

        return redirect()
            ->route('support-user.index', ['id' => $data['users_id']])
            ->with('Success', 'Balasan Telah Ditambakan !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }
}

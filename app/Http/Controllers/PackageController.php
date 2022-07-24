<?php

namespace App\Http\Controllers;

use App\Http\Requests\Package as RequestsPackage;
use App\Http\Requests\TransactionRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();

        // return $packages;
        return view('pages.admin.daftar-paket', [
            'items' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tambah-paket');
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

        // return $data;
        Package::create($data);

        return redirect()->route('daftar-paket')->with('message', 'Berhasil Simpan Data Paket.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package_id = $id;
        $package = Package::find($package_id);
        if ($package) {
            return response()->json(['status' => 'true', 'message' => 'Data Found', 'data' => $package], 200);
        }
        return response()->json(['status' => 'false', 'message' => 'Data Not Found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);

        return view('pages.admin.edit-paket', [
            'package' => $package
        ]);
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
        $package = Package::find($id);
        $data = $request->all();

        $package->name = $data['name'];
        $package->description = $data['description'];
        $package->price = $data['price'];

        $package->save();

        // return ['paket' => $package, 'data' => $data];
        return redirect()->route('daftar-paket')->with('message', 'Berhasil Rubah Data Paket.');
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

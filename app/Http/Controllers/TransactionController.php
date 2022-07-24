<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Transient;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::with('details')->get();
        return $transaction;
        $transactions = Transaction::all();

        return view('pages.daftar-transaksi', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tambah-transaksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();

        // return $data;
        DB::beginTransaction();
        try {
            //create transaction
            $transaction = Transaction::create([
                'name' => $data['name'],
                'hp' => $data['hp'],
                'address' => $data['address'],
                'total' => $data['total']
            ]);
            //create transaction details
            foreach ($data['package_name'] as $key => $value) {
                $split = explode(',', $data['package_name'][$key]);
                $package_name = $split[1];
                $package_id = $split[0];

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'transaction_code' => $transaction->code,
                    'package_id' => $package_id,
                    'package_name' => $package_name,
                    'package_price' => $data['package_price'][$key],
                    'berat' => $data['berat'][$key],
                    'jumlah' => $data['jumlah'][$key],
                    'description' => $data['description'][$key]
                ]);
            }
            DB::commit();
            return redirect()->route('transaksi')->with('message', 'Berhasil simpan data request.');
            //code...
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tambah-transaksi')->with('message', $e->getMessage());
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Bagus Sri Wisnu', 'nim' => '3125600078', 'email' => 'wisnu@pens.ac.id', 'nomor_telepon' => '081234567890', 'alamat' => 'Surabaya', 'status' => 'Aktif'],
        ['id' => 2, 'nama' => 'Ahmad Fauzi', 'nim' => '3125600079', 'email' => 'fauzi@pens.ac.id', 'nomor_telepon' => '081298765432', 'alamat' => 'Sukolilo, Surabaya', 'status' => 'Aktif'],
    ];

    public function index()
    {
        $members = $this->members;
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();
        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id) { return "MemberController@show, id: {$id}"; }
    public function edit(string $id) { return "MemberController@edit, id: {$id}"; }
    public function update(Request $request, string $id) { return "MemberController@update, id: {$id}"; }
    public function destroy(string $id) { return "MemberController@destroy, id: {$id}"; }
}
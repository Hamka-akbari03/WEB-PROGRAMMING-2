<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::latest('id_member')->paginate(10);

        return view('member.index', compact('members'));
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_member' => ['required', 'string'],
            'nomor_member' => ['required', 'string', 'unique:member,nomor_member'],
            'alamat' => ['required', 'string'],
            'tgl_mendaftar' => ['required', 'date'],
            'tgl_terakhir_bayar' => ['required', 'date'],
        ]);

        Member::create($validated);

        return redirect()->route('member.index')->with('success', 'Data member berhasil ditambahkan.');
    }

    public function edit(Member $member): View
    {
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $validated = $request->validate([
            'nama_member' => ['required', 'string'],
            'nomor_member' => ['required', 'string', 'unique:member,nomor_member,'.$member->id_member.',id_member'],
            'alamat' => ['required', 'string'],
            'tgl_mendaftar' => ['required', 'date'],
            'tgl_terakhir_bayar' => ['required', 'date'],
        ]);

        $member->update($validated);

        return redirect()->route('member.index')->with('success', 'Data member berhasil diperbarui.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $member->delete();

        return redirect()->route('member.index')->with('success', 'Data member berhasil dihapus.');
    }
}
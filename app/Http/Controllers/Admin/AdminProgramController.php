<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;

class AdminProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.form', ['program' => new Program()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaprogram' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.form', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'namaprogram' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'nullable|string|max:100',
        ]);
        $program = Program::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($program->image && Storage::disk('public')->exists($program->image)) {
                Storage::disk('public')->delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }
        $program->update($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->image && Storage::disk('public')->exists($program->image)) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return back()->with('success', 'Data program berhasil dihapus.');
    }

}

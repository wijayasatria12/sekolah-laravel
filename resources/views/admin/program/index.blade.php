@extends('admin.layout')

@section('content')
<div class="p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">
      <i class="fa-solid fa-trophy text-green-600"></i> Daftar Program Unggulan</h1>
    <a href="{{ route('admin.program.form') }}"
      class="bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600
              hover:from-blue-500 hover:via-indigo-600 hover:to-blue-700
              text-white px-5 py-2.5 rounded-full shadow-md flex items-center gap-2
              transition-all duration-300 ease-out hover:scale-[1.03] hover:shadow-lg">
      <i class="fa-solid fa-plus text-sm"></i>
      <span class="font-medium">Tambah Program</span>
    </a>
  </div>

  @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white rounded-xl shadow">
    <table class="min-w-full text-sm text-gray-600">
      <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
        <tr class="bg-gradient-to-r from-green-500 to-emerald-500 text-white">
          <th class="px-6 py-3 text-left">#</th>
          <th class="px-6 py-3 text-left">Gambar</th>
          <th class="px-6 py-3 text-left">Nama Program</th>
          <th class="px-6 py-3 text-left">Deskripsi</th>
          <th class="px-6 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($programs as $index => $p)
        <tr class="border-b hover:bg-gray-50 transition">
          <td class="px-6 py-3">{{ $index + 1 }}</td>
          <td class="px-6 py-3">
            @if($p->image)
              <img src="{{ asset('storage/'.$p->image) }}" class="w-16 h-16 rounded-lg object-cover">
            @else
              <div class="w-16 h-16 bg-gray-200 flex items-center justify-center rounded-lg">
                <i class="fa-solid fa-image text-gray-400"></i>
              </div>
            @endif
          </td>
          <td class="px-6 py-3 font-semibold text-gray-700">{{ $p->namaprogram }}</td>
          <td class="px-6 py-3">{{ Str::limit($p->deskripsi, 100) }}</td>
          <td class="px-6 py-3 text-center flex justify-center gap-2">
            <a href="{{ route('admin.program.edit', $p->id) }}"
               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-600 hover:text-white transition-all duration-200">
               <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('admin.program.destroy', $p->id) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus program ini?')" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="w-8 h-8 flex items-center justify-center rounded-full bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data program</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

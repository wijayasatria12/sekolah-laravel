@extends('admin.layout')

@section('content')
<div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <i class="fa-solid fa-user-graduate text-green-600"></i>
      Kelola Pendaftaran Siswa
    </h2>
    @if (session('success'))
      <span class="text-green-600 text-sm font-medium">{{ session('success') }}</span>
    @endif
  </div>

  <form action="{{ route('admin.pendaftaran.index') }}" method="GET" class="flex items-center gap-2 mb-4">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Cari nama, NISN, email..."
           class="px-4 py-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none w-64 text-sm">

    <button class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 text-sm">
        Cari
    </button>

    @if(request('search'))
        <a href="{{ route('admin.pendaftaran.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded-xl hover:bg-gray-400 text-sm">
           Reset
        </a>
    @endif

    {{-- Tombol Export Excel --}}
    <a href="{{ route('admin.pendaftaran.export.excel') }}"
       class="ml-auto px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 text-sm flex items-center gap-2">
       <i class="fa-solid fa-file-excel"></i> Export Excel
    </a>
</form>



  <div class="overflow-x-auto">
    <table class="min-w-full border-collapse text-sm text-gray-600">
      <thead>
        <tr class="bg-gradient-to-r from-green-500 to-emerald-500 text-white">
          <th class="px-4 py-3 text-left rounded-tl-lg">#</th>
          <th class="px-4 py-3 text-left">Nama Lengkap</th>
          <th class="px-4 py-3 text-left">NISN</th>
          <th class="px-4 py-3 text-left">Email</th>
          <th class="px-4 py-3 text-left">Asal Sekolah</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-center rounded-tr-lg">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pendaftaran as $index => $siswa)
          <tr class="bg-white/50 backdrop-blur-md border-b border-gray-200 hover:bg-green-50 transition-all duration-200">
            <td class="px-4 py-3 font-semibold text-gray-800">{{ $index + 1 }}</td>
            <td class="px-4 py-3">{{ $siswa->nama_lengkap }}</td>
            <td class="px-4 py-3">{{ $siswa->nisn }}</td>
            <td class="px-4 py-3">{{ $siswa->email }}</td>
            <td class="px-4 py-3">{{ $siswa->asal_sekolah }}</td>
            <td class="px-4 py-3">
              @if ($siswa->status_pendaftaran == 'diterima')
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Diterima</span>
              @elseif ($siswa->status_pendaftaran == 'menunggu')
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Menunggu</span>
              @else
                <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-medium">Ditolak</span>
              @endif
            </td>
            
            <td class="px-4 py-3 text-center">
              {{-- Tombol Detail --}}
              <a href="{{ route('admin.pendaftaran.showdetail', $siswa->id) }}"
                 class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                 title="Detail">
                <i class="fa-solid fa-eye"></i>
              </a>

              {{-- Tombol Edit --}}
              <a href="{{ route('admin.pendaftaran.edit', $siswa->id) }}"
                 class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-600 hover:text-white transition-all duration-200 mx-1"
                 title="Edit">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>

              {{-- Tombol Hapus --}}
              <form action="{{ route('admin.pendaftaran.destroy', $siswa->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200"
                        title="Hapus">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-6 text-gray-500">Tidak ada data pendaftaran.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="flex justify-end mt-6">
        {{ $pendaftaran->links('pagination::tailwind') }}
      </div>
      <style>
        /* warnanya backgroundnya masih hitam, belum putih */
        .pagination {
          display: flex;
          align-items: center;
          justify-content: flex-end;
          gap: 4px;
          font-size: 0.875rem;
        }
        .pagination li a,
        .pagination li span {
          padding: 0.45rem 0.85rem;
          border: 1px solid #e2e8f0;
          border-radius: 0.5rem;
          background-color: #ffffff;
          color: #1e293b;
          transition: all 0.2s ease;
        }
        .pagination li a:hover {
          background-color: #f1f5f9; /* abu muda saat hover */
        }
        .pagination li.active span {
          background-color: #2563eb; /* biru tailwind */
          color: #fff;
          border-color: #2563eb;
        }
        .pagination li.disabled span {
          opacity: 0.5;
          cursor: not-allowed;
        }
      </style>

  </div>
</div>
@endsection

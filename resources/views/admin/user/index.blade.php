@extends('admin.layout')

@section('content')
<div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <i class="fa-solid fa-users text-green-600"></i>
      Kelola Admin
    </h2>
    <a href="{{ route('admin.user.form') }}"
      class="bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600
              hover:from-blue-500 hover:via-indigo-600 hover:to-blue-700
              text-white px-5 py-2.5 rounded-full shadow-md flex items-center gap-2
              transition-all duration-300 ease-out hover:scale-[1.03] hover:shadow-lg">
      <i class="fa-solid fa-plus text-sm"></i>
      <span class="font-medium">Tambah Admin</span>
    </a>
  </div>
  
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
        </div>
    @endif

  <div class="overflow-x-auto">
    <table class="min-w-full border-collapse text-sm text-gray-600">
      <thead>
        <tr class="bg-gradient-to-r from-green-500 to-emerald-500 text-white">
          <th class="px-6 py-3 text-left">#</th>
          <th class="px-6 py-3 text-left">Nama User</th>
          <th class="px-6 py-3 text-left">Email User</th>
          <th class="px-6 py-3 text-left">Created At</th>
          <th class="px-6 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $index => $p)
          <tr class="bg-white/50 backdrop-blur-md border-b border-gray-200 hover:bg-green-50 transition-all duration-200">
            <td class="px-4 py-3 font-semibold text-gray-800">{{ $index + 1 }}</td>
            <td class="px-6 py-3 font-semibold text-gray-700">{{ $p->name }}</td>
            <td class="px-6 py-3">{{ Str::limit($p->email, 100) }}</td>
            <td class="px-6 py-3 text-gray-700">{{ $p->created_at->format('d-m-Y') }}</td>
            <td class="px-6 py-3 text-center flex justify-center gap-2">
            <a href="{{ route('admin.user.edit', $p->id) }}"
               class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 hover:bg-yellow-600 hover:text-white transition-all duration-200">
               <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <form action="{{ route('admin.user.destroy', $p->id) }}" method="POST"
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
            <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

      <div class="flex justify-end mt-6">
        {{ $users->links('pagination::tailwind') }}
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

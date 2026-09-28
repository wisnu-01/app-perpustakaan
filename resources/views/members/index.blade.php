@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>
    <p><a href="{{ route('members.create') }}" class="btn">+ Tambah Anggota</a></p>

    <!-- Form Pencarian -->
    <form action="{{ route('members.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari nama anggota..." value="{{ request('search') }}" style="padding: 6px; width: 250px;">
        <button type="submit" class="btn">Cari</button>
        @if(request('search'))
            <a href="{{ route('members.index') }}" style="margin-left: 10px;">Reset</a>
        @endif
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nama</th><th>NIM</th><th>Email</th><th>No. Telepon</th><th>Status</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <!-- Pemanggilan data diubah dari array ['field'] menjadi object ->field -->
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nim }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form class="inline" action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align: center;">Belum ada data anggota.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection
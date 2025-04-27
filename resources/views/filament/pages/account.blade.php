@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="space-y-4 py-2">
    <h1 class="text-xl font-bold pb-4">
        Account
    </h1>

    <div class="card bg-red-100">
        <div class="card-body">
            <div class="d-flex justify-between items-center mt-2">
        </div>

        <div class="overflow-x-auto">
            <table class="table table-bordered table-striped w-full">
                <thead>
                    <tr class="text-semibold bg-red-700 text-white">
                        <th class="align-top text-center">Nama Lengkap</th>
                        <th class="align-top text-center">Email</th>
                        <th class="align-top text-center">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="bg-white text-center">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <div>{{ $role->name }}</div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <nav class="mt-4">
                <ul class="pagination">
                    <!-- Pagination -->
                    {{ $users->links() }}
                </ul>
            </nav>
        </div>
    </div>
    </div>
</div>
@endsection
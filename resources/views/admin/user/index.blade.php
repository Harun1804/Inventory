@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Admin</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('user.create') }}" class="btn-toggle-minified"><i
                    class="lnr lnr-plus-circle"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                @if ($u->role == 'admin')
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ url('/admin/user/'.$u->id.'/edit') }}" class="btn btn-sm btn-warning d-inline"><i class="lnr lnr-pencil"></i></a>
                            </div>
                            <div class="col-6">
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-delete delete" id="{{ $u->id }}"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $user->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Petugas Gudang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('user.create') }}" class="btn-toggle-minified"><i
                    class="lnr lnr-plus-circle"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                @if ($u->role == 'pg')
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ url('/admin/user/'.$u->id.'/edit') }}" class="btn btn-sm btn-warning d-inline"><i class="lnr lnr-pencil"></i></a>
                            </div>
                            <div class="col-6">
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-delete delete" id="{{ $u->id }}"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $user->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Pemilik</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('user.create') }}" class="btn-toggle-minified"><i
                    class="lnr lnr-plus-circle"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                @if ($u->role == 'pemilik')
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ url('/admin/user/'.$u->id.'/edit') }}" class="btn btn-sm btn-warning d-inline"><i class="lnr lnr-pencil"></i></a>
                            </div>
                            <div class="col-6">
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-delete delete" id="{{ $u->id }}"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $user->links() }}</div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">User Purchasing</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('user.create') }}" class="btn-toggle-minified"><i
                    class="lnr lnr-plus-circle"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                @if ($u->role == 'pc')
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ url('/admin/user/'.$u->id.'/edit') }}" class="btn btn-sm btn-warning d-inline"><i class="lnr lnr-pencil"></i></a>
                            </div>
                            <div class="col-6">
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-delete delete" id="{{ $u->id }}"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md">{{ $user->links() }}</div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script>
        $('.delete').click(function(){
        var id = $(this).attr('id');
        swal({
            title: "Yakin ?",
            text: "Mau Menghapus Data Ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    window.location = "/admin/user/"+id;
                }
            });
        });
    </script>
@endsection

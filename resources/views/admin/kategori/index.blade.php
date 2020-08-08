@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Kategori</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
            <a href="{{ route('kategori.create') }}" class="btn-toggle-minified"><i
                    class="lnr lnr-plus-circle"></i></a>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ url('/admin/kategori/'.$k->id.'/edit') }}" class="btn btn-sm btn-warning d-inline"><i class="lnr lnr-pencil"></i></a>
                            </div>
                            <div class="col-6">
                                <form method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-delete delete" id="{{ $k->id }}"><i class="lnr lnr-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $kategori->links() }}
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
                    window.location = "/admin/kategori/"+id;
                }
            });
        });
    </script>
@endsection

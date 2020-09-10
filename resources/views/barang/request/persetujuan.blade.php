@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Persetujuan</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body">
        <form class="form-auth-small" action="{{ url('/pc/permintaan/'.$transaksi->id.'/persetujuan') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $key => $kt)
                    <option value="{{ $kt->id }}">{{ $kt->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select class="form-control" id="supplier" name="supplier">
                    <option disabled selected>NA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alasan" class="control-label sr-only">Alasan</label>
                <input type="text" class="form-control" id="alasan" placeholder="Masukan Alasan" name="alasan">
            </div>
            <button type="submit" class="btn btn-info" name="approve" value="diterima">Setuju</button>
            <button type="submit" class="btn btn-danger" name="approve" value="ditolak">Tolak</button>
        </form>
    </div>
</div>
@endsection
@section('footer')
    <script>
        $(document).ready(function(){
            $('#kategori_id').on('change',function(e){
                var kategori_id = e.target.value;
                $.get('/pc/permintaan/supplier?kategori_id='+kategori_id,function(data){
                    $('#supplier').empty();
                    $('#supplier').append('<option disable="true" selected="true">Pilih Supplier</option>');
                        $.each(data, function(index, supplier){
                            $('#supplier').append('<option value="'+ supplier.id +'">'+ supplier.user.name +'</option>');
                        });
                });
            });
        });
    </script>
@endsection


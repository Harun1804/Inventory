@extends('layouts/master')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Pengecekan Barang Berdasarkan Kategori</h3>
    </div>
    <div class="panel-body">
        <form action="" method="get">
            @csrf
            <div class="form-group" id="kategori">
                <label for="kategori">Pilih Kategori</label>
                <select class="form-control" id="kategori" name="kategori" @change="onChange($event)" v-model="key">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($kategori as $ktgr)
                        <option value="{{ $ktgr->id }}">{{ $ktgr->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Tabel Barang</h3>
        <div class="right">
            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
        </div>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Rak</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 text-right"></div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    var kategori = new Vue({
        el : '#kategori',
        data : {
            key:""
        },
        methods: {
            onChange(event){
                console.log(event.target.value)
            }
        },
    });
</script>
@endsection

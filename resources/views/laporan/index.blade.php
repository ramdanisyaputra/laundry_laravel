@extends('layouts.template')
@section('content')
<title>Laporan Data</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Masukan Tanggal</h6>
    </div>
    <div class="card-body">
        <form action="/laporan_masuk" method="post">

            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Dari Tanggal</label>
                        <input type="date" name="tanggal1" required class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Sampai Tanggal</label>
                        <input type="date" name="tanggal2" required class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Status Bayar</label>
                        <select name="status_bayar" id="" class="form-control" required>
                            <option value="" disabled selected>Pilih Status Bayar</option>
                            <option value="dibayar">Lunas</option>
                            <option value="belum_dibayar">Belum Bayar</option>
                        </select>
                    </div>
                </div>
            </div>
            <center><input type="submit" class="btn btn-success"></center>
      </form>
<br>
    </div>
</div>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Laporan Transaksi</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    @if ($hitung == 0)
        
    @else
    <div class="row">
    <div class="col-md-10">
    <form action="/laporan/export_excel">
        <input type="hidden" name="tanggal1" value="{{$req1}}">
        <input type="hidden" name="tanggal2" value="{{$req2}}">
        <input type="hidden" name="status_bayar" value="{{$req3}}">
       <input type="submit" class="btn btn-warning" value="EXPORT EXCEL">
       
       </form>
       </div>
       <div class="col-md-2">
    <form action="/laporan/export_pdf">
        <input type="hidden" name="tanggal1" value="{{$req1}}">
        <input type="hidden" name="tanggal2" value="{{$req2}}">
        <input type="hidden" name="status_bayar" value="{{$req3}}">
       <input type="submit" class="btn btn-danger" value="EXPORT PDF">
       
       </form>
       </div>
       </div>
    @endif  
       <br>
    @include('laporan.table', $transaksi )

  </div>
</div>

  
@endsection
@extends('layout.v_template')
@section('title', 'Detail Absen')

@section('content')

<div class="box">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th width="150px">Nama</th>
                <th width="30px">:</th>
                <th>{{ $detail->nama }}</th>
            </tr>
            <tr>
                <th width="150px">Perusahaan</th>
                <th width="30px">:</th>
                <th>{{ $detail->perusahaan }}</th>
            </tr>
            <tr>
                <th width="150px">Ruang</th>
                <th width="30px">:</th>
                <th>{{ $detail->ruang }}</th>
            </tr>
            <tr>
                <th width="150px">Kegiatan</th>
                <th width="30px">:</th>
                <th>{{ $detail->kegiatan }}</th>
            </tr>
            <tr>
                <th width="150px">Penanggung Jawab</th>
                <th width="30px">:</th>
                <th>{{ $detail->tanggung_jawab }}</th>
            </tr>
            <tr>
                <th width="150px">Tanggal Masuk</th>
                <th width="30px">:</th>
                <th>{{ $detail->tglmasuk }}</th>
            </tr>
            <tr>
                <th width="150px">Jam Masuk</th>
                <th width="30px">:</th>
                <th>{{ $detail->jammasuk }}</th>
            </tr>
            <tr>
                <th width="150px">Tanggal Keluar</th>
                <th width="30px">:</th>
                <th>{{ $detail->tglkeluar }}</th>
            </tr>
            <tr>
                <th width="150px">Jam Keluar</th>
                <th width="30px">:</th>
                <th>{{ $detail->jamkeluar }}</th>
            </tr>
            <tr>
                <th><a href="/absenkeluar" class="btn btn-success tbn-sm">Kembali</a></th>
            </tr>
        </table>
    </div>
</div>

@endsection

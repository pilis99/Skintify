@extends('layouts/main')
@section('title','Profile')
@section('artikel')
    <div class="card">
        <div class="card-header">
            <a href="/skin/add-form" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Skin</a>
        </div>
        <div class="card-body">
            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('alert')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
        <!-- tabel disini -->
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th> No</th>
                <th> Nama</th>
                <th> Jenis</th>
                <th> Harga</th>
                <th> Gambar</th>
                <th> Aksi</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($mv as $idx => $m)
            <tr>        
                <td> {{$idx +1}}</td>
                <td> {{$m->nama}}</td>
                <td> {{$m->jenis}}</td>
                <td> {{$m->harga}}</td>
                <td>
                    <img src="{{ asset('/storage/'.$m->gambar)}}"alt="{{$m->gambar}}" height="80" widht="80"></td>
                </td>
                <td>
                    <a href="/skin/form-edit/{{$m->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="/delete/{{$m->id}}"class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
@endsection
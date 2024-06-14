@extends('layouts.main')
@section('title', 'formeditskin')
@section('artikel')

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <!-- form edit skin disini -->
            <form action="/update/{{$mv->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$mv->nama}}" required>
                
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control">
                    <option value="0">--Pilih Jenis--</option>
                    <option value="FacialWash" {{($mv->jenis=="FacialWash") ? "selected":""}}>FacialWash</option>
                    <option value="Sunscreen" {{($mv->jenis=="Sunscreen") ? "selected":""}}>Sunscreen</option>
                    <option value="Toner" {{($mv->jenis=="Toner") ? "selected":""}}>Toner</option>
                    <option value="Cream Pagi" {{($mv->jenis=="Cream Pagi") ? "selected":""}}>Cream Pagi</option>
                    <option value="Cream Malam" {{($mv->jenis=="Cream Malam") ? "selected":""}}>Cream Malam</option>
                <select>
                </div>

                <div class="form-group">
                <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value = "{{$mv->harga}}" require>
                </div>

                <div class="form-group">
                <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" accept="image/*" value="{{$mv->gambar}}">
                </div>

                <div class="form-group">
                    <img src="{{ asset('/storage/'.$mv->gambar)}}"alt="{{$mv->gambar}}" height="80" widht="80"></td>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
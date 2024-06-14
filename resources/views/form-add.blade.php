@extends('layouts.main')
@section('title', 'formaddskin')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <!-- form add skin disini -->
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control">
                    <option value="0">--Jenis Skincare-</option>
                    <option value="FacialWash">FacialWash</option>
                    <option value="Sunscreen">Sunscreen</option>
                    <option value="Toner">Toner</option>
                    <option value="Cream Pagi">Cream Pagi</option>
                    <option value="Cream Malam">Cream Malam</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Harga</label>
                    <input type="number" name="harga" class="form-control" require>
                </div>
                <div class="form-group">
                <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
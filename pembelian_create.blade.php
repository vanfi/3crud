@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Tambah Pembelian</h1>
            <hr>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('pembelian.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="kd_barang">Kode Barang : </label>
                    <input type="string" class="form-control" id="kd_barang" name="kd_barang">
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah : </label>
                    <input type="string" class="form-control" id="jml" name="jml">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Total Harga : </label>
                    <input type="string" class="form-control" id="total_harga" name="total_harga">
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn=md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection
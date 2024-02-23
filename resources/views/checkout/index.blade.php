@extends('slider.index')

@section('ecom')
    <div class="container mt-3">
        <form action="/order" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Pengiriman</h3>
                            <hr>
                          {{-- Pengisian form alamat pengiriman --}}
                            <div class="row checkout-form">
                                  <div class="mb-3">
                                    <label for="productnama" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->nama }}" id="Nama" name="Nama">
                                  </div>
                                  <div class="mb-3">
                                    <label for="productnotelp" class="form-label">No. Telepon:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->notelp }}" id="Notelp" name="Notelp">
                                  </div>
                                  <div class="mb-3">
                                    <label for="productAlamat" class="form-label">Alamat:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Alamat }}" id="Alamat" name="Alamat">
                                  </div>
                                  <div class="mb-3">
                                    <label for="productKecamatan" class="form-label">Kecamatan:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Kecamatan }}" id="Kecamatan" name="Kecamatan">
                                  </div>              
                                  <div class="mb-3">
                                    <label for="productKabupaten" class="form-label">Kabupaten:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Kabupaten }}" id="Kabupaten" name="Kabupaten">
                                  </div>              
                                  <div class="mb-3">
                                    <label for="productProvinsi" class="form-label">Provinsi:</label>
                                    <select id="Provinsi" class="form-select" name="Provinsi">
                                      <option selected>Pilih Provinsi</option>
                                      <option value="{{ Auth::user()->Provinsi,"Nanggroe Aceh Darussalam"}}">Nanggroe Aceh Darussalam</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sumatera Utara"}}">Sumatera Utara</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sumatera Selatan"}}">Sumatera Selatan</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sumatera Barat"}}">Sumatera Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Bengkulu"}}">Bengkulu</option>
                                      <option value="{{ Auth::user()->Provinsi,"Riau"}}">Riau</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kepulauan Riau"}}">Kepulauan Riau</option>
                                      <option value="{{ Auth::user()->Provinsi,"Jambi"}}">Jambi</option>
                                      <option value="{{ Auth::user()->Provinsi,"Lampung"}}">Lampung</option>
                                      <option value="{{ Auth::user()->Provinsi,"Bandar Lampung"}}">Bandar Lampung</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kalimantan Barat"}}">Kalimantan Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kalimantan Timur"}}">Kalimantan Timur</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kalimantan Selatan"}}">Kalimantan Selatan</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kalimantan Tengah"}}">Kalimantan Tengah</option>
                                      <option value="{{ Auth::user()->Provinsi,"Kalimantan Utara"}}">Kalimantan Utara</option>
                                      <option value="{{ Auth::user()->Provinsi,"Banten"}}">Banten</option>
                                      <option value="{{ Auth::user()->Provinsi,"DKI Jakarta"}}">DKI Jakarta</option>
                                      <option value="{{ Auth::user()->Provinsi,"Jawa Barat"}}">Jawa Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Jawa Tengah"}}">Jawa Tengah</option>
                                      <option value="{{ Auth::user()->Provinsi,"DI Yogyakarta"}}">DI Yogyakarta</option>
                                      <option value="{{ Auth::user()->Provinsi,"Jawa Timur"}}">Jawa Timur</option>
                                      <option value="{{ Auth::user()->Provinsi,"Bali"}}">Bali</option>
                                      <option value="{{ Auth::user()->Provinsi,"Nusa Tenggara Timur"}}">Nusa Tenggara Timur</option>
                                      <option value="{{ Auth::user()->Provinsi,"Nusa Tenggara Barat"}}">Nusa Tenggara Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Gorontalo"}}">Gorontalo</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sulawesi Barat"}}">Sulawesi Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sulawesi Timur"}}">Sulawesi Timur</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sulawesi Selatan"}}">Sulawesi Selatan</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sulawesi Tengah"}}">Sulawesi Tengah</option>
                                      <option value="{{ Auth::user()->Provinsi,"Sulawesi Utara"}}">Sulawesi Utara</option>
                                      <option value="{{ Auth::user()->Provinsi,"Maluku Utara"}}">Maluku Utara</option>
                                      <option value="{{ Auth::user()->Provinsi,"Maluku"}}">Maluku</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua Barat"}}">Papua Barat</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua"}}">Papua</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua Tengah"}}">Papua Tengah</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua Pegunungan"}}">Papua Pegunungan</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua Selatan"}}">Papua Selatan</option>
                                      <option value="{{ Auth::user()->Provinsi,"Papua Barat Daya"}}">Papua Barat Daya</option>                  
                                  </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="productKodepos" class="form-label">Kodepos:</label>
                                    <input type="text" value="{{ Auth::user()->Kodepos }}" id="Kodepos" name="Kodepos">
                                  </div>
                                  <div class="mb-3">
                                    <label for="productketerangan" class="form-label">Keterangan:</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->Keterangan }}" id="Keterangan" name="Keterangan">
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
                {{-- Detail barang yang dibeli --}}
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Pembelian</h3>
                            <hr>
                            <table class="table table-responsive-xl">
                                <thead>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga/pc</th>
                                </thead>
                                <tbody>
                                    @foreach ($cartco as $co)
                                        <tr>
                                            <td>{{ $co->products->name }}</td>
                                            <td class="text-center">{{ $co->prod_qty }}</td>
                                            <td class="text-center">{{ $co->products->sellprice }}</td>   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-outline-primary float-end mb-3">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
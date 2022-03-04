{{-- @extends('layout.index')

@section('content')

    <section> --}}
<!-- Modal -->
<form action="{{ url('barangs') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                            <input name="nama_barang" type="text" class="form-control" id="formGroupExampleInput" required>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="jenis" class="col-form-label">jenis Bahan Baku</label>
                                        <form>
                                            <div class="row ">
                                                <div class="form-group">
                                                    <select class="form-control" name="jenis">
                                                        <option>~ Pilih Satuan ~</option>
                                                        <option>Pcs</option>
                                                        <option>Lusin</option>
                                                        <option>Pack</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">jumlah Stok Barang</label>
                            <input name="jumlah" type="number" class="form-control" id="exampleFormControlTextarea1" required>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Harga Barang</label>
                            <input name="harga" type="number" class="form-control" id="exampleFormControlTextarea1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterngan</label>
                            <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1"
                            rows="3">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- </section>
@endsection --}}


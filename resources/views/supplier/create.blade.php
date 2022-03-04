{{-- @extends('layout.index')

@section('content')

    <section> --}}
<!-- Modal -->
<form action="{{ url('supliers') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Suplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="formGroupExampleInput" class="form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Nama Perusahaan / Suplier" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="formGroupExampleInput2" class="form-label">Telepon</label>
                            <input name="telepon" type="number" class="form-control" id="formGroupExampleInput2"
                                placeholder="No telephone" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input name="mail" class="form-control" id="exampleFormControlTextarea1" required>
                    </div>
                    <div class="col">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
                            rows="3" required></textarea>
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


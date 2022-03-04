{{-- @extends('layout.index')

@section('content')

    <section> --}}
<!-- Modal -->
<form action="{{ url('akuns') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="formGroupExampleInput" class="form-label">Nama User</label>
                            <input name="nama" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="formGroupExampleInput2" class="form-label">username</label>
                            <input name="username" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                            <input name="password" type="text" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Jabatan</label>
                            <input name="jabatan" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="status" class="col-form-label">Status User</label>
                            <form>
                                <div class="row ">
                                    <div class="form-group">
                                        <select class="form-control" name="status">
                                            <option>~ Pilih Status User ~</option>
                                            <option>Active</option>
                                            <option>Half Active</option>
                                            <option>Not Active</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
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


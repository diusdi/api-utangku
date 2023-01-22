@extends('app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-action">
                                <button class="btn btn-primary">Tambah
                                    Teman</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="categoryTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- modal edit kategori --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formEditCategory">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="categoryEdit" id="categoryEdit">
                            <div class="invalid-feedback" for="categoryEdit"></div>
                            <input type="hidden" class="form-control" name="id" id="id">
                        </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal tambah kategori --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teman.store') }}" method="post" id="formTambahKategori">
                        @csrf
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="namaAdd" id="namaAdd">
                            <div class="invalid-feedback" for="namaAdd"></div>
                            
                            <input type="text" class="form-control" name="alamatAdd" id="alamatAdd">
                            <div class="invalid-feedback" for="alamatAdd"></div>
                            <input type="text" class="form-control" name="pekerjaanAdd" id="pekerjaanAdd">
                            <div class="invalid-feedback" for="pekerjaanAdd"></div>
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('ajax')
    <script type="text/javascript">
        $(document).ready(function() {
            // data tables category
            let table = $('#categoryTable').DataTable({
                responsive: true,
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
                ajax: '{{ route('teman.list') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'pekerjaan'
                    },
                    {
                        data: 'action'
                    },
                ]
            });

            // modal edit category
            $("#modalEdit").on("show.bs.modal", function(event) {
                const button = event.relatedTarget; // Button that triggered the modal
                var nama = button.getAttribute("data-category");
                var id = button.getAttribute("data-id");

                $("#categoryEdit").val(nama);
                $("#id").val(id);
            });

            $('#formEditCategory').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $('#formEditCategory').find('input, select').removeClass('is-invalid');
                $('input').parent().removeClass('is-invalid');
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: "JSON",
                    data: form.serialize(),
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        if (data.success) {
                            $('#modalEdit').modal('hide');
                            table.ajax.reload();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                showCloseButton: true,
                                timer: 5000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                        } else{
                            $.each(data.error, function(key, val) {
                                $('.invalid-feedback[for="' + key + '"]').html(val);
                                $('[name="' + key + '"]').parent().addClass('is-invalid');
                                $('[name="' + key + '"]').parent().addClass('has-validation');
                                $('[name="' + key + '"]').addClass('is-invalid');
                            });
                        }
                    }
                });
            });

            $('#formTambahKategori').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $('#formTambahKategori').find('input, select').removeClass('is-invalid');
                $('input').parent().removeClass('is-invalid');
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: "JSON",
                    data: form.serialize(),
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        if (data.success) {
                            $('#modalTambah').modal('hide');
                            table.ajax.reload();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                showCloseButton: true,
                                timer: 5000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                        } else { 
                            $.each(data.error, function(key, val) {
                                    $('.invalid-feedback[for="' + key + '"]').html(val);
                                    $('[name="' + key + '"]').parent().addClass('is-invalid');
                                    $('[name="' + key + '"]').parent().addClass('has-validation');
                                    $('[name="' + key + '"]').addClass('is-invalid');
                            })
                      }
                    }
                });
            });
        });
    </script>
@endpush

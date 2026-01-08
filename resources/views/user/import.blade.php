<form action="{{ url('/user/import_ajax') }}" method="POST" id="form-import" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label>
                    <a href="{{ asset('template_user.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download
                    </a>
                    <small id="error-template" class="error-text form-text text-muted">
                        Download template excel terlebih dahulu untuk mengisi data
                    </small>
                </div>
                <div class="form-group">
                    <label>Pilih File Excel</label>
                    <input type="file" name="file_user" id="file_user" class="form-control" accept=".xlsx, .xls" required>
                    <small id="error-file_user" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#form-import").validate({
            rules: {
                file_user: {
                    required: true,
                    extension: "xlsx|xls"
                }
            },
            messages: {
                file_user: {
                    required: "Silakan pilih file terlebih dahulu",
                    extension: "Harap upload file dengan format .xlsx atau .xls"
                }
            },
            submitHandler: function(form) {
                // Tampilkan loading (opsional, biar user tau sedang proses)
                var submitBtn = $(form).find('button[type="submit"]');
                submitBtn.prop('disabled', true).text('Mengupload...');

                var formData = new FormData(form);
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            // Pastikan variabel dataUser sesuai dengan yang di index.blade.php
                            if (typeof dataUser !== 'undefined') {
                                dataUser.ajax.reload();
                            } else {
                                // Fallback jika nama variabelnya bukan dataUser, reload halaman manual
                                window.location.reload();
                            }
                        } else {
                            // Reset pesan error
                            $('.error-text').text('');
                            // Tampilkan pesan error validasi field
                            if (response.msgField) {
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Server',
                            text: 'Gagal mengupload file. Silakan coba lagi.'
                        });
                    },
                    complete: function() {
                        // Kembalikan tombol submit seperti semula
                        submitBtn.prop('disabled', false).text('Upload');
                    }
                });
                return false;
            }
        });
    });
</script>
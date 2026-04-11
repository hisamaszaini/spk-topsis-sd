@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-graduate mr-1"></i> Data Siswa (Alternatif)</h1>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Alternatif</h6>
        <div class="d-flex">
            <button class="btn btn-sm btn-info shadow-sm mr-2" data-toggle="modal" data-target="#importModal">
                <i class="fas fa-file-excel fa-sm text-white-50"></i> Import Excel
            </button>
            <button class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th class="text-center">Nama Siswa</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alternatif)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $alternatif->nama_siswa }}</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-edit"
                                data-id="{{ $alternatif->id_alternatif }}"
                                data-nama="{{ $alternatif->nama_siswa }}"
                                data-toggle="modal" data-target="#editModal">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('alternatif.destroy', $alternatif->id_alternatif) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Siswa (Alternatif)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alternatif.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control" required placeholder="Nama Lengkap Siswa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Siswa (Alternatif)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" id="edit_nama_siswa" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Siswa & Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alternatif.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info py-2 mb-3">
                        <small>
                            <i class="fas fa-info-circle mr-1"></i> Format Excel: <b>No, Nama, C1, C2, C3, C4</b>
                        </small>
                    </div>

                    <div class="file-upload-wrapper">
                        <div class="file-upload-box text-center p-5 border-dashed rounded" id="drop-area">
                            <i class="fas fa-cloud-upload-alt fa-3x text-info mb-3"></i>
                            <h5 class="mb-1 font-weight-bold">Pilih file Excel atau Tarik kesini</h5>
                            <p class="text-muted small mb-3">Mendukung format .xlsx, .xls, atau .csv</p>
                            <button type="button" class="btn btn-outline-info btn-sm px-4" onclick="document.getElementById('file-input').click()">
                                Telusuri File
                            </button>
                            <input type="file" name="file" id="file-input" class="d-none" required accept=".xlsx,.xls,.csv">
                            <div id="file-name" class="mt-3 font-weight-bold text-success" style="display: none;">
                                <i class="fas fa-check-circle pulse mr-1"></i> <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Import Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .border-dashed {
        border: 2px dashed #d1d3e2;
        transition: all 0.3s ease;
        background: #f8f9fc;
        cursor: pointer;
    }

    .border-dashed:hover,
    .border-dashed.highlight {
        border-color: #36b9cc;
        background: #f0f8ff;
    }

    .file-upload-box i {
        transition: transform 0.3s ease;
    }

    .border-dashed:hover i {
        transform: translateY(-5px);
    }

    .pulse {
        animation: pulse-animation 2s infinite;
    }

    @keyframes pulse-animation {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        // Handle Edit Modal
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var url = "{{ url('alternatif') }}/" + id;

            $('#editForm').attr('action', url);
            $('#edit_nama_siswa').val(nama);
        });

        // Handle File Input Change
        $('#file-input').change(function() {
            var filename = $(this).val().split('\\').pop();
            if (filename) {
                $('#file-name span').text(filename);
                $('#file-name').fadeIn();
                $('.file-upload-box h5').text('File Terpilih');
                $('.file-upload-box p').text('Klik tombol import untuk melanjutkan');
            }
        });

        // Drag and Drop Handling
        let dropArea = document.getElementById('drop-area');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropArea.classList.add('highlight');
        }

        function unhighlight(e) {
            dropArea.classList.remove('highlight');
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
            document.getElementById('file-input').files = files;
            $('#file-input').change();
        }
    });
</script>
@endpush
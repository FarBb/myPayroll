@extends('layouts/master')
@section('title', 'Konfigrasi')
@section('judul-content')
<div class="section-header">
  <h1>Konfigurasi / Setup Aplikasi</h1> 
</div>
@endsection
@section('content')


@if (session('Success'))
  <script>
    swal('{{ session('Success') }}', {
      icon: 'success',
    });
  </script>
@endif

    <div class="section-body">
        <div class="card">
            <div class="card-body">
              <div class="card">
                <div class="card-header">
                  {{-- ini sudah nggak object 
                    @if (!$setup)            
                             --}}
                  @if (sizeof($setup) == 0)                    
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                  @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari Kerja</th>
                                        <th>Nama Aplikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($setup as $no => $a)
                                        <tr>
                                            <td>{{ $no+1 }}</td>
                                            <td>{{ $a->jumlah_hari_kerja }}</td>
                                            <td>{{ $a->nama_aplikasi }}</td>
                                            <td>
                                                {{-- <a href="{{ route('', $setup->id) }}"
                                                    class="badge badge-primary">Edit</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('setup.store')}}" method="POST">
              @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Aplikasi</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control phone-number" name="nama_aplikasi"
                                      value="{{ old('nama_aplikasi') }}">
                        </div>
                        <label @error('nama_aplikasi') class="text-danger" @enderror>@error('nama_aplikasi') {{ $message }}
                        @enderror
                        </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Jumlah Hari</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-tablet"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="jumlah_hari_kerja"
                                  value="{{ old('jumlah_hari_kerja') }}">
                          </div>
                          <label @error('jumlah_hari_kerja') class="text-danger" @enderror>@error('jumlah_hari_kerja') {{ $message }}
                          @enderror
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endsection

@endsection

@push('page-script')
    <script src="{{ asset('modules/sweetalert/dist/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
    <script>
        $(".tombol-hapus").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    {{-- title: 'Apakah Anda Yakin?' + id, --}}
                    title: 'Apakah Anda Yakin?',
                    {{-- text: 'Once deleted, you will not be able to recover this imaginary file!', --}}
                    icon: 'warning',
                    buttons: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        {{-- swal('Data Berhasil Dihapus!', {
                            icon: 'success',
                        }); --}}
                        $(`#delete${id}`).submit();
                    } else {
                        swal('Penghapusan Data Dibatalkan!');
                    }
                });
        });

    </script>
@endpush

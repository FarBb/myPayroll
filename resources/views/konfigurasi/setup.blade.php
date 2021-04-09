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
                                                <a href="#" data-id="{{ $a->id }}"
                                                    class="badge badge-primary btn-edit">Edit</a>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="" id="formEdit">
            @csrf
          <div class="modal-body" style="margin-bottom: -65px">
          </div>
          <div class="modal-footer" style="margin-left: -15px">
            <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-update">Update</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
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

        $(".btn-edit").on('click', function(){
          // console.log($(this).data('id'))
          let id = $(this).data('id')
          $.ajax({
            url:`/konfigurasi/setup/${id}/edit`,
            method:"GET",
            success: function(data) {
              // console.log(data)
              $('#modalEdit').find('.modal-body').html(data)
              $('#modalEdit').modal('show');
              
            },
            error:function(error){
              console.log(error)
            }
          })
        })


        @if($errors->any())
          $('#exampleModal').modal('show');
        @endif

        $(".btn-update").on('click', function(){
          let id = $('#formEdit').find('#id_data').val()
          let formData = $('#formEdit').serialize()
          console.log(id)
          console.log(formData)
          $.ajax({
            url:`/konfigurasi/setup/${id}`,
            method:"PUT",
            data:formData,
            success: function(data) {
              console.log(data)
              $('#modalEdit').modal('hide'),
              swal({
               icon: 'success',
               title: 'Data Berhasil Di Ubah'
              }).then(function(){
                window.location.assign('/konfigurasi/setup')
              })                  
            },
            
            error:function(err){
              console.log(err.responseJSON)
              let err_log = err.responseJSON.errors;
              if(err.status == 422)
              {
                // $('#modalEdit').find('[name="nama_aplikasi"]').prev().html('<span style="color:red">' +err_log.nama_aplikasi[0] +'</span>')
                if(typeof(err_log.nama_aplikasi) !== 'undefined'){
                $('#modalEdit').find('#labelErrorNama').html('<span style="color:red">' +err_log.nama_aplikasi[0] +'</span>')
                } else {
                  $('#modalEdit').find('#labelErrorNama').html('')
                }

                if(typeof(err_log.jumlah_hari_kerja) !== 'undefined'){
                  $('#modalEdit').find('#labelErrorHari').html('<span style="color:red">' +err_log.jumlah_hari_kerja[0] +'</span>')
                }
                else {
                  $('#modalEdit').find('#labelErrorHari').html('')
                }
              }
              if(err.status == 500){
                swal({
                  icon: 'failed',
                  title: 'Data Berhasil Gagal Ditambahkan'
                  }).then(function(){
                    window.location.assign('/konfigurasi/setup')
                }) 
              }
            }
          })
        })
    </script>
@endpush


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Aplikasi</label>
            <div class="input-group">
              <input type="hidden" class="form-control phone-number" id="id_data" name="id"
                          value="{{ $setup->id }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="text" class="form-control phone-number" name="nama_aplikasi"
                          value="{{ $setup->nama_aplikasi }}">
            </div>
            <label id="labelErrorNama"></label>
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
                      value="{{ $setup->jumlah_hari_kerja }}">
              </div>
              <label id="labelErrorHari"></label>
            </div>
          </div>
      </div>
    </div>

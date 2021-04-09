    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Divisi</label>
            <div class="input-group">
              <input type="hidden" class="form-control phone-number" id="id_data" name="id"
                          value="{{ $divisi->id }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="text" class="form-control phone-number" name="nama"
                          value="{{ $divisi->nama }}">
            </div>
            <label id="labelErrorNama"></label>
        </div>
      </div>
    </div>
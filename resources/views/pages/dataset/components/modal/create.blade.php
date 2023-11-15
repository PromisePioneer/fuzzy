<div class="modal fade" tabindex="-1" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Dataset</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <form id="form-create" @submit.prevent="save()">
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Nama</label>
                            <select class="form-select form-select-white" name="user_id" data-control="select2" data-placeholder="Pilih User">
                                <option></option>
                                <template x-for="row in user" :key="row.id">
                                <option :value="row.id" x-text="row.name"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Pendapatan Orangtua</label>
                            <input type="number" class="form-control" name="pendapatan_ortu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Tanggungan Orangtua</label>
                            <input type="number" class="form-control" name="tanggungan_ortu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Jumlah Prestasi</label>
                            <input type="number" class="form-control" name="jumlah_prestasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Nilai Raport</label>
                            <input type="number" class="form-control" name="nilai_raport">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Nilai Essay</label>
                            <input type="number" class="form-control" name="nilai_essay">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


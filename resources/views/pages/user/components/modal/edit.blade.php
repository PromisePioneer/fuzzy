<div class="modal fade" tabindex="-1" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form User</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
            </div>
            <div class="modal-body">
                <form id="form-edit" @submit.prevent="update(userId)">
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Nama</label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Nama" :value="editValue.name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-10">
                            <label class="required form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-solid" placeholder="Email" :value="editValue.email"/>
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


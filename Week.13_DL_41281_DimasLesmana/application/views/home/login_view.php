<div class="container">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body">
                <?= form_open('Home/login') ?>
                <div class="form-group<?= (form_error('email')) ? ' has-error' : ''; ?>">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email" autofocus>
                    <div class="text-danger">
                        <?= form_error('email'); ?>
                    </div>
                </div>
                <div class="form-group<?= (form_error('password')) ? ' has-error' : ''; ?>">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                    <div class="text-danger">
                        <?= form_error('password'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
                <?= form_close(); ?>
                <?= $this->session->flashdata('error_message'); ?>
            </div>
        </div>
    </div>
</div>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url(); ?>Login/images/LOGO_KOTA_METRO.png" alt="IMG">
                </div>

                <form class="user" method="post" action="<?= base_url('auth/'); ?>" Method="Post">
                    <span class="login100-form-title">
                        Halaman Login Kecamatan<br>
                        Metro Pusat
                    </span>

                    <?= $this->session->flashdata('message'); ?>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input type="text" class="input100" name="email" placeholder="Masukan Email"
                            value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input type="password" class="input100" name="password" placeholder="Masukan Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</body>
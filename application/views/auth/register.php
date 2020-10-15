<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="col-sm-12 text-center mb-3">
                <a href="<?=site_url()?>">
                    <img src="<?=base_url().'assets/image/logo.png'?>" alt="logo" style="width:250px">
                </a>
            </div>
            <p class="login-box-msg">Sign Up untuk daftarkan akun kamu...</p>
            <span><?=$this->session->flashdata('confirm')?></span>

            <form action="<?=site_url('auth/register')?>" method="post">
                <input type="hidden" name="tk" value="<?=@$_GET['tk']?>">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$this->session->flashdata('mail')?>" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="id" class="form-control" placeholder="NIK" value="<?=$this->session->flashdata('ids')?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Name" value="<?=$this->session->flashdata('name')?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-users"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?=$this->session->flashdata('pass')?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <button type="submit" name="register" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                </div>
            </form>

            <p class="mt-2">
                <a href="<?=site_url('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login')?>" class="text-center">Already a membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

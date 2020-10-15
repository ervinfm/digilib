<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="col-sm-12 text-center mb-3">
                <a href="<?=site_url()?>">
                    <img src="<?=base_url().'assets/image/logo.png'?>" alt="logo" style="width:250px">
                </a>
            </div>
            <p class="login-box-msg">Sign untuk memulai sesi kamu...</p>
            <span><?=$this->session->flashdata('confirm')?></span>

            <form action="<?=site_url('auth/login')?>" method="post">
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
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?=$this->session->flashdata('pass')?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="<?=site_url('forgot'.'?tk='.random_string('alnum', 50)).'&t='.date('Ymd').'&cat=forgot'?>">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="<?=site_url('register'.'?tk='.random_string('alnum', 50)).'&t='.date('Ymd').'&cat=register'?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

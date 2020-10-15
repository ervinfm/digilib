<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="col-sm-12 text-center mb-3">
                <a href="<?=site_url()?>">
                    <img src="<?=base_url().'assets/image/logo.png'?>" alt="logo" style="width:250px">
                </a>
            </div>
            <p class="login-box-msg">Perbaharui data keamanan kamu...</p>
            <span><?=$this->session->flashdata('confirm')?></span>

            <form action="<?=site_url('auth/newer')?>" method="post">
            <input type="hidden" name="id" value="<?=$row->id_user?>">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$row->email_user?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" name="new" class="btn btn-primary btn-block">Update</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

           <p class="text-center">
                <a href="<?=site_url('login'.'?tk='.random_string('alnum', 50).'&t='.date('Ymd').'&cat=login')?>" class="text-center">Go to sign in</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<div class="col-sm-12">
    <div class="card card-outline card-success" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
        <div class="card-body">
            <div class="col-sm-12 text-center">
                <a href="<?=site_url()?>">
                    <img src="<?=base_url().'assets/image/logo.png'?>" alt="logo" style="width:300px">
                </a>
            </div>
           <div class="col-sm-8 offset-sm-2 mt-4">
                <form action="" method="get">
                    <input type="hidden" name="tk" value="<?=random_string('alnum',35)?>">
                    <div class="col-sm-12">
                        <input type="text" name="keyword"  class="form-control form-control-lg" placeholder="Telusuri judul buku atau pengarang favorit disini ... " style="border-radius:30px" autofocus>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <button type="submit" name="search" value="<?=random_string('alnum',50)?>" class="btn btn-default float-right" style="border:none">Library Search</button>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <a href="" class="btn btn-default" style="border:none">See All Of Them</a>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    </div>
</div>
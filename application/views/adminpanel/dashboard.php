<?php
$this->load->view('adminpanel/header');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="d-flex-columns justify-content-center text-center">
        <div class="alert alert-primary" role="alert">
            <a href="<?= base_url() . 'admin/blog' ?>">View Blogs</a>
        </div>
        <div class="col-md-3"></div>
        <div class="alert alert-secondary" role="alert">
            <a href="<?= base_url() . 'admin/blog/addblog' ?>">Add Blog</a>
        </div>
    </div>
</main>
</div>
</div>

<?php
$this->load->view('adminpanel/footer');
?>
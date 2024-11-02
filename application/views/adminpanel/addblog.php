<?php
$this->load->view('adminpanel/header');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2>Add Blog</h2>

    <form action="<?= base_url() . 'admin/blog/addblog_post' ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="blog_title" placeholder="Title" />
        </div>
        <div class="form-group">
            <textarea name="blog_desc" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="file" />
        </div>
        <button type="submit" class="btn btn-primary">Add Blog</button>

    </form>

</main>
</div>
</div>

<?php
$this->load->view('adminpanel/footer');
?>
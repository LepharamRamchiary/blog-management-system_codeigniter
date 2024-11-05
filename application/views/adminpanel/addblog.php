<?php
$this->load->view('adminpanel/header');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2>Add Blog</h2>

    <form enctype="multipart/form-data" action="<?= base_url() . 'admin/blog/addblog_post' ?>" method="post">
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

<script type="text/javascript">
    <?php
    if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted'] == 'yes') {
            echo "alert('Blog is created Sucessfully!')";
        } else {
            echo "alert('BLog is not created')";
        }
    }
    ?>
</script>

<!-- CKEDITOR -->
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('blog_desc');
</script>
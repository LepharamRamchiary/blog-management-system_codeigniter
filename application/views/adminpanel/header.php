<?php
    $currentPage = current_url(); 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMN5V2EF3w5wzXf5rF1ZOk7RPuUlY6zlWeN3CvZ" crossorigin="anonymous"> -->


    <title>Admin Panel</title>
</head>

<body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?= base_url() . 'admin/login/logout' ?>">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentPage == base_url() . 'admin/dashboard') ? 'active' : '' ?>" href="<?= base_url() . 'admin/dashboard' ?>">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentPage == base_url() . 'admin/blog/addblog') ? 'active' : '' ?>" href="<?= base_url() . 'admin/blog/addblog' ?>">
                                <span data-feather="file"></span>
                                Add blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($currentPage == base_url() . 'admin/blog') ? 'active' : '' ?>" href="<?= base_url() . 'admin/blog' ?>">
                                <span data-feather="shopping-cart"></span>
                                View Blogs
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        

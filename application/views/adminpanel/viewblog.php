<?php
$this->load->view('adminpanel/header');
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2>View Blogs</h2>

    <?php 
    // echo "<pre>";
    // print_r($result);
    // die();

    ?>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            if($result){

                $counter = 1;
                foreach($result as $key => $value){
                    echo " <tr>
                            <td>".$counter."</td>
                            <td>".$value['blog_title']."</td>
                            <td>".$value['blog_desc']."</td>
                            <td><img src='".base_url().$value['blog_img']."' class='img-fluid' width='100'></td>

                            <td><a class=\"btn btn-info\" href='".base_url().'admin/blog/editblog/1'."'>Edit</a></td>
                            
                            <td><a class=\"btn btn-danger delete\" href='#.' data-id='".$value['blogid']."'>Delete</a></td>

                        </tr>";

                $counter++;
                }
               

            }else{
                echo "<tr><td colspan='6'>No Data Found</td></tr>";
            }

            ?>
                
            </tbody>
        </table>
    </div>

</main>
</div>
</div>

<?php
$this->load->view('adminpanel/footer');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
    $(".delete").click(function(){
        let delete_id = $(this).attr('data-id');

        let bool = confirm('Are you sure?');
        console.log(bool);

        if(bool){
            $.ajax({
                url: '<?= base_url().'admin/blog/deleteblog/'?>',
                type: 'POST',
                data: {'delete_id': delete_id},
                success: function(res){
                    console.log(res);
                    if(res == 'Deleted'){
                        location.reload();
                    }else if(res == 'Not-Deleted'){
                        alert("Something went wrong");
                    }
                }
            })

        }else{
            alert("Your blog is safe");
        }
        

    })
</script>
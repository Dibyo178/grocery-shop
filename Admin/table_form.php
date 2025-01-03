
<?php

include_once 'connectdb.php';

session_start();

if ($_SESSION['username'] == "" or $_SESSION['role'] == "") {

    header("location:index.php");
}


if ($_SESSION['role'] == "Admin") {

    include_once 'header.php';
} else {

    include_once 'headeruser.php';
}

?>


<style>


    table.dataTable thead .sorting_asc:after {
        display: none;
    }

    table.dataTable thead .sorting:after {
        display: none;
    }

    table.dataTable thead .sorting_asc:after {

        display: none !important;
    }

    table.dataTable thead .sorting:after {

        display: none !important;

    }

</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Contact List
            <!--        <small>Optional description</small>-->
        </h1>
        <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->


        <div class="box box-danger">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <!-- <div class="form-group">
             <input type="text" id="myInput" style="width:200px;border:2px solid #009933;color:black;border-radius:30px" placeholder="Search MenuList item" class="form-control">
                </div> -->

                <div style="overflow-x:auto;">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            $index = 1; //default 1 count

                            $select = $pdo->prepare("select * from table_form order by id desc");

                            $select->execute();

                            while ($row = $select->fetch(PDO::FETCH_OBJ)) {

                                echo '
                                
                                  <tr>
                                <td>' . $index . '</td>

                               
                                <td>' . $row->name . '</td>

                                <td>' . $row->phone . '</td>

                               

                                <td>' . $row->description . '</td>

                                




    <td>
<button id=' . $row->id . ' class="btn btn-danger btndelete" role="button"><span class="glyphicon glyphicon-trash" style="color:#ffffff" data-toggle="tooltip"  title="Delete Product"></span></button>  
    
    
</td>
                                     
                                     
                                     </tr>
                                    
                                ';

                                $index++;
                            }



                            ?>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!--
<script>
    $(document).ready(function() {
        $('#producttable').DataTable(
                    {
                    
                    "order":[[0,"asc"]]
                }

        );
    });

</script>
-->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltrip"]').tooltrip();
    });
</script>

<script>
    $(document).ready(function() {
        $('.btndelete').click(function() {
            var tdh = $(this);
            var id = $(this).attr("id");
            swal({
                    title: "Do you want to delete list?",
                    text: "deleted, you can not recover it!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: 'tabledelete.php',
                            type: 'post',
                            data: {
                                pidd: id
                            },
                            success: function(data) {
                                tdh.parents('tr').hide();
                            }


                        });



                        swal("Your Product has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your Product is safe!");
                    }
                });



        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#myInput").on("keyup", function() {

            var value = $(this).val().toLowerCase();
            $("#producttable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });
    });
</script>

<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>


<!-- DataTables -->
<script src="./bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>





<!-- add footer-->


<?php

include_once 'footer.php';

?>
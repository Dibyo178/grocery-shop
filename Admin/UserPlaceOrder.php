<?php

include_once 'connectdb.php';
session_start();

if ($_SESSION['username'] == "" or $_SESSION['role'] == "") {
    header("location:index.php");
}

if ($_SESSION['role'] == "User") {
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

    .bg-red {
        background-color: red;
        color: white;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <h1>Place Order List</h1>
    </section>

    <section class="content container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border"></div>
            <div class="box-body">
                <div style="overflow-x:auto;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product(name, quantity, price)</th>
                                <th>Delivery Charge</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Delivery Area</th>
                                <th>Date</th>
                                <th>Print</th>
                                <th>Check</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            $select = $pdo->prepare("SELECT * FROM orders ORDER BY id DESC");
                            $select->execute();

                            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                                $rowClass = $row->status == 1 ? '' : 'bg-red';
                                $checkIcon = $row->status == 1 ? '<i class="fa-solid fa-check"></i>' : '<i class="fa-solid fa-circle"></i>';
                                echo '
                                    <tr class="' . $rowClass . '">
                                        <td>' . $index . '</td>
                                        <td>' . $row->name . '</td>
                                        <td>' . $row->phone . '</td>
                                        <td>' . $row->address . '</td>
                                        <td>' . $row->products . '</td>
                                        <td><i class="fa-solid fa-bangladeshi-taka-sign"></i> ' . $row->delivery . '</td>
                                        <td><i class="fa-solid fa-bangladeshi-taka-sign"></i> ' . $row->amount_paid . '</td>
                                        <td>' . $row->pmode . '</td>
                                        <td>' . $row->to_id . '</td>
                                        <td>' . $row->date . '</td>
                                        <td>
                                            <a href="invoice_80mm.php?id=' . $row->id . '" class="btn btn-warning" role="button" target="_blank">
                                                <span class="glyphicon glyphicon-print" style="color:#ffffff" data-toggle="tooltip" title="Print Invoice"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-check" data-id="' . $row->id . '">
                                                ' . $checkIcon . ' Mark as Checked
                                            </button>
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
</div>

<script src="./bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable();

        $('.btndelete').click(function() {
            var tdh = $(this);
            var id = $(this).attr("id");
            swal({
                title: "Do you want to delete the order?",
                text: "Deleted, you cannot recover it!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'placing_order_delete.php',
                        type: 'post',
                        data: { pidd: id },
                        success: function(data) {
                            tdh.parents('tr').hide();
                        }
                    });
                    swal("Your Order has been deleted!", { icon: "success" });
                } else {
                    swal("Your Order is safe!");
                }
            });
        });

        $('.btn-check').click(function() {
    var button = $(this);
    var id = button.data('id');

    swal({
        title: "Do you want to mark this order as checked?",
        text: "This action cannot be undone.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willUpdate) => {
        if (willUpdate) {
            $.ajax({
                url: 'update_order_status.php',
                type: 'post',
                data: { id: id },
                success: function(response) {
                    if (response == 'success') {
                        var row = button.closest('tr');
                        row.removeClass('bg-red');
                        button.html('<i class="fa-solid fa-check"></i> Checked');
                        button.prop('disabled', true); // Disable the button after clicking
                    } else {
                        swal("Error updating status!", { icon: "error" });
                    }
                }
            });
        } else {
            swal("Status update cancelled!");
        }
    });
});

    });
</script>

<?php
include_once 'footer.php';
?>

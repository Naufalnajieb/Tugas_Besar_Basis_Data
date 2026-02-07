<?php
    include('function.php');


    $id = $_GET['id'];
    if ($id > 0) {
        $isDeleteSucceed = deleteEkstra($id);


        if ($isDeleteSucceed > 0) {
            echo "
            <script>
                alert('Delete Success !');
                document.location.href = 'admin.php';
            </script>
            ";
            } else {
            echo "
            <script>
                alert('Delete Failed !');
                document.location.href = 'admin.php';
            </script>
            ";
        }
    }
?>

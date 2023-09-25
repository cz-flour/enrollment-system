<!DOCTYPE html lang=en>
<html>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css"> 
    <title>Admin</title>
    <link rel="icon" href="logo.png">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <script src="../plugins/popper.min.js"></script>
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/styles.css">
    


<head>
<?php
    session_start();
    include_once "connection.php";
    
    
?> 
</head>

<body>
    
      <?php include "./sidebar.php";  ?>
    <div id="content"  class="container-fluid py-4 main-container">
        <div class="row mb-3 ">
            <div class="col-md-12">
                <h3 class="text-center">USERS</h3>
            </div>
        </div>
        <div class="row w-50 mx-auto border-bottom bg-dark-subtle p-2 mb-2">
            <div class="col-md-1 p-0"><p class="m-0 total"></p></div>
            <div class="col-md-5 p-0"><p class="m-0">Email</p></div>
            <div class="col-md-5 p-0"><p class="m-0">Name</p></div>
            <div class="col-md-1 p-0"><p class="m-0">Action</p></div>
        </div>

        <!-- INDIVIDUAL INFO -->
        <div id="individual-info-container">
            
        </div>
    </div>


 

<!-- Modal for displaying student details -->
<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered d-flex justify-content-center" role="document">
    <div class="modal-content w-50">
      <div class="modal-header d-flex justify-content-center ">
        <h5 class="modal-title fs-3 text-dark" id="deleteModalLabel"></h5>
        
      </div>
      <div class="modal-body d-flex justify-content-center">
        <p>Are you sure you want to delete this user?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <!-- <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-secondary close-btn me-3" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline-danger" id="modalConfirm">Confirm</button>
      </div>
    </div>
  </div>
</div>


<script src="./index.js"></script>
<script src="./manage_acc.js"></script>
</body>
</html>
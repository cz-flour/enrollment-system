<!-- Sidebar -->

<head>    
    <link rel="stylesheet" type="text/css" href="./sidebar.css"> 
</head>

<style>
    h5{
        color:antiquewhite;
        font-size: larger;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>


<div class="sidebar" id="mySidebar">

    <div class="toggle__container"  >
        <button id="burger" class="toggle__btn" onclick="toggleSidebar()"> 
            <svg xmlns="http://www.w3.org/2000/svg"  fill="none" height="30px" width="30px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF" class="chevron">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>  
        </button>
    </div>

    <div class="side-header">
        <h5 style="margin: 10px 15px;" id="title">Hello, Admin</h5>
    </div>

    <hr style="border:1px solid; background-color:#2c2b2b; border-color:#3B3131;">


    <!-- <a href="index.php" class="links">
        <i class="fa fa-home icons"></i>
        <span class="link__name">Home</span>
    </a> -->
    <a href="allstudents.php" class="links">
        <i class="fa fa-users icons"></i>
        <span class="link__name">All Students</span>
    </a>
    <a href="manage_acc.php" class="links">
        <i class="fa fa-pencil-square-o"></i>
        <span class="link__name">Manage Accounts</span>
    </a>
        

  <a href="../logout.php" class="links">
    <i class="fa fa-sign-out icons"></i>
    <span class="link__name">Logout</span>
</a>
</div>
 
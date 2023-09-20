<!DOCTYPE html lang=en>
<html>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css"> 
    <title>Admin</title>
    <link rel="icon" href="logo.png">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<head>
<?php
    // session_start();/* 
    // include_once "connection.php";
    
    
    //include_once "./config/dbconnect.php";
?> 
</head>
<style>
            .container{
                background-color: white;
                border-radius: 9px;
                display: flex;
            }
            .content{
                width: 100%;
            }
            .column{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            h3{
                padding-left: 8px;
            }
        
        .form-control[type="number"]::-webkit-inner-spin-button,
        .form-control[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }
        #next{
            border-radius: 1px;
            font-size: 15px;
        }
        #collapseContent {
            display: none;
            }
            
          </style>
<body>
    <div   class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">

                <!-- SIDEBAR -->
                <?php include "./sidebar.php";  ?>
                
            </div>
                <!-- MAIN CONTENT -->
                <div id="content" class="container-fluid col-12">
                    <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Add Student</h3>
        <form method="POST" action="" >
                <div class="row my-3">
                    <div class="col-lg-12"> 
                        <label for="formControlInput" class="form-label">Learner Reference Number</label>
                        <input type="number" class="form-control" name="lrn" id="lrn" placeholder="Enter LRN" style="max-width: 500px;">
                    </div>
                </div>
                <hr>
                <h5 style="color:black;">Personal Information</h5>
                <div class="row my-3">
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="mname" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="exename" class="form-label">Extension Name</label>
                        <input type="text" class="form-control" id="extension" name="extension" placeholder="eg. Jr. Sr.">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="formControlInput" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="formControlInput" name="birthdate">
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="height" class="form-label">Height</label>
                        <input type="number" class="form-control" id="height" name="height" placeholder="Enter height (in)">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter weight (kg)">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="status" class="form-label">Civil Status</label>
                        <select class="form-select form-control " aria-label="Large select" name="cstatus" id="cstatus">
                            <option selected="" disabled>Select status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option> 
                            <option value="Seperated">Seperated</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="placeofbirth" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control " id="place_birth" name="place_of_birth" placeholder="Enter place of birth">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select form-control " aria-label="Large select" name="sex" id="sex" > 
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>  
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-6 my-2"> 
                        <label for="religion" class="form-label">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter Religion       ">
                    </div>
                    <div class="col-sm-12 col-lg-6 my-2">
                        <label for="cnumber" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number">
                    </div>  
                </div>
                <div class="row">
                <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="province" class="form-label">Province</label>
                        <select class="form-select form-control " aria-label="Large select" name="province" id="province" onchange="handleProvinceChange(event)">
                            <option disabled  selected>Select</option>  
                            <option value="Albay" >Albay</option> 
                            <option value="Camarines Sur" >Camarines Sur</option> 
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="municipality" class="form-label">Municipality</label>
                        <select class="form-select form-control " aria-label="Large select" name="municipality" id="municipality" onchange="handleMunicipalityChange(event)">
                            <option disabled value="" selected>Select Municipality</option>  
                            <option value="Oas" class="albay d-none">Oas</option> 
                            <option value="Ligao" class="albay d-none">Ligao</option> 
                            <option value="Polangui" class="albay d-none">Polangui</option>
                            <option value="Baao" class="camsur d-none">Baao</option>
                            <option value="Bato" class="camsur d-none">Bato</option>
                            <option value="Iriga" class="camsur d-none">Iriga</option>
                            <option value="Pili" class="camsur d-none">Pili</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="brgy" class="form-label">Barangay</label>
                        <select class="form-select form-control " aria-label="Large select" name="brgy" id="brgy">
                            <option disabled value="" selected>Select</option>  
                            <option value="Bagumbayan" class="oas d-none">Bagumbayan</option> 
                            <option value="Bongoran" class="oas d-none">Bongoran</option> 
                            <option value="Calzada" class="oas d-none">Calzada</option> 
                            <option value="Centro Poblacion" class="oas d-none">Centro Poblacion</option> 
                            <option value="Ilaor Norte" class="oas d-none">Ilaor Norte</option>
                            <option value="Ilaor Sur" class="oas d-none">Ilaor Sur</option>
                            <option value="Iraya Norte" class="oas d-none">Iraya Norte</option>
                            <option value="Iraya Sur" class="oas d-none">Iraya Sur</option>
                            <option value="Maporong" class="oas d-none">Maporong</option>
                            <option value="Obaliw" class="oas d-none">Obaliw</option>
                            <option value="Rizal" class="oas d-none">Rizal</option> 
                            <option value="San Juan" class="oas d-none">San Juan</option>
                            <option value="Talongog" class="oas d-none">Talongog</option>
                            <option value="Bagumbayan" class="ligao d-none">Bagumbayan</option>
                            <option value="Binatagan" class="ligao d-none">Binatagan</option>
                            <option value="Guilid" class="ligao d-none">Guilid</option>
                            <option value="Tinago" class="ligao d-none">Tinago</option>
                            <option value="Tomolin" class="ligao d-none">Tomolin</option>
                            <option value="Sta. Cruz" class="ligao d-none">Sta. Cruz</option>
                            <option value="Basud" class="polangui d-none">Basud</option>
                        </select>
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="purok" class="form-label">Street/Purok</label>
                        <input type="varchar" class="form-control " id="purok" name="purok" placeholder="Enter Street/Purok">
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-lg-4 my-2"> 
                        <label for="glevel" class="form-label">Grade Level</label>
                        <select class="form-select form-control " aria-label="Large select" name="grlevel" id="grlevel">
                            <option disabled selected >Select</option>  
                            <option value="Grade 11" >Grade 11</option> 
                            <option value="Grade 12" >Grade 12</option> 
                        </select>
                    </div>
                    <div class="col-sm-12 col-lg-4 my-2">
                        <label for="track" class="form-label">Track</label>
                        <select class="form-select form-control " aria-label="Large select" name="track" id="track" onchange="handleTrackChange(event)" > 
                            <!-- <option  disabled>Select Track</option>  -->
                            <option disabled selected>Select</option> 
                            <option value="Academic Track">Academic Track</option>  
                            <option value="Tech-Voc Track">Tech-Voc Track</option> 
                        </select>
                    </div>  
                    <div class="col-sm-12 col-lg-4 my-2">
                        <label for="strand" class="form-label">Strand</label>
                        <select class="form-select form-control " aria-label="Large select" name="strand" id="strand" > 
                            <option disabled selected value="">Select</option> 
                            <option class="strand" value="General Academic Strand (GAS)" >General Academic Strand (GAS)</option> 
                            <option class="strand" value="Humanities and Social Sciences (HUMMS)">Humanities and Social Sciences (HUMMS)</option>  
                            <option class="track d-none" value="Automotive Servicing" >Automotive Servicing</option> 
                            <option class="track d-none" value="Electrical Installation and Maintenance">Electrical Installation and Maintenance</option> 
                            <option class="track d-none" value="Computer System Servicing">Computer System Servicing</option> 
                        </select>
                    </div>  
                </div>
                <div class="colapse" id="collapseContent">
                <div class="card card-body">
                <p>Since you are an incoming Grade 11 student, there are important documents needed.<br>Please upload the following documents in pdf form.</p>
                <div class="row">
                    <div class="col-3 my-2 ">
                <label for="psa" class="form-label">PSA/NSO Birth Certificate</label>
                    </div>
                    <div class="col">
                            <input type="file" name="psa" id="psa" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-2 ">
                <label for="formcard" class="form-label">Form 138</label>
                    </div>
                    <div class="col">
                            <input type="file" name="formcard" id="formcard" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-2 ">
                <label for="complform" class="form-label">Completion Form / Certificate JHS</label>
                    </div>
                    <div class="col">
                            <input type="file" name="complform" id="complform" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-2 ">
                <label for="pics" class="form-label">1x1 picture</label>
                    </div>
                    <div class="col">
                            <input type="file" name="pics" id="pics" required>
                    </div>
                </div>

        </div>
                </div>
                <br>
                <hr>
                <br>
                <h5 style="color: black;">Name and Address of Person to be contacted in case of Emergency</h5>
                <div class="row my-3">
                    <div class="col-sm-12 col-lg-3 my-2"> 
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
                    </div>
                    <div class="col-sm-12 col-lg-3 my-2">
                        <label for="caddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="caddress" name="caddress" placeholder="Enter Address">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="rel" class="form-label">Relation</label>
                        <input type="text" class="form-control" id="rel" name="rel" placeholder="Enter Relation">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="cpnum" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="cpnum" name="cpnum" placeholder="Enter contact number">
                    </div>
                </div>
                <hr>
                <br>
                <h5 style="color: black;">Learners Educational Background </h5>
                <br>
                <div class="row my-3">
                    <center><h6 style="color: black;">Elementary School (where you completed Elementary Level Education)</h6></center>
                    <div class="col-sm-12 col-lg-4 my-2"> 
                        <label for="schname" class="form-label">School Name</label>
                        <input type="text" class="form-control" id="schname" name="schname" placeholder="Enter School Name">
                    </div>
                    <div class="col-sm-12 col-lg-4 my-2">
                        <label for="schaddress" class="form-label">School Address</label>
                        <input type="text" class="form-control" id="schaddress" name="schaddress" placeholder="Enter School Address">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="yrcomp" class="form-label">Year of Completion</label>
                        <input type="number" class="form-control" id="yrcomp" name="yrcomp" placeholder="Enter Year of Completion">
                    </div>
                </div>
                <br>
                <div class="row my-3">
                    <center><h6 style="color: black;">Junior High School (where you completed JHS / Grade 10)</h6></center>
                    <div class="col-sm-12 col-lg-4 my-2"> 
                        <label for="schnamej" class="form-label">School Name</label>
                        <input type="text" class="form-control" id="schnamej" name="schnamej" placeholder="Enter School Name">
                    </div>
                    <div class="col-sm-12 col-lg-4 my-2">
                        <label for="schaddressj" class="form-label">School Address</label>
                        <input type="text" class="form-control" id="schaddressj" name="schaddressj" placeholder="Enter School Address">
                    </div>
                    <div class="col-sm-12  col-lg-3 my-2">
                        <label for="yrcompj" class="form-label">Year of Completion</label>
                        <input type="number" class="form-control" id="yrcompj" name="yrcompj" placeholder="Enter Year of Completion">
                    </div>
                </div>

                <button type="submit "class="btn btn-success" id="next"> Submit </button>
            </div>
        </form>
    </div>
    
   
    <script> 
        /* GET ALL HTML NODES THAT HAS A .CLASSNAME */
        /* asssigned to variable that will holde the nodelist/array of nodes */
        const track = document.querySelectorAll('.track');
        const strand = document.querySelectorAll('.strand');
        const oas = document.querySelectorAll('.oas');
        const ligao = document.querySelectorAll('.ligao');
        const polangui= document.querySelectorAll('.polangui');
        const albay = document.querySelectorAll('.albay');
        const camsur = document.querySelectorAll('.camsur');
        
        /* GET HTML NODE USING ID */
        const municipalityValue = document.getElementById('municipality');
        const strandNode = document.getElementById('strand');
        const brgy = document.getElementById('brgy'); 
 
        function handleTrackChange(event) { 
            strandNode.value = ""
            if(event.target.value == "Academic Track"){
                for(let i = 0; i < strand.length ; i++) {
                    strand[i].classList.remove("d-none");
                    strand[i].classList.add("d-block");
                    track[i].classList.remove("d-block");
                    track[i].classList.add("d-none");
                }
            }else{
                for(let i = 0; i < track.length ; i++) {
                    track[i].classList.remove("d-none");
                    track[i].classList.add("d-block");
                    strand[i].classList.remove("d-block");
                    strand[i].classList.add("d-none");
                }
            }
        }
 

        function handleProvinceChange(event) { 
            municipalityValue.value = ""
            brgy.value = "" 
            if(event.target.value == "Albay"){
                for(let i = 0; i<albay?.length ; i++){
                    albay[i].classList.remove("d-none");
                    albay[i].classList.add("d-block");
                    camsur[i].classList.remove("d-block");
                    camsur[i].classList.add("d-none");
                }
            } else if(event.target.value == "Camarines Sur"){
                for(let i=0; i<camsur?.length; i++){
                    albay[i].classList.add("d-none");
                    albay[i].classList.remove("d-block");
                    camsur[i].classList.add("d-block");
                    camsur[i].classList.remove("d-none");
                }
            }else{
                
                /*  */
                for(let i=0; i < 15; i++){
                    albay[i].classList.add("d-none");
                    albay[i].classList.remove("d-block");
                    camsur[i].classList.add("d-none");
                    camsur[i].classList.remove("d-block");
                }
            }
            
        }

        function handleMunicipalityChange(event) { 

            /* set the value to "" of brgy node */
            brgy.value = ""

            /* event.target.value */
            /* value of node, where the function is called or triggered */
            /*  */

            if (event.target.value === "Oas") {
                for (let i = 0; i < oas.length; i++) {
                    oas[i].classList.remove("d-none");
                    oas[i].classList.add("d-block");
                    ligao[i].classList.remove("d-block");
                    ligao[i].classList.add("d-none");
                }
            } else if (event.target.value === "Ligao") {
                for (let i = 0; i < ligao.length; i++) {
                    ligao[i].classList.remove("d-none");
                    ligao[i].classList.add("d-block");
                    oas[i].classList.remove("d-block");
                    oas[i].classList.add("d-none");
                    
                }
            }
            else if (event.target.value === "Polangui") {
                for (let i = 0; i < polangui.length; i++) {
                    polangui[i].classList.remove("d-none");
                    polangui[i].classList.add("d-block");
                    oas[i].classList.remove("d-block");
                    oas[i].classList.add("d-none");
                    ligao[i].classList.remove("d-block");
                    ligao[i].classList.add("d-none");
    }
}
        } 

        const grlevel = document.getElementById('grlevel');
        const collapseContent = document.getElementById('collapseContent');

        grlevel.addEventListener('change', function () {
        if (grlevel.value === 'Grade 11') {
            collapseContent.style.display = 'block'; // Show collapse
        } else {
            collapseContent.style.display = 'none'; // Hide collapse
        }
        });

        // Hide collapse content initially
        collapseContent.style.display = 'none';

    
    </script>
   <script>
        function validateForm() {
            const fileInput = document.getElementById('fileToUpload');
            const allowedExtensions = ["pdf", "doc", "docx"];
            const maxFileSize = 500000; // in bytes

            if (fileInput.files.length === 0) {
                alert("Please select a file.");
                return false;
            }

            const file = fileInput.files[0];
            const fileSize = file.size;
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                alert("Sorry, only PDF, DOC, and DOCX files are allowed.");
                return false;
            }

            if (fileSize > maxFileSize) {
                alert("Sorry, the file is too large.");
                return false;
            }

            return true; // Allow form submission if all checks pass
        }
    </script>


    
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

                    
                </div>
            </div>
        </div>
    </div>
</div>


<script src="./index.js"></script>
</body>
</html>
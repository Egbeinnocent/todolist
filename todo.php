<?php
include'functions.php';
include 'include/header.php';
require 'conn.php';
// session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}else{
    $username = $_SESSION['username'];
    $user_id = $_SESSION['id'] ;
    
}

if(isset($_GET['deleted'])){
    ?>
    <script type="text/javascript">
        alert('Task deleted successfully!')
    </script>

    <?php
}



?>

    <style>
        .addbtn{
            bottom: 4rem;
            font-size: 3rem;
            color:blue;
            
        }
        .days{
            color:black;
            font-weight: 700;
            text-transform: uppercase;
        }

        .downnav{
            height: 0;
            width: 100%;
            position: fixed;
            z-index: 1;
            bottom:0;
            left: 0;
            overflow-x: hidden;
            transition: 0.6s;
            overflow: hidden;
            
            
        }
        .formbody{
            margin-left: 10%;
        }
        .sendbtn{
            margin-right: 15%;
            margin-top: -2rem;
            border:0;
            font-size: 35px;
            color: grey;
        }
        textarea {
            height: 50px;
            width: 75%;
        }

        @media (max-width: 768px) {
  .container {
    padding: 1rem;
  }
  /* Other styles for small screens */
}
        

    </style>


    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">


            <!-- body content of the page -->
             <!--  -->

                <!-- for the second table header -->
                <div class="header w-100 text-light bg-secondary p-3 m-3 text-white">
                    <?php
                        echo '<div class="fw-bold fs-4 text-capitalize">Hello, ' .  $username . '</div>';
                    ?>

                    <a href="logout.php">logout</a>
                </div>

                <!-- task table -->
                
                
                <table class='table w-100 m-3 table-responsive table-hover'>
                    
                    
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>content</th>
                        <th>date for activity</th>
                        <th>status</th>
                        <th>edit</th>
                    </tr>
                    </thead>
                <tbody>
                
                <?php
                $sql = "SELECT id, title, content, deadline, status FROM todolist.task WHERE unique_id = '$user_id' ";
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $count = 0;
                 while($row = $result->fetch_assoc()){
                    $count = $count + 1;

                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['deadline'];
                    $status = $row['status'];
                 ?>
                    <tr>
                    <td> <?php echo $count ?> </td>
                    <td>
                        <?php echo $title ?>
                    </td>
                    <td><p><?php echo $content?></p></td>
                    <td><?php echo $date?></td>
                    <td><?php echo $status?></td>
                    <td> 
                        <a href='delete.php?delid=<?php echo $row['id']?>' class=' bi bi-trash text-danger fs-4 fw-bolder m-1'></a>
                        <a href="update.php?update=<?php echo $row['id'];?>" class=' bi bi-pen text-dark fs-4 fw-bolder m-1' ></a>
                    </td>
                    </tr>
                
               </tbody>
               <?php
                 }
                }else{
                echo"<div class='fw-bolder text-capitalize text-dark offset-5'>no task yet</div>";
                }
                ?>
                </table>

                 <!-- end task table -->
                <div class="accordion m-3 w-100 " id="accordionExample">

                <!-- completed task space -->
                <div class="accordion-item mt-3 accordion-collapse">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        completed task
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                    <table class='table w-100 m-3 table-responsive table-hover'>
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>content</th>
                        <th>date for activity</th>
                        <th>status</th>
                        </tr>
                        
                    </thead>
                <tbody>
                
                <?php
                $sql = "SELECT title, content, deadline, status FROM todolist.task WHERE unique_id = $user_id AND `status` = 'completed' ";
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $count = 0;
                 while($row = $result->fetch_assoc()){
                    $count = $count + 1;
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['deadline'];
                    $status = $row['status'];
                 ?>
                    <tr>
                    <td> <?php echo $count ?> </td>
                    <td>
                        <?php echo $title ?>
                    </td>
                    <td><p><?php echo $content?></p></td>
                    <td><?php echo $date?></td>
                    <td><?php echo $status?></td>
                    </tr>
               </tbody>
               <?php
                 }
                }else{
                    echo"<div class='fw-bolder text-capitalize text-dark offset-4'>no completed task yet</div>";
                }
                ?>
                </table>
                    </div>
                </div>
                

                </div>

                <!-- pending task space -->
                <div class="accordion-item mt-3">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        pedding task
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <table class='table w-100 m-3 table-responsive table-hover'>
                    
                    
                    <thead>
                        
                        <th>No</th>
                        <th>title</th>
                        <th>content</th>
                        <th>date for activity</th>
                        <th>status</th>
                        <th>edit</th>
                        
                        
                    </thead>
                <tbody>
                
                <?php
                $sql = "SELECT id,title, content, deadline, status FROM todolist.task WHERE status = 'pending' AND unique_id ='$user_id'";
                 $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $count = 0;
                 while($row = $result->fetch_assoc()){
                    $count = $count + 1;
                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['deadline'];
                    $status = $row['status'];
                 ?>
                 <tr>
                    <td> <?php echo $count ?> </td>
                    <td>
                        <?php echo $title ?>
                    </td>
                    <td><p><?php echo $content?></p></td>
                    <td><?php echo $date?></td>
                    <td><?php echo $status?></td>
                    <td> 
                        <a href='' class=' bi bi-trash text-danger fs-4 fw-bolder m-1'></a>
                        <a href="update.php?update=<?php echo $row['id'];?>" class=' bi bi-pen text-dark fs-4 fw-bolder m-1' ></a>
                    </td>
                </tr>
               </tbody>
               </table>
               
               <?php
                }
            }else{
                echo"<div class='fw-bolder text-capitalize text-dark offset-4'>no pending task yet</div>";
            }
            ?>
                
                
            </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>





        <!-- hidden downnav starts -->
<a onclick="openNav()"class="addbtn bi-bell-fill position-fixed offset-0"></a>
    <div id="nav" class="downnav bg-light">
        <div class="w-100 bg-secondary shadow-lg" height="45px">innocent</div>
            <!-- button for closing  -->
            <button class=" btn-close float-end fs-4"aria-label="Close" onclick="closeNav()"></button>
            <!-- taskform -->
            <form method="post" action="todo.php">
                <?php
                $fone =taskform($conn);
                
                ?>
            <div class="formbody">
                <div class="row">
                    <div class="col m-2">
                    <input type="text" class="form-control " placeholder="Title" name="title">
                    </div>

                    <div class="col m-2">
                        <input type="date" class="form-control" name="date">
                        <label class=" text-danger offset-3" for="date">day to complete</label>
                    </div>

                    <div class="col m-2">
                    <input hidden type="text" class="form-control " value="<?php echo $user_id ?>" name="userid">
                    </div>

                </div>

                <textarea class="" name="content" id=""placeholder="Enter Task"></textarea>
                
                <!-- <input class=" form form-control  w-75" type="text" placeholder="Add To ToDOList" name="content"> -->

                <input hidden class=" form form-control  w-75" type="text" value="pending" name="status">

                <button name="submit" class="sendbtn float-end bi bi-send-fill"></button>
            </div>
            </form>
     </div>
    

    <script>
        function openNav(){
        document.getElementById("nav").style.height ="180px";
        }
        function closeNav(){
        document.getElementById("nav").style.height ="25px";
        }
    </script>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
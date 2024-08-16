<?php
session_start();
include'include/header.php';
require 'conn.php';

if (isset($_GET['update'])){
    $id = $_GET['update'];

    $sql ="SELECT * FROM `task` WHERE `id`='$id'";

    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $deadline = $row['deadline'];
        $content = $row['content'];
        $status = $row['status'];

        

    }


}
?>
        <?php
        if(isset($_POST['update'])){
            if(isset($_GET['new_id'])){
                $newid =$_GET['new_id'];
            }
        $title = $_POST['title'];
        $content = $_POST['content'];
        $time = $_POST['time'];
        $status = $_POST['status'];

        $sql= "UPDATE task SET title ='$title', content='$content', deadline='$time', status='$status'WHERE `id`='$newid'" ;

        $result =mysqli_query($conn, $sql);

        if($result){
            echo"<div class='alert alert-success'>Task Updated Successfully</div>";
            header("Location: todo.php");
        }else{
            echo"<div class='alert alert-danger'>Task Updating fails</div>";
        }
        }
        ?>


<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-8 ">

            <form  action="update.php?new_id=<?php echo $id?>" method="post" class="shadow-lg bg-light p-4">
            
                <h3 class="text-center fw-bolder m-2">Update Task</h3>

                 <p class="text-success m-3 mt-1">*Update Task Title*</p>
                 
                 <input type="text" name="title" class="form-control w-75 m-3" value="<?php echo $title ?>">

                    <p class="text-success m-3 mt-1">*extend date of activity*</p>
                    <input type="text" class="w-50 form-control m-3"  name="time" id="time" value="<?php echo $deadline ?>" >

                    <p class="text-success m-3 mt-1">*edit task status*</p>
                <select class=" m-3 w-50 form-control" name="status" id="">
                    <option value="pending">pending</option>

                    <option value="completed">completed</option>
                </select>
                <p class="text-success m-3 mt-1">*Edit Task Content*</p>

                <textarea class="m-3 form-control w-75" name="content"><?php echo $content?></textarea>

                <input type="submit" value="UPDATE" name="update" class="offset-3 bg-success text-light form-control w-50 mb-3">
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>



<?php
include'include/footer.php';
?>
<?php  include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add']))//Checking whether the session is set of not 
            {
                echo $_SESSION['add'];//Display the session message if set
                unset($_SESSION['add']);//Remove session message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>
                   
                <tr>
                <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>


<?php include('partials/footer.php'); ?>


<?php 
    //Process the value from form and save it in Database 
    //Chwck whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        // Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5


        //SQL Query to save the data into Databse
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";


        //3.Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check whether the (Query is Executed) data is inserted or not and dispaly appropriate message
       if($res==TRUE)
       {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
       }
       else
       {
            //Failed to Insert Data
           // echo "Failed to Insert Data";
             //Create a Session Variable to Display Message
             $_SESSION['add'] = "Failed to Add Admin";
             //Redirect Page to Add Admin
             header("location:".SITEURL.'admin/add-admin.php');
       }


    }
    
?>
<?php  

    //Include constant.php file here
    include('../config/constants.php');

    //1.Get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true)
    {

        //Query Executed Successfuly and Admin Deleted
        //echo "Admin Deleted";
        //Create session variable to Display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
       //echo "Failed to Delete Admin";

       $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
       header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>
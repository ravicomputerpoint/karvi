<?php

    $con = mysqli_connect('localhost','root','','test2');

    if(isset($_POST['fetch']))
    {
        $sql = "SELECT * FROM user";

        $result = mysqli_query($con,$sql);

        $output = "";

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $dob = date("d-m-Y",strtotime($row['dob']));
                $output .= "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['father']}</td>
                    <td>{$row['mother']}</td>
                    <td>$dob</td>
                    <td><button class='btn btn-warning' data-edit='{$row['id']}'><i class='fa fa-edit'></button></i></td>
                    <td><button class='btn btn-danger' data-delete='{$row['id']}'><i class='fa fa-trash'></button></i></td>
                </tr>
                ";
            }
            echo $output;
        }
        else
        {
            $output .= "
            <tr>
                <td colspan='7' class='text-center'>No Record Found</td>
            </tr>
            ";
            echo $output;
        }
    }

    if(isset($_POST['insert']))
    {
        $name = $_POST['name'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $dob = $_POST['dob'];

        try {
            $sql = "INSERT INTO user(name,father,mother,dob) VALUES('$name','$father','$mother','$dob')";
            $result = mysqli_query($con,$sql);
            echo 1;
        }   
        catch (mysqli_sql_exception $e){
            echo 2;
        }
    }

    if(isset($_POST['edit_find']))
    {
        $id = $_POST['id'];
        $sql = "SELECT id, name, father, mother,dob from user where id = '$id'";
        $result = mysqli_query($con,$sql);
        echo json_encode(mysqli_fetch_assoc($result));
    }

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $dob = $_POST['dob'];

        try {            
            $sql = "UPDATE `user` SET `name`='$name',`father`='$father',`mother`='$mother',`dob`='$dob' WHERE id = '$id'";
            $result = mysqli_query($con,$sql);
            echo 1;
        }   
        catch (mysqli_sql_exception $e){
            echo 2;
        }
    }

    if(isset($_POST['delete']))
    {
        $id = $_POST['id'];
        try
        {
            $sql = "DELETE FROM user where id = $id";
            $result = mysqli_query($con,$sql);
            echo 1;
        }
        catch (mysqli_sql_exception $e)
        {
            echo 2;
        }
    }

    if(isset($_POST['find']))
    {
        $search = $_POST['search'];

        $sql = "SELECT * FROM user WHERE name LIKE '%{$search}%' OR father LIKE '%{$search}%' OR mother LIKE '%{$search}%' OR dob LIKE '%{$search}%'";

        $result = mysqli_query($con,$sql);

        $output = "";

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $dob = date("d-m-Y",strtotime($row['dob']));
                $output .= "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['father']}</td>
                    <td>{$row['mother']}</td>
                    <td>$dob</td>
                    <td><button class='btn btn-warning' data-edit='{$row['id']}'><i class='fa fa-edit'></button></i></td>
                    <td><button class='btn btn-danger' data-delete='{$row['id']}'><i class='fa fa-trash'></button></i></td>
                </tr>
                ";
            }
            echo $output;
        }
        else
        {
            $output = "
            <tr>
                <td class='text-center' colspan='7'>No Record Found</td>
            </tr>
            ";
            echo $output;
        }

    }
    

?>
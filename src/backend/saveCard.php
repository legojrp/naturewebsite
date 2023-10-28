<?php 
    require_once "central.php";
    if (isset($_FILES["fileToUpload"])){
        $file = $_FILES["fileToUpload"];
        $targetDir = "../pics/";
        $targetFile = $targetDir . basename($_FILES["name"]);

        // Generate a unique file name based on timestamp and random string
        $timestamp = time(); 
        $randomString = bin2hex(random_bytes(8)); 
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $uniqueFileName = $timestamp . '_' . $randomString . '.' . $fileExtension;

        if (move_uploaded_file($file["tmp_name"], $targetFile)){
            $imagename = $uniqueFileName;
            
        }
        else {
            $imagename = "";
        }
    }

    $id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $results = array();
    if ($id){
        $db = new natureDB();
        if ($db->update($desc, $name, $imagename, $id)){
            $results["status"] = "true";
        }
        else {
            $results["status"] = "false";
        }
    }
    else {
        $db = new natureDB();
        if ($db->insert($name, $desc, $imagename)){
            $results["status"] = "true";
        }
        else {
            $results["status"] = "false";
        }
    }
    echo json_encode($results);


    
?>
<?php
  $g_id=0;
  $h_id=0;
  $g_name = "";
  $isEditting = false;
  $dept= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $g_id = $_POST['g_id'];
      updateRole($g_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $g_id = $_GET['edit_role'];
    editRole($g_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $g_id = $_GET['delete_role'];
    deleteRole($g_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $g_id,$g_name,$h_id;
    
    if (count($errors) === 0) {
       // receive form values
       $g_id = $_POST['g_id'];
      $g_name = $_POST['g_name'];
      $h_id=$_POST['h_id'];
       $sql= "INSERT INTO guest SET g_id=?, g_name=?, h_id=?";
       $result = modifyRecord($sql, 'sss', [$g_id,$g_name, $h_id]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/guest/guestList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($g_id){
    global $conn, $errors, $g_id,$g_name,$h_id, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $g_id = $_POST['g_id'];
      $g_name = $_POST['g_name'];
      $h_id = $_POST['h_id'];
      $sql = "UPDATE guest SET g_name=?,h_id=? WHERE g_id=?";
      $result = modifyRecord($sql, 'ssi', [$g_name,$h_id,$g_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/guest/guestList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($g_id){
    global $conn, $g_id,$g_name,$h_id, $isEditting;
    $sql = "SELECT * FROM guest WHERE g_id=? LIMIT 1";
    $guest = getSingleRecord($sql, 'i', [$g_id]);

    $g_id = $guest['g_id'];
    $g_name = $guest['g_name'];
    $h_id=$guest['h_id'];
    $isEditting = true;
  }
  function deleteRole($g_id) {
    global $conn;
    $sql = "DELETE FROM guest WHERE g_id=?";
    $result = modifyRecord($sql, 'i', [$g_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/guest/guestList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT g_id,g_name,h_id FROM guest";
    $guest = getMultipleRecords($sql);
    return $guest;
  }
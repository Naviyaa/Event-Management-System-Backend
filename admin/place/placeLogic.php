<?php
  $h_id = 0;
  $v_id=0;
  $isEditting = false;
  $place= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $h_id = $_POST['h_id'];
      updateRole($h_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $h_id = $_GET['edit_role'];
    editRole($h_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $h_id = $_GET['delete_role'];
    deleteRole($h_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $h_id,$v_id;;
    
    if (count($errors) === 0) {
       // receive form values
       $h_id = $_POST['h_id'];
       $v_id=$_POST['v_id'];
       $sql= "INSERT INTO at_place SET h_id=?,v_id=?";
       $result = modifyRecord($sql, 'ss', [$h_id,$v_id]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/place/placeList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($h_id){
    global $conn, $errors, $h_id,$v_id, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $h_id = $_POST['h_id'];
      $v_id=$_POST['v_id'];
      $sql = "UPDATE place SET v_id=? WHERE h_id=?";
      $result = modifyRecord($sql, 'si', [$v_id, $o_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/place/placeList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($h_id){
    global $conn, $name, $description, $isEditting;
    $sql = "SELECT * FROM at_place WHERE h_id=? LIMIT 1";
    $place = getSingleRecord($sql, 'i', [$h_id]);

    $h_id = $place['h_id'];
    $v_id=$place['v_id'];
    $isEditting = true;
  }
  function deleteRole($h_id) {
    global $conn;
    $sql = "DELETE FROM at_place WHERE h_id=?";
    $result = modifyRecord($sql, 'i', [$h_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/place/placeList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT h_id,v_id FROM at_place";
    $place = getMultipleRecords($sql);
    return $place;
  }
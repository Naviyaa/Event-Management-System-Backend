<?php
  $v_id=0;
  $capacity=0;
  $v_add = "";
  $isEditting = false;
  $staff= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $v_id = $_POST['v_id'];
      updateRole($v_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $v_id = $_GET['edit_role'];
    editRole($v_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $v_id = $_GET['delete_role'];
    deleteRole($v_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $v_id,$capacity, $v_add;
    
    if (count($errors) === 0) {
       // receive form values
       $v_id = $_POST['v_id'];
      $capacity = $_POST['capacity'];
      $v_add = $_POST['v_add'];
       $sql= "INSERT INTO venue SET v_id=?, capacity=?, v_add=?";
       $result = modifyRecord($sql, 'sss', [$v_id,$capacity, $v_add]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/venue/venueList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($v_id){
    global $conn, $errors, $v_id,$capacity,$v_add, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $v_id = $_POST['v_id'];
      $capacity = $_POST['capacity'];
      $v_add = $_POST['v_add'];
      $sql = "UPDATE venue SET capacity=?,v_add=? WHERE v_id=?";
      $result = modifyRecord($sql, 'ssi', [$capacity, $v_add, $v_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/venue/venueList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($v_id){
    global $conn, $capacity, $v_add,$v_id, $isEditting;
    $sql = "SELECT * FROM venue WHERE v_id=? LIMIT 1";
    $venue = getSingleRecord($sql, 'i', [$v_id]);

    $v_id = $venue['v_id'];
    $capacity = $venue['capacity'];
    $v_add = $venue['v_add'];
    $isEditting = true;
  }
  function deleteRole($v_id) {
    global $conn;
    $sql = "DELETE FROM venue WHERE v_id=?";
    $result = modifyRecord($sql, 'i', [$v_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/venue/venueList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT v_id,capacity,v_add FROM venue";
    $venue = getMultipleRecords($sql);
    return $venue;
  }
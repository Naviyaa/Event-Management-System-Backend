<?php
  $s_id = 0;
  $s_ph=0;
  $s_sal=0;
  $s_name = "";
  $d_id=0;
  $s_dob="";
  $s_add = "";
  $isEditting = false;
  $staff= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $s_id = $_POST['s_id'];
      updateRole($s_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $s_id = $_GET['edit_role'];
    editRole($s_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $s_id = $_GET['delete_role'];
    deleteRole($s_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $s_id,$s_dob,$s_sal,$s_ph,$d_id,$s_name, $s_add;
    
    if (count($errors) === 0) {
       // receive form values
       $s_id = $_POST['s_id'];
      $s_name = $_POST['s_name'];
      $s_sal = $_POST['s_sal'];
      $s_ph = $_POST['s_ph'];
      $d_id = $_POST['d_id'];
      $s_dob = $_POST['s_dob'];
      $s_add = $_POST['s_add'];
       $sql= "INSERT INTO staff SET s_id=?, s_name=?, s_dob=?, s_ph=?, s_sal=?, d_id=?, s_add=?";
       $result = modifyRecord($sql, 'sssssss', [$s_id,$s_name,$s_dob,$s_ph,$s_sal,$d_id, $s_add]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/staff/staffList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($s_id){
    global $conn, $errors, $s_id,$s_sal,$s_dob,$d_id,$s_add,$s_ph,$s_name, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $s_id = $_POST['s_id'];
      $s_name = $_POST['s_name'];
      $s_sal = $_POST['s_sal'];
      $s_ph = $_POST['s_ph'];
      $d_id = $_POST['d_id'];
      $s_dob = $_POST['s_dob'];
      $s_add = $_POST['s_add'];
      $sql = "UPDATE staff SET s_name=?,s_dob=?, s_ph=?,s_sal=?,d_id=?, s_add=? WHERE s_id=?";
      $result = modifyRecord($sql, 'ssssssi', [$s_name,$s_dob,$s_ph,$s_sal,$d_id, $s_add, $s_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/staff/staffList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($s_id){
    global $conn, $s_name, $s_add,$s_ph,$d_id,$s_dob,$s_sal,$s_id, $isEditting;
    $sql = "SELECT * FROM staff WHERE s_id=? LIMIT 1";
    $staff = getSingleRecord($sql, 'i', [$s_id]);

    $s_id = $staff['s_id'];
    $s_name = $staff['s_name'];
    $s_sal = $staff['s_sal'];
    $s_ph = $staff['s_ph'];
    $d_id = $staff['d_id'];
    $s_dob = $staff['s_dob'];
    $s_add = $staff['s_add'];
    $isEditting = true;
  }
  function deleteRole($s_id) {
    global $conn;
    $sql = "DELETE FROM staff WHERE s_id=?";
    $result = modifyRecord($sql, 'i', [$s_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/staff/staffList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT s_id,s_name,s_dob,s_ph,s_sal,d_id,s_add FROM staff";
    $staff = getMultipleRecords($sql);
    return $staff;
  }
<?php
  $o_id = 0;
  $ph_no=0;
  $o_sal=0;
  $o_name = "";
  $o_mail="";
  $o_dob="";
  $address = "";
  $isEditting = false;
  $organizers= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $o_id = $_POST['o_id'];
      updateRole($o_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $o_id = $_GET['edit_role'];
    editRole($o_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $o_id = $_GET['delete_role'];
    deleteRole($o_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $o_id,$o_dob,$o_sal,$ph_no,$o_mail,$o_name, $address;
    $errors = validateRole($_POST, ['save_role']);
    if (count($errors) === 0) {
       // receive form values
       $o_id = $_POST['o_id'];
      $o_name = $_POST['o_name'];
      $o_sal = $_POST['o_sal'];
      $ph_no = $_POST['ph_no'];
      $o_mail = $_POST['o_mail'];
      $o_dob = $_POST['o_dob'];
      $address = $_POST['address'];
       $sql= "INSERT INTO organizer SET o_id=?, o_sal=?, ph_no=?, o_mail=?, o_dob=?, o_name=?, address=?";
       $result = modifyRecord($sql, 'sssssss', [$o_id,$o_sal,$ph_no,$o_mail,$o_dob,$o_name, $address]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/organizer/organizerList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($o_id){
    global $conn, $errors, $o_id,$o_sal,$o_dob,$o_mail,$address,$ph_no,$o_name, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      $errors = validateRole($_POST, ['update_role']);
      // receive form values
      $o_id = $_POST['o_id'];
      $o_name = $_POST['o_name'];
      $o_sal = $_POST['o_sal'];
      $ph_no = $_POST['ph_no'];
      $o_mail = $_POST['o_mail'];
      $o_dob = $_POST['o_dob'];
      $address = $_POST['address'];
      $sql = "UPDATE organizer SET o_sal=?,ph_no=?,o_mail=?,o_dob=?, o_name=?, address=? WHERE o_id=?";
      $result = modifyRecord($sql, 'ssssssi', [$o_sal,$ph_name,$o_mail,$o_dob,$o_name, $address, $o_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/organizer/organizerList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($o_id){
    global $conn,$o_id,$o_sal,$ph_no,$address, $o_name,$o_dob,$o_mail, $isEditting;
    $sql = "SELECT * FROM organizer WHERE o_id=? LIMIT 1";
    $organizers = getSingleRecord($sql, 'i', [$o_id]);

    $o_id = $organizers['o_id'];
    $o_name = $organizers['o_name'];
    $o_sal = $organizers['o_sal'];
    $ph_no = $organizers['ph_no'];
    $o_mail = $organizers['o_mail'];
    $o_dob = $organizers['o_dob'];
    $address = $organizers['address'];
    $isEditting = true;
  }
  function deleteRole($o_id) {
    global $conn;
    $sql = "DELETE FROM organizer WHERE o_id=?";
    $result = modifyRecord($sql, 'i', [$o_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/organizer/organizerList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT o_id, o_sal,ph_no,o_mail,o_dob,o_name,address FROM organizer";
    $organizers = getMultipleRecords($sql);
    return $organizers;
  }
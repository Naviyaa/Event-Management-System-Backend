<?php
  $h_id = 0;
  $h_ph=0;
  $bill=0;
  $h_name = "";
  $h_mail="";
  $h_dob="";
  $h_add = "";
  $isEditting = false;
  $host= array();
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
    global $conn, $errors, $h_id,$h_dob,$bill,$h_ph,$h_mail,$h_name, $h_add;
    
    if (count($errors) === 0) {
       // receive form values
       $h_id = $_POST['h_id'];
      $h_name = $_POST['h_name'];
      $bill = $_POST['bill'];
      $h_ph = $_POST['h_ph'];
      $h_mail = $_POST['h_mail'];
      $h_dob = $_POST['h_dob'];
      $h_add = $_POST['h_add'];
       $sql= "INSERT INTO host SET h_id=?, bill=?, h_name=?, h_ph=?, h_mail=?, h_dob=?, h_add=?";
       $result = modifyRecord($sql, 'sssssss', [$h_id,$bill,$h_name,$h_ph,$h_mail,$h_dob, $h_add]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/host/hostList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($h_id){
    global $conn, $errors, $h_id,$o_sal,$o_dob,$o_mail,$address,$ph_no,$o_name, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $o_id = $_POST['o_id'];
      $o_name = $_POST['o_name'];
      $o_sal = $_POST['o_sal'];
      $ph_no = $_POST['ph_no'];
      $o_mail = $_POST['o_mail'];
      $o_dob = $_POST['o_dob'];
      $address = $_POST['address'];
      $sql = "UPDATE host SET bill=?,h_name=?, h_ph=?,h_mail=?,h_dob=?, h_add=? WHERE h_id=?";
      $result = modifyRecord($sql, 'ssssssi', [$bill,$h_name,$h_ph,$h_mail,$h_dob, $h_add, $h_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/host/hostList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($h_id){
    global $conn, $h_name, $h_add,$h_ph,$h_id,$h_dob,$bill,$h_mail, $isEditting;
    $sql = "SELECT * FROM host WHERE h_id=? LIMIT 1";
    $host = getSingleRecord($sql, 'i', [$h_id]);

    $h_id = $host['h_id'];
    $h_name = $host['h_name'];
    $bill = $host['bill'];
    $h_ph = $host['h_ph'];
    $h_mail = $host['h_mail'];
    $h_dob = $host['h_dob'];
    $h_add = $host['h_add'];
    $isEditting = true;
  }
  function deleteRole($h_id) {
    global $conn;
    $sql = "DELETE FROM host WHERE h_id=?";
    $result = modifyRecord($sql, 'i', [$h_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/host/hostList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT h_id, bill,h_name,h_ph,h_mail,h_dob,h_add FROM host";
    $host = getMultipleRecords($sql);
    return $host;
  }
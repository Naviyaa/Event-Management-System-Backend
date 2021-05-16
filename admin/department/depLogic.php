<?php
  $d_id=0;
  $o_id=0;
  $d_head="";
  $d_name = "";
  $isEditting = false;
  $dept= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $d_id = $_POST['d_id'];
      updateRole($d_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $d_id = $_GET['edit_role'];
    editRole($d_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $d_id = $_GET['delete_role'];
    deleteRole($d_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $d_id,$d_name,$o_id, $d_head;
    
    if (count($errors) === 0) {
       // receive form values
       $d_id = $_POST['d_id'];
      $d_name = $_POST['d_name'];
      $d_head = $_POST['d_head'];
      $o_id=$_POST['o_id'];
       $sql= "INSERT INTO department SET d_id=?, d_head=?, d_name=?, o_id=?";
       $result = modifyRecord($sql, 'ssss', [$d_id,$d_head,$d_name, $o_id]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/department/depList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($d_id){
    global $conn, $errors, $d_id,$d_head,$d_name,$o_id, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      // receive form values
      $d_id = $_POST['d_id'];
      $d_head= $_POST['d_head'];
      $d_name = $_POST['d_name'];
      $o_id = $_POST['o_id'];
      $sql = "UPDATE department SET d_head=?,d_name=?,o_id=? WHERE d_id=?";
      $result = modifyRecord($sql, 'sssi', [$d_head, $d_name,$o_id,$d_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/department/depList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($d_id){
    global $conn, $o_id,$d_head,$d_name,$d_id, $isEditting;
    $sql = "SELECT * FROM department WHERE d_id=? LIMIT 1";
    $dept = getSingleRecord($sql, 'i', [$d_id]);

    $d_id = $dept['d_id'];
    $d_name = $dept['d_name'];
    $d_head = $dept['d_head'];
    $o_id=$dept['o_id'];
    $isEditting = true;
  }
  function deleteRole($d_id) {
    global $conn;
    $sql = "DELETE FROM department WHERE d_id=?";
    $result = modifyRecord($sql, 'i', [$d_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/department/depList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT d_id,d_head,d_name,o_id FROM department";
    $dept = getMultipleRecords($sql);
    return $dept;
  }
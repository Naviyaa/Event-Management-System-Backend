<?php
  $e_id = 0;
  $budget=0;
  $e_type="";
  $e_time="";
  $e_date="";
  $h_id=0;
  $o_id=0;
  $isEditting = false;
  $events= array();
  $errors = array();

  // ACTION: update role
  if (isset($_POST['update_role'])) {
      $e_id = $_POST['e_id'];
      updateRole($e_id);
  }
  // ACTION: Save Role
  if (isset($_POST['save_role'])) {
      saveRole();
  }
  // ACTION: fetch role for editting
  if (isset($_GET["edit_role"])) {
    $e_id = $_GET['edit_role'];
    editRole($e_id);
  }
  // ACTION: Delete role
  if (isset($_GET['delete_role'])) {
    $e_id = $_GET['delete_role'];
    deleteRole($e_id);
  }
  // Save role to database
  function saveRole(){
    global $conn, $errors, $o_id,$e_id,$h_id,$budget,$e_type,$e_time,$e_date;
    $errors = validateRole($_POST, ['save_role']);
    if (count($errors) === 0) {
       // receive form values
       $e_id = $_POST['e_id'];
      $h_id = $_POST['h_id'];
      $budget = $_POST['budget'];
      $e_type = $_POST['e_type'];
      $e_time = $_POST['e_time'];
      $e_date = $_POST['e_date'];
      $o_id = $_POST['o_id'];
       $sql= "INSERT INTO events SET e_id=?, budget=?, e_type=?,e_time=?, e_date=?, h_id=?, o_id=?";
       $result = modifyRecord($sql, 'sssssss', [$e_id,$budget,$e_type,$e_time,$e_date,$h_id, $o_id]);

       if ($result) {
         $_SESSION['success_msg'] = "Info added successfully";
         header("location: " . BASE_URL . "admin/events/eventList.php");
         exit(0);
       } else {
         $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
       }
    }
  }
  function updateRole($e_id){
    global $conn, $errors,$o_id,$e_id,$h_id,$budget,$e_type,$e_time,$e_date, $isEditting; // pull in global form variables into function
    if (count($errors) === 0) {
      $errors = validateRole($_POST, ['update_role']);
      // receive form values
      $e_id = $_POST['e_id'];
      $h_id = $_POST['h_id'];
      $budget = $_POST['budget'];
      $e_type = $_POST['e_type'];
      $e_time = $_POST['e_time'];
      $e_date = $_POST['e_date'];
      $o_id = $_POST['o_id'];
      $sql = "UPDATE events SET budget=?,e_type=?,e_time=?,e_date=?, h_id=?,o_id=? WHERE e_id=?";
      $result = modifyRecord($sql, 'ssssssi', [$budget,$e_type,$e_time,$e_date,$h_id,$o_id, $e_id]);

      if ($result) {
        $_SESSION['success_msg'] = "Info successfully updated";
        $isEditting = false;
        header("location: " . BASE_URL . "admin/events/eventList.php");
        exit(0);
      } else {
        $_SESSION['error_msg'] = "Something went wrong. Could not save info in table";
      }
    }
  }
  function editRole($e_id){
    global $conn,$o_id,$e_id,$h_id,$budget,$e_type,$e_time,$e_date, $isEditting;
    $sql = "SELECT * FROM events WHERE e_id=? LIMIT 1";
    $events = getSingleRecord($sql, 'i', [$e_id]);

      $e_id = $events['e_id'];
      $h_id = $events['h_id'];
      $budget = $events['budget'];
      $e_type = $events['e_type'];
      $e_time = $events['e_time'];
      $e_date = $events['e_date'];
      $o_id = $events['o_id'];
    $isEditting = true;
  }
  function deleteRole($e_id) {
    global $conn;
    $sql = "DELETE FROM events WHERE e_id=?";
    $result = modifyRecord($sql, 'i', [$e_id]);
    if ($result) {
      $_SESSION['success_msg'] = "Info trashed!!";
      header("location: " . BASE_URL . "admin/events/eventList.php");
      exit(0);
    }
  }
  function getAllRoles(){
    global $conn;
    $sql = "SELECT e_id, budget,e_type,e_time,e_date,h_id,o_id FROM events";
    $events = getMultipleRecords($sql);
    return $events;
  }
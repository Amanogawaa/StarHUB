<?php
require_once 'global.php';

class Post extends GlobalMethods
{   
    private $pdo;
    public function __construct(\PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    public function add_user($pdo, $data)
    { 
        // Check if all required properties are set
        if (!isset($data->first_name, $data->last_name, $data->course,
                   $data->block, $data->email, $data->password, $data->role_id)) {
            return $this->sendPayload(null, 'failed', "Incomplete user data.", 400);
        }
    
        // Proceed with adding the user
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $course = $data->course;
        $block = $data->block;
        $email = $data->email;
        $password = $data->password;
        $role_id = $data->role_id;
    
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Prepare and execute the SQL query
        $sql = "INSERT INTO User (First_Name, Last_Name, Course, Block, Email_Address, Password, Role_Id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$first_name, $last_name, $course, $block, $email, $hashed_password, $role_id]);
    
            // Check if the query executed successfully
            if ($stmt->rowCount() > 0) {
                return $this->sendPayload(null, 'success', "User added successfully.", 200);
            } else {
                return $this->sendPayload(null, 'failed', "Failed to add user.", 500);
            }
        } catch (PDOException $e) {
            // Handle database errors
            return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
        }
    }
    
    public function edit_user($pdo, $data, $user_id)
    {
        // Check if all required properties are set
        if (!isset($data->first_name, $data->last_name, $data->course,
                   $data->block, $data->email, $data->role_id)) {
            return $this->sendPayload(null, 'failed', "Incomplete user data.", 400);
        }
    
        // Proceed with editing the user
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $course = $data->course;
        $block = $data->block;
        $email = $data->email;
        $role_id = $data->role_id; 
    
        // Prepare and execute the SQL query
        $sql = "UPDATE User 
                SET First_Name = ?, Last_Name = ?, Course = ?, Block = ?, 
                Email_Address = ?, Role_Id = ? 
                WHERE User_Id = ?";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$first_name, $last_name, $course, $block, $email, $role_id, $user_id]);
    
            // Check if the query executed successfully
            if ($stmt->rowCount() > 0) {
                return $this->sendPayload(null, 'success', "User updated successfully.", 200);
            } else {
                return $this->sendPayload(null, 'failed', "Failed to update user.", 500);
            }
        } catch (PDOException $e) {
            // Handle database errors
            return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
        }
    }

public function delete_user($pdo, $user_id)
{
    // Prepare and execute the SQL query
    $sql = "DELETE FROM User WHERE User_Id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        // Check if the query executed successfully
        if ($stmt->rowCount() > 0) {
            return $this->sendPayload(null, 'success', "User deleted successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to delete user.", 500);
        }
    } catch (PDOException $e) {
        // Handle database errors
        return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
    }
}
    public function add_event($pdo, $data)
{
    // Check if all required properties are set
    if (!isset($data->event_name, $data->event_description, $data->event_location,
               $data->event_start_date, $data->event_end_date,
               $data->event_registration_start_date, $data->event_registration_end_date,
               $data->organization_id, $data->requirement_id, $data->session_id,
               $data->created_by_user_id)) {
        return $this->sendPayload(null, 'failed', "Incomplete event data.", 400);
    }

    $event_name = $data->event_name;
    $event_description = $data->event_description;
    $event_location = $data->event_location;
    $event_start_date = $data->event_start_date;
    $event_end_date = $data->event_end_date;
    $event_registration_start_date = $data->event_registration_start_date;
    $event_registration_end_date = $data->event_registration_end_date;
    $organization_id = $data->organization_id; 
    $requirement_id = $data->requirement_id; 
    $session_id = $data->session_id; 
    $created_by_user_id = $data->created_by_user_id; 

    // Prepare and execute the SQL query
    $sql = "INSERT INTO Events (Event_Name, Event_Description, Event_Location, Event_Start_Date, Event_End_Date, 
            Event_Registration_Start_Date, Event_Registration_End_Date, Organization_Id, Requirement_Id, Session_Id, 
            Created_By_User_Id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$event_name, $event_description, $event_location, $event_start_date, $event_end_date, 
                        $event_registration_start_date, $event_registration_end_date, $organization_id, 
                        $requirement_id, $session_id, $created_by_user_id]);

        // Check if the query executed successfully
        if ($stmt->rowCount() > 0) {
            return $this->sendPayload(null, 'success', "Event added successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to add event.", 500);
        }
    } catch (PDOException $e) {
        // Handle database errors
        return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
    }
}

public function edit_event($pdo, $data, $event_id)
{
    // Check if all required properties are set
    if (!isset($data->event_name, $data->event_description, $data->event_location,
               $data->event_start_date, $data->event_end_date,
               $data->event_registration_start_date, $data->event_registration_end_date,
               $data->organization_id, $data->requirement_id, $data->session_id,
               $data->last_modified_by_user_id)) {
        return $this->sendPayload(null, 'failed', "Incomplete event data.", 400);
    }

    $event_name = $data->event_name;
    $event_description = $data->event_description;
    $event_location = $data->event_location;
    $event_start_date = $data->event_start_date;
    $event_end_date = $data->event_end_date;
    $event_registration_start_date = $data->event_registration_start_date;
    $event_registration_end_date = $data->event_registration_end_date;
    $organization_id = $data->organization_id; 
    $requirement_id = $data->requirement_id; 
    $session_id = $data->session_id; 
    $last_modified_by_user_id = $data->last_modified_by_user_id; 

    // Prepare and execute the SQL query
    $sql = "UPDATE Events 
            SET Event_Name = ?, Event_Description = ?, Event_Location = ?, 
            Event_Start_Date = ?, Event_End_Date = ?, 
            Event_Registration_Start_Date = ?, Event_Registration_End_Date = ?, 
            Organization_Id = ?, Requirement_Id = ?, Session_Id = ?, 
            Last_Modified_By_User_Id = ? 
            WHERE Event_Id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$event_name, $event_description, $event_location, 
                        $event_start_date, $event_end_date, 
                        $event_registration_start_date, $event_registration_end_date, 
                        $organization_id, $requirement_id, $session_id, 
                        $last_modified_by_user_id, $event_id]);

        // Check if the query executed successfully
        if ($stmt->rowCount() > 0) {
            return $this->sendPayload(null, 'success', "Event updated successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to update event.", 500);
        }
    } catch (PDOException $e) {
        // Handle database errors
        return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
    }
}

public function delete_event($pdo, $event_id)
{
    // Prepare and execute the SQL query
    $sql = "DELETE FROM Events WHERE Event_Id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$event_id]);

        // Check if the query executed successfully
        if ($stmt->rowCount() > 0) {
            return $this->sendPayload(null, 'success', "Event deleted successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to delete event.", 500);
        }
    } catch (PDOException $e) {
        // Handle database errors
        return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
    }
}
}
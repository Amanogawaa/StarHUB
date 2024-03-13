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
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $course = $data->course;
        $block = $data->block;
        $email = $data->email;
        $password = $data->password;
        $role_id = $data->role_id;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (First_Name, Last_Name, Course, Block, Email_Address, Password, Role_Id) 
                VALUES ('$first_name', '$last_name', '$course', '$block', '$email', '$hashed_password', $role_id)";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "User added successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to add user.", 500);
        }
    }

    public function edit_user($pdo, $data, $user_id)
    {
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $course = $data->course;
        $block = $data->block;
        $email = $data->email;
        $role_id = $data->role_id; 

        $sql = "UPDATE User 
                SET First_Name = '$first_name', Last_Name = '$last_name', Course = '$course', Block = '$block', 
                Email_Address = '$email', Role_Id = $role_id 
                WHERE User_Id = $user_id";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "User updated successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to update user.", 500);
        }
    }

    public function delete_user($pdo, $user_id)
    {
        $sql = "DELETE FROM User WHERE User_Id = $user_id";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "User deleted successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to delete user.", 500);
        }
    }

    public function add_event($pdo, $data)
    {
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

        $sql = "INSERT INTO Events (Event_Name, Event_Description, Event_Location, Event_Start_Date, Event_End_Date, 
                Event_Registration_Start_Date, Event_Registration_End_Date, Organization_Id, Requirement_Id, Session_Id, 
                Created_By_User_Id) 
                VALUES ('$event_name', '$event_description', '$event_location', '$event_start_date', '$event_end_date', 
                '$event_registration_start_date', '$event_registration_end_date', $organization_id, $requirement_id, 
                $session_id, $created_by_user_id)";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "Event added successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to add event.", 500);
        }
    }

    public function edit_event($pdo, $data, $event_id)
    {
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

        $sql = "UPDATE Events 
                SET Event_Name = '$event_name', Event_Description = '$event_description', Event_Location = '$event_location', 
                Event_Start_Date = '$event_start_date', Event_End_Date = '$event_end_date', 
                Event_Registration_Start_Date = '$event_registration_start_date', 
                Event_Registration_End_Date = '$event_registration_end_date', Organization_Id = $organization_id, 
                Requirement_Id = $requirement_id, Session_Id = $session_id, 
                Last_Modified_By_User_Id = $last_modified_by_user_id 
                WHERE Event_Id = $event_id";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "Event updated successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to update event.", 500);
        }
    }

    public function delete_event($pdo, $data, $event_id)
    {
        $sql = "DELETE FROM Events WHERE Event_Id = $event_id";
        $result = $pdo->exec($sql);

        if ($result !== false) {
            return $this->sendPayload(null, 'success', "Event deleted successfully.", 200);
        } else {
            return $this->sendPayload(null, 'failed', "Failed to delete event.", 500);
        }
    }
}
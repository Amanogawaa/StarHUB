<?php

require_once 'global.php';

class Get extends GlobalMethods
{
    private $pdo;

    public function __construct(\PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    // Private method to fetch records from the database table
    private function get_records($table, $conditions = null)
    {
        $sqlStr = "SELECT * FROM $table";
        if ($conditions != null) {
            $sqlStr .= " WHERE " . $conditions;
        }
        return $this->executeQuery($this->pdo, $sqlStr); // Adjusted call to executeQuery()
    }

    // Private method to execute a SQL query and handle exceptions
    private function executeQuery($pdo, $sql)
    {
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                return $this->sendPayload($data, 'success', "Successfully retrieved data.", 200);
            } else {
                return $this->sendPayload(null, 'failed', "No data found.", 404);
            }
        } catch (PDOException $e) {
            return $this->sendPayload(null, 'failed', $e->getMessage(), 500);
        }
    }

    // Method to fetch users from the database
    public function get_users($id = null)
    {
        $condition = $id ? "id=$id" : null;
        return $this->get_records('user', $condition);
    }

    // Method to fetch roles from the database
    public function get_roles($id = null)
    {
        $condition = $id ? "id=$id" : null;
        return $this->get_records('role', $condition);
    }

    // Method to fetch events from the database
    public function get_events($id = null)
    {
        $condition = $id ? "id=$id" : null;
        return $this->get_records('event', $condition);
    }

    // Method to fetch all events from the database
    public function get_all_events()
    {
        return $this->get_events();
    }
}

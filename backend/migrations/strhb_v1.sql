CREATE TABLE IF NOT EXISTS Organization (
    Organization_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Organization_Name VARCHAR(100) NOT NULL,
    PRIMARY KEY (Organization_Id),
    UNIQUE (Organization_Name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Session_Mode (
    Session_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Session_Name VARCHAR(50) NOT NULL,
    PRIMARY KEY (Session_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Requirements (
    Requirement_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Requirement_Name VARCHAR(100) NOT NULL,
    Requirement_Description TEXT,
    PRIMARY KEY (Requirement_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Role (
    Role_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Role_Name VARCHAR(50) NOT NULL,
    PRIMARY KEY (Role_Id),
    KEY (Role_Name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS User (
    User_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(50) NOT NULL,
    Last_Name VARCHAR(50) NOT NULL,
    Course VARCHAR(100),
    Block VARCHAR(50),
    Email_Address VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Registration_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Role_Id INT UNSIGNED NOT NULL,
    PRIMARY KEY (User_Id),
    FOREIGN KEY (Role_Id) REFERENCES Role(Role_Id),
    UNIQUE (Email_Address)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS User_Image (
    User_Image_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    User_Id INT UNSIGNED NOT NULL,
    PRIMARY KEY (User_Image_Id),
    FOREIGN KEY (User_Id) REFERENCES User(User_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Organization_User (
    Organization_User_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Organization_Id INT UNSIGNED NOT NULL,
    User_Id INT UNSIGNED NOT NULL,
    PRIMARY KEY (Organization_User_Id),
    FOREIGN KEY (Organization_Id) REFERENCES Organization(Organization_Id),
    FOREIGN KEY (User_Id) REFERENCES User(User_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Events (
    Event_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Event_Name VARCHAR(100) NOT NULL,
    Event_Description TEXT,
    Event_Location VARCHAR(255),
    Event_Creation_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Event_Start_Date DATETIME,
    Event_End_Date DATETIME,
    Event_Registration_Start_Date DATETIME,
    Event_Registration_End_Date DATETIME,
    Event_Status VARCHAR(50),
    Last_Modified_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Organization_Id INT UNSIGNED,
    Requirement_Id INT UNSIGNED,
    Session_Id INT UNSIGNED,
    Created_By_User_Id INT UNSIGNED,
    Last_Modified_By_User_Id INT UNSIGNED,
    PRIMARY KEY (Event_Id),
    FOREIGN KEY (Organization_Id) REFERENCES Organization(Organization_Id),
    FOREIGN KEY (Requirement_Id) REFERENCES Requirements(Requirement_Id),
    FOREIGN KEY (Session_Id) REFERENCES Session_Mode(Session_Id),
    FOREIGN KEY (Created_By_User_Id) REFERENCES User(User_Id),
    FOREIGN KEY (Last_Modified_By_User_Id) REFERENCES User(User_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Event_Image (
    Event_Image_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Event_Id INT UNSIGNED NOT NULL,
    PRIMARY KEY (Event_Image_Id),
    FOREIGN KEY (Event_Id) REFERENCES Events(Event_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS Event_Registration (
    Registration_Id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    Registration_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    User_Id INT UNSIGNED,
    Event_Id INT UNSIGNED,
    Requirement_Id INT UNSIGNED,
    PRIMARY KEY (Registration_Id),
    FOREIGN KEY (User_Id) REFERENCES User(User_Id),
    FOREIGN KEY (Event_Id) REFERENCES Events(Event_Id),
    FOREIGN KEY (Requirement_Id) REFERENCES Requirements(Requirement_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT IGNORE INTO
    Role (Role_Id, Role_Name)
VALUES (1, 'admin'),
    (2, 'organizer'),
    (3, 'user');

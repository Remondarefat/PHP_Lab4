CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    gender  ENUM('male', 'female') DEFAULT 'male' NOT NULL,
    mail_status  NOT NULL  ENUM('yes', 'no') DEFAULT 'no',
    created_at DATETIME NOT NULL DEFAULT NOW() ,
    PRIMARY KEY(id)
);

INSERT INTO users (name, email, gender,mail_status) 
VALUES ('Remonda', 'remondarefat2017@gmail.com','female','yes');
e
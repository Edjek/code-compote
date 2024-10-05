CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM(`member`, `moderator`, `admin`) NOT NULL DEFAULT `member`
);

alter table user modify column registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT
);

CREATE TABLE topic (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('open', 'closed', 'pinned') NOT NULL DEFAULT 'open',
    user_id INT,
    category_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

CREATE TABLE message (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    publication_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modification_date DATETIME,
    user_id INT,
    topic_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (topic_id) REFERENCES Topic(id)
);

CREATE TABLE tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE topic_tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    topic_id INT,
    tag_id INT,
    FOREIGN KEY (topic_id) REFERENCES Topic(id),
    FOREIGN KEY (tag_id) REFERENCES Tag(id)
);

CREATE TABLE reaction (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type ENUM('like', 'dislike', 'laugh') NOT NULL,
    user_id INT,
    message_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (message_id) REFERENCES Message(id)
);

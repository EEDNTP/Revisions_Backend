CREATE TABLE authors(
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(100) NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE categories(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    content TEXT NOT NULL,
    authors_id INT NOT NULL,
    FOREIGN KEY (authors_id) REFERENCES authors(id)
);

CREATE TABLE posts_categories(
    posts_id INT NOT NULL,
    categories_id INT NOT NULL,
    PRIMARY KEY(posts_id, categories_id),
    FOREIGN KEY (posts_id) REFERENCES posts(id),
    FOREIGN KEY (categories_id) REFERENCES categories(id)
);

CREATE TABLE comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(500) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    posts_id INT NOT NULL,
    FOREIGN KEY (posts_id) REFERENCES posts(id)
);
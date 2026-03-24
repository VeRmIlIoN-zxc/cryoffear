CREATE TABLE users {
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    login VARACHAR(20) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL
}

INSERT INTO users (login, password) VALUES ('admin', 'admin');

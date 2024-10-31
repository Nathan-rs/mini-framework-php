-- SQLite
CREATE TABLE IF NOT EXISTS todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    isFinished INTEGER DEFAULT 0
);

INSERT INTO todos (title, description, isFinished) VALUES ('Estudar SQLite','Estudando os comando sql', 0);
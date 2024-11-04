-- SQLite
CREATE TABLE IF NOT EXISTS todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    isFinished BOOLEAN DEFAULT false
);

use todo_list;

INSERT INTO todos (title, description, isFinished) VALUES ('Estudar SQLite','Estudando os comando sql', false);

SELECT * FROM todos;

DELETE FROM todos WHERE id = 4;

DROP TABLE todos;
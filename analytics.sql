CREATE TABLE analytics (
    referer TEXT,
    ip TEXT,
    timestamp DATETIME
);
CREATE TABLE announcements (
    title TEXT,
    body TEXT,
    timestamp DATETIME,
    hidden BOOLEAN
);
CREATE TABLE iwnaras (
    last_online DATETIME
);

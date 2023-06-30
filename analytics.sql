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
    last_online DATETIME DEFAULT '1998-04-17 15:15'
);

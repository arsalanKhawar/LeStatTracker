CREATE TABLE teams(
    teamid int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userid int NOT NULL,
    teamname varchar(128) NOT NULL,
    FOREIGN KEY (userid) REFERENCES users(userid)
    );
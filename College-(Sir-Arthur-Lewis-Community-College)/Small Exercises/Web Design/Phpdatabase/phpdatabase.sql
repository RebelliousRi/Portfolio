CREATE TABLE users(

id INT(11) NOT NULL AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
pwd VARCHAR(300) NOT NULL,
email VARCHAR(100) NOT NULL,
created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP

PRIMARY KEY(id)

);

INSERT INTO users(username, pwd, email)

VALUES(

'Alice',
'123',
'alice@gmail.com'


);

INSERT INTO users(username, pwd, email)

VALUES(

'John',
'456',
'john@gmail.com'


);

INSERT INTO users(username, pwd, email)

VALUES(

'Jane',
'789',
'jane@gmail.com'


);

INSERT INTO users(username, pwd, email)
VALUES(

'Adam',
'010',
'adam@gmail.com'


);
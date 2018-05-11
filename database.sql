/*****************************************
* Create Jesse Final Project
*****************************************/

USE jk488;  


CREATE TABLE activities (
  activityID       INT(11)			NOT NULL   AUTO_INCREMENT,
  activityName     VARCHAR(255)		NOT NULL,
  activityStart    DATE				NOT NULL,
  activityDue      DATE				NOT NULL,
  activityStatus   BOOLEAN			NOT NULL,
  PRIMARY KEY (activityID)
);

INSERT INTO activities VALUES
(1, 'i need to sleep', '2018-05-10', '2018-05-15', FALSE);




Prompt ******  Creating USERS table ....

CREATE TABLE users
    ( user_id NUMBER(10) PRIMARY KEY
    , first_name VARCHAR2(20)
    , last_name  VARCHAR2(25) NOT NULL
    , email      VARCHAR2(25) NOT NULL
    , mobile_number   VARCHAR2(10)  
    , password     VARCHAR2(20)
    , date_of_birth DATE
    ) ;

CREATE SEQUENCE uid_sequence;

INSERT INTO USERS VALUES (0, 'admin', ' ', 'admin@gmail.com', '9876543210', 'admin', '04-JAN-2000');

CREATE OR REPLACE TRIGGER auto_increment_uid
BEFORE INSERT ON users
  FOR EACH ROW
 BEGIN
 SELECT uid_sequence.nextval
  INTO :new.user_id
  FROM dual;
 END;

Prompt ******  Creating DRIVERS table ....

CREATE TABLE drivers
    ( driver_id NUMBER(10)  PRIMARY KEY
    , first_name  VARCHAR2(30)
    , last_name  VARCHAR2(30)
    , mobile_number       NUMBER(10)
    , hire_date      DATE
    ) ;

Prompt ******  Creating ROUTES table ....

CREATE TABLE routes
    ( route_id    NUMBER(10) PRIMARY KEY
    , source VARCHAR2(15)
    , destination    VARCHAR2(15)
    , fare    NUMBER(10)
    ) ;



Prompt ******  Creating BUSES table ....

CREATE TABLE buses
    ( bus_id         NUMBER(10) primary key
    , driver_id     NUMBER(10) REFERENCES drivers
    , bus_no     varchar2(12)
    , company      VARCHAR2(35)
    , capacity     NUMBER(3)
    ) ;


Prompt ******  Creating TICKETS table ....

CREATE TABLE tickets
    ( ticket_id    NUMBER(10) PRIMARY KEY
    , user_id    NUMBER(10) REFERENCES users
    , passenger_name     VARCHAR2(35)
    , passenger_email    VARCHAR(75)
    , route_id    NUMBER(10) REFERENCES routes
    , type_of_ticket VARCHAR2(15)
    , bus_id  NUMBER(10) REFERENCES buses
    );

CREATE SEQUENCE tid_sequence;
INSERT INTO tickets VALUES (0, 0, 'admin ','admin@gmail.com', 102, 'Sleeper', 10000001);
CREATE OR REPLACE TRIGGER auto_increment_tid
BEFORE INSERT ON tickets
  FOR EACH ROW
 BEGIN
 SELECT tid_sequence.nextval
  INTO :new.ticket_id
  FROM dual;
 END;
/   
Prompt ******  Creating USERS table ....

CREATE TABLE users
    ( user_id NUMBER(10) PRIMARY KEY
    , first_name VARCHAR2(20)
    , last_name  VARCHAR2(25) NOT NULL
    , email      VARCHAR2(25) NOT NULL
    , mobile_number   VARCHAR2(10)
    , username     VARCHAR2(20)    
    , password     VARCHAR2(20)
    , date_of_birth DATE
    ) ;

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
    , passenger_name     VARCHAR2(20)
    , route_id    NUMBER(10) REFERENCES routes
    , type_of_ticket VARCHAR2(5)
    , price  NUMBER(8)
    , bus_id  NUMBER(10) REFERENCES buses
    );

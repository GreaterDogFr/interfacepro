DROP DATABASE ecochallenge;
CREATE DATABASE IF NOT EXISTS ecochallenge;
USE ecochallenge;
CREATE TABLE IF NOT EXISTS ENTERPRISE__ENT(
   ENT_ID INT AUTO_INCREMENT NOT NULL,
   ENT_NAME VARCHAR(50) NOT NULL,
   ENT_PASS VARCHAR(255) NOT NULL,
   ENT_SIRET BIGINT NOT NULL,
   ENT_MAIL VARCHAR(50) NOT NULL,
   ENT_ADR VARCHAR(255) NOT NULL,
   ENT_ZIP INT NOT NULL,
   ENT_TOWN VARCHAR(50) NOT NULL,
   ENT_PIC VARCHAR(50),
   PRIMARY KEY(ENT_ID),
   UNIQUE(ENT_SIRET)
);

CREATE TABLE IF NOT EXISTS  EVENT__EVT(
   EVT_ID INT AUTO_INCREMENT NOT NULL,
   EVT_START DATETIME NOT NULL,
   EVT_END DATETIME NOT NULL,
   EVT_NAME VARCHAR(50) NOT NULL,
   EVT_DSC VARCHAR(50) NOT NULL,
   EVT_TRA VARCHAR(50) NOT NULL,
   EVT_PIC VARCHAR(50),
   ENT_ID INT NOT NULL,
   PRIMARY KEY(EVT_ID),
   FOREIGN KEY(ENT_ID) REFERENCES ENTERPRISE__ENT(ENT_ID) 
);

CREATE TABLE IF NOT EXISTS  ADMIN__ADM(
   ADM_ID INT AUTO_INCREMENT,
   ADM_MAIL VARCHAR(50) NOT NULL,
   ADM_PASS VARCHAR(255) NOT NULL,
   PRIMARY KEY(ADM_ID)
);

CREATE TABLE IF NOT EXISTS  TRANSPORTATION__TRA(
   TRA_ID INT AUTO_INCREMENT,
   TRA_NAME VARCHAR(50) NOT NULL,
   PRIMARY KEY(TRA_ID)
);

CREATE TABLE IF NOT EXISTS  USER__USR(
   USR_ID INT AUTO_INCREMENT,
   USR_FNAME VARCHAR(50) NOT NULL,
   USR_LNAME VARCHAR(50) NOT NULL,
   USR_UNAME VARCHAR(50) NOT NULL,
   USR_BDAY DATE NOT NULL,
   USR_MAIL VARCHAR(50) NOT NULL,
   USR_PASS VARCHAR(255) NOT NULL,
   USR_PIC VARCHAR(50),
   USR_DSC VARCHAR(50),
   USR_VALID BOOLEAN NOT NULL,
   ENT_ID INT NOT NULL,
   PRIMARY KEY(USR_ID),
   UNIQUE(USR_UNAME),
   UNIQUE(USR_MAIL),	
   FOREIGN KEY(ENT_ID) REFERENCES ENTERPRISE__ENT(ENT_ID)
);

CREATE TABLE IF NOT EXISTS TRAVELS__TVL(
   TVL_ID INT AUTO_INCREMENT,
   TVL_DATE DATE NOT NULL,
   TVL_DISTANCE DECIMAL(10,2) NOT NULL,
   TVL_TIME TIME NOT NULL,
   TVL_PIC VARCHAR(50),
   TRA_ID INT NOT NULL,
   USR_ID INT NOT NULL,
   PRIMARY KEY(TVL_ID),
   FOREIGN KEY(TRA_ID) REFERENCES TRANSPORTATION__TRA(TRA_ID),
   FOREIGN KEY(USR_ID) REFERENCES USER__USR(USR_ID)
);

CREATE TABLE IF NOT EXISTS TRAVELSTRANSPORTATION__TVLTRA(
   EVT_ID INT,
   TRA_ID INT,
   PRIMARY KEY(EVT_ID, TRA_ID),
   FOREIGN KEY(EVT_ID) REFERENCES EVENT__EVT(EVT_ID),
   FOREIGN KEY(TRA_ID) REFERENCES TRANSPORTATION__TRA(TRA_ID)
);

INSERT INTO ENTERPRISE__ENT (ENT_NAME,ENT_MAIL,ENT_PASS,ENT_SIRET,ENT_ADR,ENT_ZIP,ENT_TOWN)
VALUES ('GoFast','fakemail@gmail.com','illegalBusiness',77408201000034, '12 cité de la chaumière',56240,'Plouay'),
('Procrastination.Inc','anothermail@gmail.com','JustDoIt',1234567820001,'5 Allée de Richelieu',33487,'Valence');

INSERT INTO EVENT__EVT(EVT_START,EVT_END,EVT_NAME,EVT_DSC,EVT_TRA, ENT_ID)
VALUES ('2024-01-15 00:00:00', '2024-01-22 00:00:00','Se déplacer en vélo','Venez au travail en vélo','Velo, Marche',1);

INSERT INTO TRANSPORTATION__TRA (TRA_NAME)
VALUES ('Vélo'),
('A pied'),
('Bus/métro'),
('Covoiturage'),
('Voiture');

INSERT INTO TRAVELSTRANSPORTATION__TVLTRA (EVT_ID,TRA_ID)
VALUES (1, 1),
(1,2);

 INSERT INTO ADMIN__ADM (ADM_MAIL,ADM_PASS)
 VALUES ('blaze.wilderm@hotmail.com','Ethi5umahg');

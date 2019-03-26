CREATE TABLE profileC ( 
    idUser INT(100) NOT NULL AUTO_INCREMENT ,
    idAct INT(10) ,
    emailUser varchar(255) , 
    phoneNum varchar(100) ,
    lastName varchar(100) , 
    firstName varchar(100) ,
    canton varchar(50) ,
    ville  varchar(50) ,
    permiTra varchar(1) ,
    permiCo varchar(1) ,
    photo varchar(255) ,
    cvPdf varchar(255) ,
    vedioT varchar(255) ,
    PRIMARY KEY (idUser) ,
    FOREIGN KEY (idAct) REFERENCES activite(id)
); 
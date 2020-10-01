CREATE DATABASE db_login;

CREATE TABLE guru(
    nip VARCHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    sandi VARCHAR(50),
    level INT
);

CREATE TABLE siswa(
    nis VARCHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    sandi VARCHAR(50)
);

-- Add Dummy Data
INSERT INTO guru (nip,nama,sandi,LEVEL) VALUES
('19860926','Budi',MD5('smksabi123'),'1'),
('19860927','Mahendra',MD5('smksabi123'),'2');

INSERT INTO siswa (niS,nama,sandi) VALUES
('1908007','Ipan',MD5('mautauajal0')),
('1908006','Onad',MD5('mautauajal0'));
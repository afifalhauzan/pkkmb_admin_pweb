-- DROP DATABASE pkkmb;
-- CREATE DATABASE pkkmb;
-- USE pkkmb;

-- -- Table QC
-- CREATE TABLE QC (
--     NIM VARCHAR(15) NOT NULL PRIMARY KEY,
--     Nama VARCHAR(45) NOT NULL,
--     Prodi VARCHAR(45) NOT NULL,
--     Email VARCHAR(45) NOT NULL
-- );

-- -- Table PIT
-- CREATE TABLE PIT (
--     NIM VARCHAR(15) NOT NULL PRIMARY KEY,
--     Nama VARCHAR(45) NOT NULL,
--     Prodi VARCHAR(45) NOT NULL,
--     Email VARCHAR(45) NOT NULL
-- );

-- -- Table Cluster
-- CREATE TABLE Cluster (
--     Cluster_ID INT NOT NULL PRIMARY KEY,
--     NIM VARCHAR(15),
--     FOREIGN KEY (NIM) REFERENCES QC(NIM)
-- );

-- -- Table Kegiatan
-- CREATE TABLE Kegiatan (
--     ID_Kegiatan INT NOT NULL PRIMARY KEY,
--     PIT_NIM VARCHAR(15),
--     Nama VARCHAR(45),
--     Tahun VARCHAR(45),
--     FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM)
-- );


-- -- Table Mahasiswa
-- CREATE TABLE Mahasiswa (
--     NIM VARCHAR(15) NOT NULL PRIMARY KEY,
--     QC_NIM VARCHAR(15),
--     Cluster_ID INT,
--     Nama VARCHAR(45),
--     Prodi VARCHAR(45),
--     Email VARCHAR(45),
--     FOREIGN KEY (QC_NIM) REFERENCES QC(NIM),
--     FOREIGN KEY (Cluster_ID) REFERENCES Cluster(Cluster_ID) ON DELETE SET NULL
-- );

-- -- Table Tugas
-- CREATE TABLE Tugas (
--     Kode_Tugas INT AUTO_INCREMENT PRIMARY KEY,
--     QC_NIM VARCHAR(15),
--     PIT_NIM VARCHAR(15),
--     Mahasiswa_NIM VARCHAR(15),
--     Deskripsi TEXT,
--     File_Tugas TEXT, -- Menyimpan lokasi file tugas
--     Nilai INT DEFAULT NULL, -- Nilai awal NULL, di-update oleh QC atau PIT
--     FOREIGN KEY (QC_NIM) REFERENCES QC(NIM),
--     FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM),
--     FOREIGN KEY (Mahasiswa_NIM) REFERENCES Mahasiswa(NIM)
-- );


-- -- Table Presensi
-- CREATE TABLE Presensi (
-- 	ID int auto_increment primary key,
--     Kode_Presensi VARCHAR(15),
--     PIT_NIM VARCHAR(15),
--     Mahasiswa_NIM VARCHAR(15),
--     Kegiatan_ID INT NOT NULL,
--     Waktu_Presensi DATETIME NOT NULL,
--     FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM),
--     FOREIGN KEY (Mahasiswa_NIM) REFERENCES Mahasiswa(NIM),
--     FOREIGN KEY (Kegiatan_ID) REFERENCES Kegiatan(ID_Kegiatan)
-- );


-- V2
-- DROP DATABASE IF EXISTS pkkmb_migrate;
CREATE DATABASE pkkmb_migrate;
USE pkkmb_migrate;

-- Table QC
CREATE TABLE QC (
    NIM VARCHAR(15) NOT NULL PRIMARY KEY,
    Nama VARCHAR(45) NOT NULL,
    Prodi VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL
);

-- Table PIT
CREATE TABLE PIT (
    NIM VARCHAR(15) NOT NULL PRIMARY KEY,
    Nama VARCHAR(45) NOT NULL,
    Prodi VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL
);

-- Table Cluster
CREATE TABLE Cluster (
    Cluster_ID INT NOT NULL PRIMARY KEY,
    QC_NIM VARCHAR(15),
    FOREIGN KEY (QC_NIM) REFERENCES QC(NIM)
);

-- Table Kegiatan
CREATE TABLE Kegiatan (
    ID_Kegiatan INT NOT NULL PRIMARY KEY,
    PIT_NIM VARCHAR(15),
    Nama VARCHAR(45),
    Tahun VARCHAR(45),
    FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM)
);

-- Table Mahasiswa
CREATE TABLE Mahasiswa (
    NIM VARCHAR(15) NOT NULL PRIMARY KEY,
    QC_NIM VARCHAR(15),
    Cluster_ID INT,
    Nama VARCHAR(45),
    Prodi VARCHAR(45),
    Email VARCHAR(45),
    FOREIGN KEY (QC_NIM) REFERENCES QC(NIM),
    FOREIGN KEY (Cluster_ID) REFERENCES Cluster(Cluster_ID) ON DELETE SET NULL
);

-- New Table Valid_Tugas
CREATE TABLE Valid_Tugas (
    ID_Tugas INT AUTO_INCREMENT PRIMARY KEY,
    Judul VARCHAR(255) NOT NULL,
    Deskripsi TEXT,
    QC_NIM VARCHAR(15), -- Tugas dibuat oleh QC
    PIT_NIM VARCHAR(15), -- Atau oleh PIT
    FOREIGN KEY (QC_NIM) REFERENCES QC(NIM),
    FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM)
);

-- Updated Table Tugas
CREATE TABLE Tugas (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Mahasiswa_NIM VARCHAR(15), -- Mahasiswa yang mengerjakan tugas
    ID_Tugas INT, -- Referensi ke tugas default
    File_Tugas TEXT, -- Menyimpan lokasi file tugas
    Nilai INT DEFAULT NULL, -- Nilai awal NULL
    FOREIGN KEY (Mahasiswa_NIM) REFERENCES Mahasiswa(NIM),
    FOREIGN KEY (ID_Tugas) REFERENCES Valid_Tugas(ID_Tugas)
);


-- New Table Valid_Presensi
CREATE TABLE Valid_Presensi (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Kode_Presensi VARCHAR(15) NOT NULL UNIQUE, -- The valid presensi code
    Kegiatan_ID INT NOT NULL, -- The related activity
    Description VARCHAR(100), -- Optional: Describe the purpose of the code
    FOREIGN KEY (Kegiatan_ID) REFERENCES Kegiatan(ID_Kegiatan) ON DELETE CASCADE
);

-- Updated Table Presensi
CREATE TABLE Presensi (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Kode_Presensi VARCHAR(15) NOT NULL, -- Must match a valid code
    PIT_NIM VARCHAR(15),
    Mahasiswa_NIM VARCHAR(15),
    Kegiatan_ID INT NOT NULL,
    Waktu_Presensi DATETIME NOT NULL,
    FOREIGN KEY (Kode_Presensi) REFERENCES Valid_Presensi(Kode_Presensi),
    FOREIGN KEY (PIT_NIM) REFERENCES PIT(NIM),
    FOREIGN KEY (Mahasiswa_NIM) REFERENCES Mahasiswa(NIM),
    FOREIGN KEY (Kegiatan_ID) REFERENCES Kegiatan(ID_Kegiatan)
);

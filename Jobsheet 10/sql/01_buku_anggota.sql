CREATE TABLE IF NOT EXISTS buku (
  id SERIAL PRIMARY KEY,
  judul VARCHAR(225) NOT NULL,
  pengarang VARCHAR(225) NOT NULL,
  tahun integer not null,
  isbn varchar(50),
  stok integer not null default 0,
  kategori varchar(50)
);

create table if not exists anggota (
  id serial primary key,
  nama varchar(225) not null,
  no_anggota varchar(50) not null unique,
  alamat varchar(225),
  no_hp varchar(30)
);
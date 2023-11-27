# jurnal_kelas
Materi Pembelajaran Matakuliah Pemrograman Web II Tahun Ajaran 2023-2024 Ganjil

absen
---------
absen_id    int(9) primary_key auto_increment
tanggal     date
mahasiswa_id    int(9) foreign key
dosen_id    int(9) foreign key
keterangan('hadir','izin','sakit') default('hadir')
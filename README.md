# TP3DPBO2023C1
### Janji
> Saya Amida Zulfa Laila dengan NIM 2101147 mengerjakan Tugas Praktikum 3 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

### Requirements Soal
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel

### Desain Program
Terdapat 3 tabel yaitu tabel penyanyi, genre, dan musik.
- Tabel penyanyi :
  - id_penyanyi
  - nama_penyanyi
- Tabel genre :
  - id_genre
  - nama_genre
- Tabel musik :
  - id_musik
  - judul
  - tahun_rilis
  - durasi
  - id_genre
  - id_penyanyi

Tabel musik berelasi dengan tabel penyanyi dan tabel genre

<img width="550" alt="image" src="https://github.com/amizulfa/TP3DPBO2023C1/assets/100895165/819a7b67-788b-4c3a-b84b-f96d36ee3dd8">

### Alur Program
- User dapat melakukan searching data dengan memasukan ```keyword ``` berupa ```judul lagu``` pada search field, lalu mengklik button ```cari```.
- User dapat melakukan pengurutan data dengan mengklik button ```Filter```, setelah itu memilih akan diurutkan berdasarkan apa, misalnya mengklik ```Judul-asc``` yang berarti akan diurutkan berdasarkan judul dan secara ascending.
- MUSIK
  - User dapat melihat daftar musik di menu ```home``` yang berupa list card.
  - User dapat menambahkan musik dengan cara menekan button ```add musik``` pada navbar.
  - User dapat melihat ```detail musik``` dengan menekan card dari musik yang akan dilihat. Lalu akan menampilkan detail musik.
  - User dapat ```mengupdate``` musik dengan cara mengklik card musik yang akan diupdate, lalu akan menampilkan detail musik, setelah itu dapat mengklik button ```ubah data``` lalu akan menampilkan form update data musik.
  - User juga dapat ```menghapus``` data pada saat detail musik ditampilkan dengan menekan button ````hapus data```.
- PENYANYI
  -   User dapat melihat daftar penyanyi berupa tabel yang ada di menu ```penyanyi``` pada navbar.
  -   User dapat melakukan ```tambah data``` penyanyi dengan melakukan pengisian form yang berada di samping tabel.
  -   User dapat melakukan ```update data``` penyanyi dengan menekan button ```update``` pada kolom action.
  -   User dapat melakukan ```delete data``` penyanyi dengan menekan button ```delete``` pada kolom action.
- GENRE
  -   User dapat melihat daftar genre berupa tabel yang ada di menu ```genre``` pada navbar.  
  -   User dapat melakukan ```tambah data``` genre dengan melakukan pengisinan form yang berada di samping tabel.
  -   User dapat melakukan ```update data``` genre dengan menekan button ```update``` pada kolom action..
  -   User dapat melakukan ```delete data``` genre dengan menekan button ```delete``` pada kolom action..

### Dokumentasi
- CRUD PENYANYI
<p align="center">
  <img src="https://github.com/amizulfa/TP3DPBO2023C1/blob/ce877e19b355107f87a11e54d2a8ad842c9adc23/screenshoot/crudpenyanyi.gif" alt="gif format testing"/>
</p>

- CRUD GENRE
<p align="center">
  <img src="https://github.com/amizulfa/TP3DPBO2023C1/blob/ce877e19b355107f87a11e54d2a8ad842c9adc23/screenshoot/crudgenre.gif" alt="gif format testing"/>
</p>

- CRUD MUSIK
<p align="center">
  <img src="https://github.com/amizulfa/TP3DPBO2023C1/blob/ce877e19b355107f87a11e54d2a8ad842c9adc23/screenshoot/crudmusik.gif" alt="gif format testing"/>
</p>

- FILTER & SEARCHING
<p align="center">
  <img src="https://github.com/amizulfa/TP3DPBO2023C1/blob/ce877e19b355107f87a11e54d2a8ad842c9adc23/screenshoot/filter&searching.gif" alt="gif format testing"/>
</p>

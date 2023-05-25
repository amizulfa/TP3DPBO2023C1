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
<img width="550" alt="image" src="https://github.com/amizulfa/TP3DPBO2023C1/assets/100895165/819a7b67-788b-4c3a-b84b-f96d36ee3dd8">

### Alur Program
- User dapat melakukan searching data dengan memasukan ```keyword ``` berupa ```judul lagu``` pada search field, lalu mengklik button ```cari```.
- User dapat melakukan pengurutan data dengan mengklik button ```Filter```, setelah itu memilih akan diurutkan berdasarkan apa, misalnya mengklik ```Judul-asc``` yang berarti akan diurutkan berdasarkan judul dan secara ascending.
- MUSIK
  - User dapat melihat daftar musik di menu ```home``` berupa card.
  - User dapat menambahkan musik dengan cara menekan button ```add musik``` pada navbar.
  - User dapat melihat ```detail musik``` dengan menekan card dari musik yang akan dilihat. Maka akan menampilkan detail musik.
  - User dapat ```mengupdate``` musik dengan cara mengklik card musik yang akan diupdate, lalu akan menampilkan detail musik, setelah itu dapat mengklik button ```update``` dan akan menampilkan form update data musik.
  - User juga dapat ```menghapus``` data pada saat detail musik ditampilkan dengan menekan button ````hapus```.
- PENYANYI
  -   User dapat melihat daftar penyanyi berupa tabel yang ada di menu ```penyanyi``` pada navbar.
  -   User dapat melakukan ```tambah data``` penyanyi dengan melakukan pengisian form yang berada di samping tabel.
  -   User dapat melakukan ```update data``` penyanyi dengan menekan button ```update```.
  -   User dapat melakukan ```delete data``` penyanyi dengan menekan button ```delete```.
- GENRE
  -   User dapat melihat daftar genre berupa tabel yang ada di menu ```genre``` pada navbar.  
  -   User dapat melakukan ```tambah data``` genre dengan melakukan pengisinan form yang berada di samping tabel.
  -   User dapat melakukan ```update data``` genre dengan menekan button ```update```.
  -   User dapat melakukan ```delete data``` genre dengan menekan button ```delete```.

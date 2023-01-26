# Konsep Aplikasi

## Part 1

pada form permintaan barang ada dua jenis pilihan yaitu :
Barang mentah (BMM.tanggal.nomor) : tanggal, nama, kategori, ukuran, jumlah, keterangan
Barang Jadi (BSJ.tanggal.nomor): tanggal, nama, kategori,

produksi membuat permintaan barang
gudang melakukan persetujuan atau approval atas permintaan barang dari produksi

## Format Data

Barang mentah -> kayu 1 -> kayu 2

Barang jadi   -> sofa -> meja

Barang mentah -> kayu 1 -> kayu 2

Barang jadi   -> sofa -> meja

Barang mentah -> kayu 1 -> kayu 2

Barang jadi   -> sofa -> meja

## Part 2

### Penambahan konsep form input permintaan (Request)

produksi
: jml permintaan (qty_req) adalah jumlah barang yang sesuai dengan jumlah stok barang yang tersedia (qty) jika permintaan lebih stok (qty) maka sisanya dimasukkan ke jml konfirmasi (qty_confir).
form input permintaan otomatis melakukan pemisahan antara permintaan dan konfirmasi jika barang lebih dari stok.

### Contoh Timline Barang

Timeline Barang
12-01-2023
total 15
permintaan 10
terkirim 0
konfirmasi 5
batal 0

14-01-2023
total 15
permintaan 5
terkirim 5
konfirmasi 5
batal 0

16-01-2023
total 15
permintaan 0
terkirim 10
konfirmasi 5
batal 0

18-01-2023
total 15
permintaan 0
terkirim 13
konfirmasi 0
batal 2

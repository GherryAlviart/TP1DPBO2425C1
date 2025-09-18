# TP1DPBO2425C1
Saya Gherry Alviart dengan NIM 2408614 mengerjakan Tugas Praktikum 1 dalam
mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan.

# Desain Program
Tugas ini mengimplementasikan konsep Object-Oriented Programming (OOP) dan enkapsulasi dalam pengelolaan data sebuah Toko Elektronik.
Project dibuat dalam 4 bahasa pemrograman (C++, Java, Python, PHP).

Dalam program ini terdapat 1 class yaitu "ElectronicStore" dan memiliki 7 atribut yaitu : 
1. ProductID
2. Category
3. Brand
4. Type
5. Price
6. Stock
7. WarrantyYears

Program ini dirancang untuk membantu pengguna dalam mengelola data toko elektronik.
Fitur yang tersedia antara lain:
* Add Product → Tambah produk baru (dengan validasi duplikat ID).
* Display All Products → Menampilkan semua produk dalam array.
* Update Product by ID → Mengubah data produk berdasarkan ID.
* Delete Product by ID → Menghapus produk dengan ID.
* Search Product by ID → Mencari dan menampilkan detail produk berdasarkan ID.

# Alur Program
1. Inisialisasi Program
    * Array productList[100] disiapkan untuk menyimpan maksimal 100 objek ElectronicStore.
    * Variabel productCount dipakai untuk menghitung jumlah produk yang tersimpan.

2. Tampilan Menu Utama

* Program menampilkan menu interaktif dengan pilihan:
    * Tambah Produk
    * Tampilkan Semua Produk
    * Update Produk (berdasarkan ID)
    * Hapus Produk (berdasarkan ID)
    * Cari Produk (berdasarkan ID)
    * Keluar

3. Proses Berdasarkan Pilihan User

* [1] Add Product
    * User memasukkan ID produk.
    * Program cek apakah ID sudah ada → kalau duplikat, tampilkan error.
    * Kalau tidak duplikat → user isi detail produk (Category, Brand, Type, Price, Stock, Warranty).
    * Produk baru disimpan ke productList, lalu productCount bertambah.

* [2] Display All Products
    * Kalau productCount == 0, tampilkan pesan “No products in the store yet”.
    * Kalau ada → tampilkan detail semua produk dengan displayProductDetails().

* [3] Update Product by ID
    * User memasukkan ID.
    * Program mencari produk dengan ID tersebut.
    * Kalau ditemukan → user isi data baru (Category, Brand, Type, Price, Stock).
    * Setter dipanggil untuk update atribut produk.
    * Kalau ID tidak ditemukan → tampilkan pesan error.

* [4] Delete Product by ID
    * User memasukkan ID.
    * Program mencari produk dengan ID tersebut.
    * Kalau ditemukan → produk dihapus dengan cara menggeser elemen array ke kiri.
    * productCount dikurangi 1.
    * Kalau ID tidak ditemukan → tampilkan pesan error.

* [5] Search Product by ID
    * User memasukkan ID.
    * Program mencari produk dengan ID tersebut.
    * Kalau ketemu → tampilkan detail produk.
    * Kalau tidak ada → tampilkan pesan error.

* [0] Exit
    * Program berhenti dengan pesan “Exiting program. Goodbye!”

## Tampilan Menu Utama
### C++
![menu utama C++.](/Dokumentasi/C++/menu_utama.png)
### JAVA
![menu utama java.](/Dokumentasi/JAVA/menu_utama.png)
### PYTHON
![menu utama python.](/Dokumentasi/PYTHON/menu_utama.png)
### PHP
![menu utama PHP.](/Dokumentasi/PHP/menu_utama.png)

## Add Product (CREATE)
### C++
![Create C++.](/Dokumentasi/C++/create.png)
### JAVA
![Create java.](/Dokumentasi/JAVA/create.png)
### PYTHON
![Create python.](/Dokumentasi/PYTHON/create.png)
### PHP
![Create PHP.](/Dokumentasi/PHP/create.png)

## Display All Products
### C++
![all product C++.](/Dokumentasi/C++/all_product.png)
### JAVA
![all product java.](/Dokumentasi/JAVA/all_product.png)
### PYTHON
![all product python.](/Dokumentasi/PYTHON/all_product.png)
### PHP
![all product PHP.](/Dokumentasi/PHP/all_product.png)

## Update Product
### C++
![update C++.](/Dokumentasi/C++/update.png)
### JAVA
![update java.](/Dokumentasi/JAVA/update.png)
### PYTHON
![update python.](/Dokumentasi/PYTHON/update.png)
### PHP
![update PHP.](/Dokumentasi/PHP/update.png)

## Delete Product
### C++
![delete C++.](/Dokumentasi/C++/delete.png)
### JAVA
![delete java.](/Dokumentasi/JAVA/delete.png)
### PYTHON
![delete python.](/Dokumentasi/PYTHON/delete.png)
### PHP
![delete PHP.](/Dokumentasi/PHP/delete.png)

## Search Product
### C++
![search C++.](/Dokumentasi/C++/search.png)
### JAVA
![search java.](/Dokumentasi/JAVA/search.png)
### PYTHON
![search python.](/Dokumentasi/PYTHON/search.png)
### PHP
![search PHP.](/Dokumentasi/PHP/search.png)

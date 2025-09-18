#include <iostream>
#include <string>
#include "ElectronicStore.cpp"

using namespace std;

int main() {
    // array untuk menampung maksimal 100 produk
    ElectronicStore productList[100];
    // penghitung berapa banyak produk yang sudah disimpan
    int productCount = 0; 
    // variabel menu pilihan user
    int choice = -1;

    // loop utama program, jalan terus sampai user pilih 0 (exit)
    while (choice != 0) {
        cout << "\n--- Electronics Store Menu ---" << endl;
        cout << "1. Add Product" << endl;
        cout << "2. Display All Products" << endl;
        cout << "3. Update Product by ID" << endl;
        cout << "4. Delete Product by ID" << endl;
        cout << "5. Search Product by ID" << endl;
        cout << "0. Exit" << endl;
        cout << "Enter your choice: ";
        cin >> choice;
        cin.ignore(); // buang newline biar input string aman

        // CASE 1: tambah produk baru 
        if (choice == 1) {
            // cek apakah storage penuh atau belum
            if (productCount < 100) {
                string id;
                cout << "Enter ID: ";
                getline(cin, id);

                bool isDuplicate = false;
                // loop untuk mengecek setiap produk yang sudah ada
                for (int i = 0; i < productCount; i++){
                    if (productList[i].getProductID() == id) {
                        isDuplicate = true; // kalau ketemu ID sama tandai
                    }
                }

                // jika ID adalah duplikat, tampilkan error
                if (isDuplicate){
                    cout << "Error: Product ID '" << id << "' already exists." << endl;
                } else {
                    // kalau ID aman, minta input detail produk / lanjutkan 
                    string category, brand, type;
                    long price;
                    int stock, warranty;

                    cout << "Enter Category: "; getline(cin, category);
                    cout << "Enter Brand: "; getline(cin, brand);
                    cout << "Enter Type: "; getline(cin, type);
                    cout << "Enter Price: "; cin >> price;
                    cout << "Enter Stock: "; cin >> stock;
                    cout << "Enter Warranty (years): "; cin >> warranty;
                    cin.ignore(); // buang newline setelah input angka

                    // simpan produk ke array
                    productList[productCount] = ElectronicStore(id, category, brand, type, price, stock, warranty);
                    productCount++;
                    cout << "Product added successfully!" << endl;
                } 
            } else {
                cout << "Sorry, the storage is full." << endl;
            }

        // CASE 2: tampilkan semua produk
        } else if (choice == 2) {
            cout << "\n--- All Products ---" << endl;
            if (productCount == 0) {
                cout << "No products in the store yet." << endl;
            } else {
                // tampilkan semua data produk yang sudah ada
                for (int i = 0; i < productCount; i++) {
                    productList[i].displayProductDetails();
                    cout << "--------------------" << endl;
                }
            }

        // CASE 3: update produk berdasarkan ID
        } else if (choice == 3) {
            string id;
            cout << "Enter ID of product to update: ";
            getline(cin, id);
            bool found = false;

            // cari produk yang sesuai dengan ID
            for (int i = 0; i < productCount; i++) {
                if (productList[i].getProductID() == id && !found) {
                    // minta input data baru
                    string newCategory, newBrand, newType;
                    long newPrice;
                    int newStock;

                    cout << "Enter New Category: "; getline(cin, newCategory);
                    cout << "Enter New Brand: "; getline(cin, newBrand);
                    cout << "Enter New Type: "; getline(cin, newType);
                    cout << "Enter New Price: "; cin >> newPrice;
                    cout << "Enter New Stock: "; cin >> newStock;
                    cin.ignore();

                    // update produk pakai setter
                    productList[i].setCategory(newCategory);
                    productList[i].setBrand(newBrand);
                    productList[i].setType(newType);
                    productList[i].setPrice(newPrice);
                    productList[i].setStock(newStock);

                    cout << "Product updated successfully!" << endl;
                    found = true; // tandai sudah diupdate
                }
            }
            // kalau ID tidak ditemukan
            if (!found) {
                cout << "Product with ID " << id << " not found." << endl;
            }

        // CASE 4: hapus produk berdasarkan ID
        } else if (choice == 4) {
            string id;
            cout << "Enter ID of product to delete: ";
            getline(cin, id);
            int indexToDelete = -1;

            // cari index produk dengan ID yang dimasukkan
            for (int i = 0; i < productCount; i++) {
                if (productList[i].getProductID() == id && indexToDelete == -1) {
                    indexToDelete = i;
                }
            }

            // kalau ketemu, geser semua elemen setelahnya ke kiri (biar lubang kosong ketutup)
            if (indexToDelete != -1) {
                for (int i = indexToDelete; i < productCount - 1; i++) {
                    productList[i] = productList[i + 1];
                }
                productCount--;
                cout << "Product deleted successfully!" << endl;
            } else {
                // kalo ID ngga ketemu
                cout << "Product with ID " << id << " not found." << endl;
            }

        // CASE 5: cari produk berdasarkan ID
        } else if (choice == 5) {
            string id;
            cout << "Enter ID of product to search: ";
            getline(cin, id);
            bool found = false;

            // loop cari produk sesuai ID
            for (int i = 0; i < productCount; i++) {
                if (productList[i].getProductID() == id && !found) {
                    cout << "\n--- Product Found ---" << endl;
                    productList[i].displayProductDetails();
                    found = true;
                }
            }

            // kalo ngga ketemu
            if (!found) {
                cout << "Product with ID " << id << " not found." << endl;
            }
        }
    }
    // keluar dari program
    cout << "Exiting program. Goodbye!" << endl;
    return 0;
}

import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        // array untuk menampung maksimal 100 produk
        ElectronicStore[] productList = new ElectronicStore[100];
        // penghitung berapa banyak produk yang sudah disimpan
        int productCount = 0;
        // variabel menu pilihan user
        int choice = -1;
        Scanner sc = new Scanner(System.in);

        // loop utama program, jalan terus sampai user pilih 0 (exit)
        while (choice != 0) {
            System.out.println("\n--- Electronics Store Menu ---");
            System.out.println("1. Add Product");
            System.out.println("2. Display All Products");
            System.out.println("3. Update Product by ID");
            System.out.println("4. Delete Product by ID");
            System.out.println("5. Search Product by ID");
            System.out.println("0. Exit");
            System.out.print("Enter your choice: ");
            choice = Integer.parseInt(sc.nextLine());

            // CASE 1: tambah produk baru
            if (choice == 1) {
                if (productCount < 100) {
                    System.out.print("Enter ID: ");
                    String id = sc.nextLine();

                    boolean isDuplicate = false;
                    // loop untuk mengecek setiap produk yang sudah ada
                    for (int i = 0; i < productCount; i++) {
                        if (productList[i].getProductID().equals(id)) {
                            isDuplicate = true; // kalau ketemu ID sama tandai
                        }
                    }

                    // jika ID adalah duplikat, tampilkan error
                    if (isDuplicate) {
                        System.out.println("Error: Product ID '" + id + "' already exists.");
                    } else {
                        // kalau ID aman, minta input detail produk / lanjutkan
                        System.out.print("Enter Category: ");
                        String category = sc.nextLine();
                        System.out.print("Enter Brand: ");
                        String brand = sc.nextLine();
                        System.out.print("Enter Type: ");
                        String type = sc.nextLine();
                        System.out.print("Enter Price: ");
                        long price = Long.parseLong(sc.nextLine());
                        System.out.print("Enter Stock: ");
                        int stock = Integer.parseInt(sc.nextLine());
                        System.out.print("Enter Warranty (years): ");
                        int warranty = Integer.parseInt(sc.nextLine());

                        // simpan produk ke array
                        productList[productCount] = new ElectronicStore(id, category, brand, type, price, stock, warranty);
                        productCount++;
                        System.out.println("Product added successfully!");
                    }
                } else {
                    System.out.println("Sorry, the storage is full.");
                }
            }

            // CASE 2: tampilkan semua produk
            else if (choice == 2) {
                if (productCount == 0) {
                    System.out.println("No products in the store yet.");
                } else {
                    // tampilkan semua data produk yang sudah ada
                    for (int i = 0; i < productCount; i++) {
                        productList[i].displayProductDetails();
                        System.out.println("--------------------");
                    }
                }
            }

            // CASE 3: update produk berdasarkan ID
            else if (choice == 3) {
                System.out.print("Enter ID of product to update: ");
                String id = sc.nextLine();
                boolean found = false;

                // cari produk yang sesuai dengan ID
                for (int i = 0; i < productCount; i++) {
                    if (productList[i].getProductID().equals(id)) {
                        // minta input data baru
                        System.out.print("Enter New Category: ");
                        String newCategory = sc.nextLine();
                        System.out.print("Enter New Brand: ");
                        String newBrand = sc.nextLine();
                        System.out.print("Enter New Type: ");
                        String newType = sc.nextLine();
                        System.out.print("Enter New Price: ");
                        long newPrice = Long.parseLong(sc.nextLine());
                        System.out.print("Enter New Stock: ");
                        int newStock = Integer.parseInt(sc.nextLine());

                        // update produk pakai setter
                        productList[i].setCategory(newCategory);
                        productList[i].setBrand(newBrand);
                        productList[i].setType(newType);
                        productList[i].setPrice(newPrice);
                        productList[i].setStock(newStock);

                        System.out.println("Product updated successfully!");
                        found = true; // tandai sudah diupdate
                        break;
                    }
                }
                // kalau ID tidak ditemukan
                if (!found) {
                    System.out.println("Product with ID " + id + " not found.");
                }
            }

            // CASE 4: hapus produk berdasarkan ID
            else if (choice == 4) {
                System.out.print("Enter ID of product to delete: ");
                String id = sc.nextLine();
                int indexToDelete = -1;

                // cari index produk dengan ID yang dimasukkan
                for (int i = 0; i < productCount; i++) {
                    if (productList[i].getProductID().equals(id)) {
                        indexToDelete = i;
                        break;
                    }
                }

                // kalau ketemu, geser semua elemen setelahnya ke kiri (biar lubang kosong ketutup)
                if (indexToDelete != -1) {
                    for (int i = indexToDelete; i < productCount - 1; i++) {
                        productList[i] = productList[i + 1];
                    }
                    productCount--;
                    System.out.println("Product deleted successfully!");
                } else {
                    // kalo ID ngga ketemu
                    System.out.println("Product with ID " + id + " not found.");
                }
            }

            // CASE 5: cari produk berdasarkan ID
            else if (choice == 5) {
                System.out.print("Enter ID of product to search: ");
                String id = sc.nextLine();
                boolean found = false;

                // loop cari produk sesuai ID
                for (int i = 0; i < productCount; i++) {
                    if (productList[i].getProductID().equals(id)) {
                        System.out.println("\n--- Product Found ---");
                        productList[i].displayProductDetails();
                        found = true;
                        break;
                    }
                }
                // kalo ngga ketemu
                if (!found) {
                    System.out.println("Product with ID " + id + " not found.");
                }
            }
        }
        // keluar dari program
        System.out.println("Exiting program. Goodbye!");
        sc.close();
    }
}

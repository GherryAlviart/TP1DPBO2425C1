# import class ElectronicStore dari file ElectronicStore.py
from ElectronicStore import ElectronicStore

# fungsi utama program
def main():
    # list untuk menampung maksimal 100 produk
    productList = [None] * 100
    # jumlah produk saat ini
    productCount = 0
    # variabel pilihan menu
    choice = -1

    # loop utama program, jalan terus sampai user pilih 0 (exit)
    while choice != 0:
        # tampilkan menu
        print("\n--- Electronics Store Menu ---")
        print("1. Add Product")
        print("2. Display All Products")
        print("3. Update Product by ID")
        print("4. Delete Product by ID")
        print("5. Search Product by ID")
        print("0. Exit")
        try:
            choice = int(input("Enter your choice: "))  # input pilihan user
        except:
            continue  # jika input invalid, ulangi loop

        # CASE 1: tambah produk baru
        if choice == 1:
            if productCount < 100:
                pid = input("Enter ID: ")
                # cek duplikasi ID
                duplicate = any(productList[i] and productList[i].getProductID() == pid for i in range(productCount))
                if duplicate:
                    print(f"Error: Product ID '{pid}' already exists.")
                else:
                    # input detail produk
                    category = input("Enter Category: ")
                    brand = input("Enter Brand: ")
                    type_ = input("Enter Type: ")
                    price = int(input("Enter Price: "))
                    stock = int(input("Enter Stock: "))
                    warranty = int(input("Enter Warranty (years): "))

                    # buat object dan simpan di list
                    productList[productCount] = ElectronicStore(pid, category, brand, type_, price, stock, warranty)
                    productCount += 1
                    print("Product added successfully!")
            else:
                print("Sorry, storage is full.")

        # CASE 2: tampilkan semua produk
        elif choice == 2:
            if productCount == 0:
                print("No products in the store yet.")
            else:
                # tampilkan semua data produk yang sudah ada
                for i in range(productCount):
                    productList[i].displayProductDetails()
                    print("--------------------")

        # CASE 3: update produk berdasarkan ID
        elif choice == 3:
            pid = input("Enter ID of product to update: ")
            found = False
            # cari produk sesuai ID
            for i in range(productCount):
                if productList[i].getProductID() == pid:
                    # input data baru
                    newCategory = input("Enter New Category: ")
                    newBrand = input("Enter New Brand: ")
                    newType = input("Enter New Type: ")
                    newPrice = int(input("Enter New Price: "))
                    newStock = int(input("Enter New Stock: "))

                    # update produk pakai setter
                    productList[i].setCategory(newCategory)
                    productList[i].setBrand(newBrand)
                    productList[i].setType(newType)
                    productList[i].setPrice(newPrice)
                    productList[i].setStock(newStock)

                    print("Product updated successfully!")
                    found = True
            # kalau ID tidak ditemukan
            if not found:
                print("Product not found.")

        # CASE 4: hapus produk berdasarkan ID
        elif choice == 4:
            pid = input("Enter ID of product to delete: ")
            indexToDelete = -1
            # cari index produk
            for i in range(productCount):
                if productList[i].getProductID() == pid:
                    indexToDelete = i
            if indexToDelete != -1:
                # geser semua produk setelahnya ke kiri
                for i in range(indexToDelete, productCount - 1):
                    productList[i] = productList[i+1]
                productList[productCount-1] = None
                productCount -= 1
                print("Product deleted successfully!")
            else:
                # kalau tidak ketemu
                print("Product not found.")

        # CASE 5: cari produk berdasarkan ID
        elif choice == 5:
            pid = input("Enter ID of product to search: ")
            found = False
            # loop cari produk sesuai ID
            for i in range(productCount):
                if productList[i].getProductID() == pid:
                    print("\n--- Product Found ---")
                    productList[i].displayProductDetails()
                    found = True
            # kalau tidak ketemu
            if not found:
                print("Product not found.")

    # keluar dari program
    print("Exiting program. Goodbye!")

# eksekusi program utama
if __name__ == "__main__":
    main()

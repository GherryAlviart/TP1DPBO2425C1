#include <iostream>
#include <string>

using namespace std;

class ElectronicStore {
// atribut yang bersifat rahasia
private:
    string productID;
    string category;   
    string brand;      
    string type;       
    long price;
    int stock;
    int warrantyYears;

public: 
    // constructor untuk inisialisasi atribut
    ElectronicStore(string id = "", string category = "", string brand = "", string type = "", long price = 0, int stock = 0, int wy=0){
        this->productID = id;
        this->category = category;
        this->brand = brand;
        this->type = type;
        this->price = price;
        this->stock = stock;
        this->warrantyYears = wy;
    }

    // getter untuk mengakses atribut
    string getProductID(){
        return productID;
    }

    // setter untuk mengubah atribut
    void setCategory(string category){
        this->category = category;
    }
    void setBrand(string brand){
        this->brand = brand;
    }
    void setType(string type){ 
        this->type = type; 
    }
    void setPrice(long price){
        this->price = price;
    }
    void setStock(int stock){
        this->stock = stock;
    }
   
    // method untuk menampilkan semua detail produk dengan rapi
    void displayProductDetails(){
        cout << " ID            : " << productID << endl;
        cout << " Category      : " << category << endl;
        cout << " Brand         : " << brand << endl;
        cout << " Type          : " << type << endl;
        cout << " Price         : Rp " << price << endl;
        cout << " Stock         : " << stock << " units" << endl;
        cout << " Warranty      : " << warrantyYears << " years" << endl;
    } 
};

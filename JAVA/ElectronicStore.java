// class produk elektronik
public class ElectronicStore {
    // atribut yang bersifat rahasia
    private String productID;
    private String category;
    private String brand;
    private String type;
    private long price;
    private int stock;
    private int warrantyYears;

    // constructor untuk inisialisasi atribut
    public ElectronicStore(String id, String category, String brand, String type, long price, int stock, int wy) {
        this.productID = id;
        this.category = category;
        this.brand = brand;
        this.type = type;
        this.price = price;
        this.stock = stock;
        this.warrantyYears = wy;
    }

    // getter untuk mengakses atribut
    public String getProductID() {
        return productID;
    }

    // setter untuk mengubah atribut
    public void setCategory(String category) {
        this.category = category;
    }
    public void setBrand(String brand) {
        this.brand = brand;
    }
    public void setType(String type) {
        this.type = type;
    }
    public void setPrice(long price) {
        this.price = price;
    }
    public void setStock(int stock) {
        this.stock = stock;
    }

    // method untuk menampilkan semua detail produk dengan rapi
    public void displayProductDetails() {
        System.out.println(" ID        : " + productID);
        System.out.println(" Category  : " + category);
        System.out.println(" Brand     : " + brand);
        System.out.println(" Type      : " + type);
        System.out.println(" Price     : Rp " + price);
        System.out.println(" Stock     : " + stock + " units");
        System.out.println(" Warranty  : " + warrantyYears + " years");
    }
}

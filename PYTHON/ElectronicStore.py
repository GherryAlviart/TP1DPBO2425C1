class ElectronicStore:
    # constructor untuk inisialisasi atribut
    def __init__(self, pid="", category="", brand="", type_="", price=0, stock=0, warranty=0):
        self._productID = pid
        self._category = category
        self._brand = brand
        self._type = type_
        self._price = price
        self._stock = stock
        self._warrantyYears = warranty

    # getter untuk ID
    def getProductID(self):
        return self._productID

    # setter untuk mengubah atribut
    def setCategory(self, category): self._category = category
    def setBrand(self, brand): self._brand = brand
    def setType(self, type_): self._type = type_
    def setPrice(self, price): self._price = price
    def setStock(self, stock): self._stock = stock

    # method untuk menampilkan semua detail produk dengan rapi
    def displayProductDetails(self):
        print(f" ID        : {self._productID}")
        print(f" Category  : {self._category}")
        print(f" Brand     : {self._brand}")
        print(f" Type      : {self._type}")
        print(f" Price     : Rp {self._price}")
        print(f" Stock     : {self._stock} units")
        print(f" Warranty  : {self._warrantyYears} years")

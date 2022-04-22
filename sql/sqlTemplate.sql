CREATE TABLE users(
	UserID INT PRIMARY KEY AUTO_INCREMENT,
	FirstName varchar(60) NOT NULL,
    LastName varchar(60) NOT NULL,
    ProfilePicture text NULL,
	EmailAddress VARCHAR(100) UNIQUE KEY,
	Password varchar(100) NOT NULL
);

CREATE TABLE addresses(
	AddressID INT UNIQUE KEY AUTO_INCREMENT,
	UserID INT NOT NULL,
	AddressType VARCHAR(30) NOT NULL,
	Address TEXT NOT NULL,
	City VARCHAR(60) NOT NULL,
	State VARCHAR(60) NOT NULL,
	ZipCode INT NOT NULL,
	FOREIGN KEY (UserID) REFERENCES users(UserID),
	PRIMARY KEY (UserID, AddressType)
);

CREATE TABLE brands(
	BrandID INT PRIMARY KEY AUTO_INCREMENT,
	BrandName VARCHAR(100) UNIQUE KEY
);

CREATE TABLE categories(
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    CategoryName VARCHAR(60) UNIQUE KEY
);

CREATE TABLE products(
    ProductID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Description TEXT NOT NULL,
    Price FLOAT NOT NULL,
    Stock INT NOT NULL,
    Brand INT NOT NULL,
    Image TEXT,
    Category INT NOT NULL,
	LaunchDate INT NOT NULL,
	FOREIGN KEY (Brand) REFERENCES brands(BrandID),
	FOREIGN KEY (Category) REFERENCES categories(CategoryID)
);

CREATE TABLE wishlists(
	UserID INT NOT NULL,
    ProductID INT NOT NULL,
	DateTimeAdded INT,
	FOREIGN KEY (UserID) REFERENCES users(UserID),
	FOREIGN KEY (ProductID) REFERENCES products(ProductID),
	PRIMARY KEY (UserID, ProductID)
);

CREATE TABLE carts(
    CartID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT NOT NULL,
	IsOrder ENUM("0", "1"),
	Address INT NULL,
	Paid ENUM("0", "1") NOT NULL,
	PurchaseDate INT,
	FOREIGN KEY (UserID) REFERENCES users(UserID),
	FOREIGN KEY (Address) REFERENCES addresses(AddressID)
);

CREATE TABLE billing(
	CartID INT NOT NULL,
	ProductID INT NOT NULL,
	Price FLOAT NOT NULL,
	Quantity INT NOT NULL,
	BillAmount FLOAT NOT NULL,
	DateTimeAdded INT NOT NULL,
	FOREIGN KEY (CartID) REFERENCES carts(CartID),
	FOREIGN KEY (ProductID) REFERENCES products(ProductID),
	PRIMARY KEY (CartID, ProductID)
);

CREATE TABLE feedbacks(
	FeedbackID INT PRIMARY KEY AUTO_INCREMENT,
	FullName VARCHAR(100),
	Subject VARCHAR(100),
	Message TEXT
);

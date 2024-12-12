CREATE DATABASE restaurant_reservations;

USE restaurant_reservations;

CREATE TABLE Customers (
    customerId INT NOT NULL UNIQUE AUTO_INCREMENT,
    customerName VARCHAR(45) NOT NULL,
    contactInfo VARCHAR(200),
    PRIMARY KEY (customerId)
);

CREATE TABLE Reservations (
    reservationId INT NOT NULL UNIQUE AUTO_INCREMENT,
    customerId INT NOT NULL,
    reservationTime DATETIME NOT NULL,
    numberOfGuests INT NOT NULL,
    specialRequests VARCHAR(200),
    PRIMARY KEY (reservationId),
    FOREIGN KEY (customerId) REFERENCES Customers(customerId)
);

CREATE TABLE DiningPreferences (
    preferenceId INT NOT NULL UNIQUE AUTO_INCREMENT,
    customerId INT NOT NULL,
    favoriteTable VARCHAR(45),
    dietaryRestrictions VARCHAR(200),
    PRIMARY KEY (preferenceId),
    FOREIGN KEY (customerId) REFERENCES Customers(customerId)
);

INSERT INTO Customers (customerName, contactInfo) VALUES
('John Diaz', 'john@Diaz.com'),
('Jose Torres', 'jose@torres.com'),
('Nelly Jill', 'nelly@jill.com');

INSERT INTO Reservations (customerId, reservationTime, numberOfGuests, specialRequests) VALUES
(1, '2024-12-30 19:00:00', 2, 'Window seat'),
(2, '2024-12-01 20:00:00', 4, ''),
(3, '2024-12-02 18:30:00', 3, 'Birthday celebration');

INSERT INTO DiningPreferences (customerId, favoriteTable, dietaryRestrictions) VALUES
(1, 'Table 5', 'Vegetarian'),
(2, 'Table 10', 'Lactose Intolerance'),
(3, 'Near the fireplace', 'Nut allergy');
<?php
require_once 'connect.php';

$link = mysqli_connect($host, $user, $password, $db)
or die ("Ошибка подключения к базе данных" . mysqli_error($link));

echo "Вы подключились! <br/>";

$sql = "CREATE TABLE airline (
    company varchar(50) NOT NULL,
    license int(8) NOT NULL,
    ceo varchar(50) NOT NULL,
    PRIMARY KEY(company)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO airline VALUES 
    ('Aeroflot', 362718, 'Gasaev A.P.'),
    ('Gazprom-avia', 762182, 'Petrov S.Y.'),
    ('Taymyr', 362110, 'Tymofeeva O.P.'),
    ('Transaero', 908129, 'Ognev D.O.'),
    ('Yamal', 728112, 'Sergeev R.L.')";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql ="CREATE TABLE employee (
    employee_id int(11) AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    position varchar(50) NOT NULL,
    education varchar(40) NOT NULL,
    experience int(2) NOT NULL,
    PRIMARY KEY(employee_id)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO employee (name, position, education, experience) VALUES
    ('ALEKSEEVA T.G.', 'stewardess', 'secondary', 10),
    ('EUGENYEV P.O.', 'skipper', 'higher', 13),
    ('IVANOV V.N.', 'navigator', 'higher', 8),
    ('KABARDINOV O.A.', 'skipper', 'higher', 18),
    ('KULAKOV A.P.', 'co-pilot', 'higher', 26),
    ('LESHKOV P.M.', 'navigator', 'secondary', 15),
    ('SARPUNOVA E.S.', 'stewardess', 'secondary', 9),
    ('SKRIPOV R.E.', 'co-pilot', 'higher', 18),
    ('TAGANOVA E.A.', 'stewardess', 'secondary', 3)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql = "CREATE TABLE transit_landing (
    landing_code int(10) AUTO_INCREMENT,
    location varchar(50) NOT NULL,
    period int(3) NOT NULL,
    PRIMARY KEY(landing_code)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO transit_landing (location, period) VALUES
    ('Ufa', 45),
    ('Astana', 30),
    ('Singapore', 45),
    ('Havana', 50),
    ('Novosibirsk', 35)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql = "CREATE TABLE route (
    number varchar(10) NOT NULL,
    departure varchar(50) NOT NULL,
    arrival varchar(50) NOT NULL,
    distance int(5) NOT NULL,
    PRIMARY KEY(number)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO route VALUES
    ('B288', 'Saint-Petersburg', 'Los-Angeles', 9177),
    ('Q291', 'Saint-Petersburg', 'Irkutsk', 5657),
    ('T672', 'Saint-Petersburg', 'Wellington', 16815),
    ('U668', 'Saint-Petersburg', 'Phuket', 8024),
    ('V345', 'Saint-Petersburg', 'Pekin', 6050)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql = "CREATE TABLE machine (
    model varchar(10) NOT NULL,
    brand varchar(20) NOT NULL,
    seats int(4) NOT NULL,
    speed int(4) NOT NULL,
    PRIMARY KEY(model)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO machine VALUES
    ('G117E', 'Airbus', 290, 1050),
    ('H782O', 'Boeing', 300, 950),
    ('J788J', 'Fiat', 170, 1200),
    ('L092P', 'Airbus', 195, 900),
    ('M920S', 'Airbus', 90, 1300),
    ('S433D', 'Boeing', 230, 850),
    ('U772W', 'Boeing', 315, 1000),
    ('Y224K', 'Boeing', 260, 980)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql="CREATE TABLE service (
    name varchar(20) NOT NULL,
    address varchar(50) NOT NULL,
    license int(8) NOT NULL,
    PRIMARY KEY(name)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO service VALUES
    ('Bic', 'Enthusiastov 57', 788442),
    ('Master-Bis', 'Lenina 45', 562372),
    ('Prof Remont', 'Dunaevskogo 13', 322439),
    ('Tact', 'Pobyedy 27', 835621),
    ('Express-Remont', 'Gorkogo 1', 891100)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql ="CREATE TABLE plane (
    number varchar(10) NOT NULL,
    model varchar(50) NOT NULL,
    airline varchar(50) NOT NULL,
    service varchar(50) NOT NULL,
    PRIMARY KEY(number),
    FOREIGN KEY(model) REFERENCES machine (model),
    FOREIGN KEY(airline) REFERENCES airline (company),
    FOREIGN KEY(service) REFERENCES service (name)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO plane VALUES
    ('b23', 'H782O', 'Aeroflot', 'Express-Remont'),
    ('b72', 'L092P', 'Taymyr', 'Express-Remont'),
    ('f32', 'G117E', 'Taymyr', 'Tact'),
    ('h11', 'U772W', 'Yamal', 'Master-Bis'),
    ('h55', 'S433D', 'Aeroflot', 'Express-Remont'),
    ('l87', 'Y224K', 'Transaero', 'Bic'),
    ('t68', 'J788J', 'Gazprom-avia', 'Prof Remont'),
    ('u67', 'Y224K', 'Transaero', 'Tact'),
    ('y43', 'M920S', 'Gazprom-avia', 'Master-Bis')";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql ="CREATE TABLE flight (
    number varchar(5) NOT NULL,
    departure_time datetime,
    arrival_time datetime,
    route varchar(10) NOT NULL,
    plane varchar(5) NOT NULL,
    PRIMARY KEY(number),
    FOREIGN KEY(route) REFERENCES route (number),
    FOREIGN KEY(plane) REFERENCES plane (number)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO flight VALUES
    ('F1100', '2018-02-25 12:40:00', '2018-02-25 20:50:00', 'V345', 'y43'),
    ('F3245', '2018-02-25 20:00:00', '2018-02-26 9:00:00', 'B288', 'l87'),
    ('F6172', '2018-02-25 11:30:00', '2018-02-26 10:40:00', 'T672', 'h11'),
    ('F6723', '2018-02-25 23:00:00', '2018-02-26 8:40:00', 'Q291', 'h55'),
    ('F9030', '2018-02-25 15:00:00', '2018-02-25 23:45:00', 'U668', 'b72')";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql="CREATE TABLE landing (
    code int(10) AUTO_INCREMENT,
    flight varchar(5) NOT NULL,
    landing_code int(10) NOT NULL,
    PRIMARY KEY(code),
    FOREIGN KEY(flight) REFERENCES flight (number),
    FOREIGN KEY(landing_code) REFERENCES transit_landing (landing_code)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO landing (flight, landing_code) VALUES
    ('F3245', 4),
    ('F1100', 1),
    ('F6172', 3),
    ('F6172', 5),
    ('F9030', 2)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

$sql="CREATE TABLE crew (
    code int(10) AUTO_INCREMENT,
    flight varchar(5) NOT NULL,
    employee int(10) NOT NULL,
    PRIMARY KEY(code),
    FOREIGN KEY(flight) REFERENCES flight (number),
    FOREIGN KEY(employee) REFERENCES employee (employee_id)
    ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully, ";
} else {
    echo "Error creating table, " . mysqli_error($link);
}

$sql = "INSERT INTO crew (flight, employee) VALUES
    ('F6172', 1),
    ('F6172', 2),
    ('F6172', 5),
    ('F6172', 6),
    ('F6172', 7),
    ('F6723', 3),
    ('F6723', 4),
    ('F6723', 8),
    ('F6723', 9)";
if (mysqli_query($link, $sql)) {
    echo "inserted successfully. <br/>";
} else {
    echo "Error inserting. <br/>" . mysqli_error($link);
}

mysqli_close($link);
?>

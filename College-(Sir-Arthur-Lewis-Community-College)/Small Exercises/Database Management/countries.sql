CREATE DATABASE IF NOT EXISTS CountriesInfo;

USE CountriesInfo;

CREATE TABLE IF NOT EXISTS Countries (
    country_id VARCHAR(10) PRIMARY KEY,
    country_name VARCHAR(35) NOT NULL,
    population INT(9) NOT NULL,
    caricom ENUM('Y', 'N') NOT NULL
);

INSERT INTO Countries (country_id, country_name, population, caricom)
		 VALUES
		 ("ANT268", "Antigua & Barbuda", 80161, "Y"),
		 ("SUR597", "Suriname", 581363, "Y"),
		 ("TRI868", "Trinidad & Tobago", 1395000, "N"),
		 ("HAI509", "Haiti", 11260000, "Y");
		 
SELECT * FROM countries WHERE caricom = 'Y';

SELECT * FROM countries;

UPDATE countries 
SET population = 601000 
WHERE country_id = 'SUR597';
	
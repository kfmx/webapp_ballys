# Requirements

- PHP (get from php.net, I use version 8.3.12)
- Composer (get from getcomposer.org, I use version 2.7.9)
- Symfony (On Windows, install by running 'curl -sS https://get.symfony.com/cli/installer | bash' and add symfony to your PATH. I use version 6.1.12)
- A MySQL database

# Instructions

1. Create a MySQL database using the following SQL:

`
CREATE TABLE 'player' (
		'id' int NOT NULL AUTO_INCREMENT,
		'first_name' varchar(45) NOT NULL,
		'last_name' varchar(45) NOT NULL,
		'city' varchar(45) NOT NULL,
		'birth_date' datetime NOT NULL,
		PRIMARY KEY ('id')
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
`

`
INSERT INTO webapp_ballys.player2 (id, first_name, last_name, city, birth_date)
VALUES
(1, 'John', 'Doe', 'USA', '1994-01-01 01:00:00'),
(2, 'Jane', 'Doe', 'USA', '1994-01-02 02:00:00'),
(3, 'Test', 'Testerman', 'Test', '0001-01-01 11:11:11'),
(4, 'Test2', 'Testerman2', 'Test2', '0002-02-02 22:22:22'),
(5, 'Karl', 'Marelius', 'Sweden', '1995-12-22 21:07:00'),
(6, 'Bengt', 'Bengtsson', 'Denmark', '1967-04-29 15:53:00'),
(7, 'Jakob', 'Jakobsson', 'Norway', '2003-10-04 08:13:00'),
(8, 'Harry', 'Potter', 'UK', '1990-07-31 09:34:00'),
(9, 'Ash', 'Ketchum', 'Pallet Town', '1988-05-22 10:00:00'),
(10, 'Miku', 'Hatsune', 'Brazil', '2007-08-31 16:00:00');
`

2. Clone the repository from my github (https://github.com/kfmx/webapp_ballys)

3. Copy the file '.env.example' in the root directory and name the copy '.env'
  	- Change 'DATABASE_URL' to point to your MySQL database

4. Open up a terminal and run 'yarn install' and 'composer install'

5. Run 'yarn encore dev-server' to start the dev server on port 8080

6. Run 'symfony server:start' to start the web server on port 8000 (in dev this requires the encore dev server to be running)

7. Access the webapp by going to localhost:8000 in a web browser

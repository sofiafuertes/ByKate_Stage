CREATE DATABASE ByKate;
USE ByKate; 

CREATE TABLE users (
id_users INT PRIMARY KEY AUTO_INCREMENT,
login VARCHAR(255) NOT NULL UNIQUE,
pwd VARCHAR(255) NOT NULL
);

CREATE TABLE textes_web(
id_textes_web INT PRIMARY KEY AUTO_INCREMENT,
page_path VARCHAR(255) NOT NULL,
section VARCHAR(255),
content TEXT
);

CREATE TABLE product(
id_product INT PRIMARY KEY AUTO_INCREMENT,
product_name VARCHAR(255) NOT NULL UNIQUE,
product_description TEXT,
allergies VARCHAR(255),
servings VARCHAR(255)
); 

CREATE TABLE photos_web(
id_photos_web INT PRIMARY KEY AUTO_INCREMENT, 
photo_path VARCHAR(255) NOT NULL,
page_path VARCHAR(255),
section VARCHAR(150)
);

CREATE TABLE difficulty_recipe(
id_difficulty_recipe INT PRIMARY KEY AUTO_INCREMENT,
difficulty VARCHAR(255)
);

CREATE TABLE recipe (
id_recipe INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255) NOT NULL, 
main_photo_path VARCHAR(255),
cooking_time INT,
category VARCHAR(255),
create_at DATETIME,
id_difficulty_recipe INT, FOREIGN KEY (id_difficulty_recipe) REFERENCES difficulty_recipe(id_difficulty_recipe) ON DELETE CASCADE
);

CREATE TABLE extra_photos(
id_extra_photos INT PRIMARY KEY AUTO_INCREMENT,
photo_path VARCHAR(255) NOT NULL,
id_recipe INT,
id_product INT,
FOREIGN KEY (id_recipe) REFERENCES recipe(id_recipe) ON DELETE CASCADE,
FOREIGn KEY (id_product) REFERENCES product(id_product) ON DELETE CASCADE
);

CREATE TABLE tips_recipe(
id_tips_recipe INT PRIMARY KEY AUTO_INCREMENT,
content_tip TEXT,
id_recipe INT, FOREIGN KEY (id_recipe) REFERENCES recipe(id_recipe) ON DELETE CASCADE
);

CREATE TABLE steps_recipe (
id_steps_recipe INT PRIMARY KEY AUTO_INCREMENT,
step_number INT,
step_description TEXT NOT NULL,
id_recipe INT, FOREIGN KEY (id_recipe) REFERENCES recipe(id_recipe) ON DELETE CASCADE
);

CREATE TABLE ingredient(
id_ingredient INT PRIMARY KEY AUTO_INCREMENT,
ingredient_name VARCHAR(255)
);

CREATE TABLE recipe_ingredient(
id_recipe_ingredient INT PRIMARY KEY AUTO_INCREMENT,
quantity VARCHAR(255),
id_ingredient INT, 
id_recipe INT,
FOREIGN KEY (id_ingredient) REFERENCES ingredient(id_ingredient) ON DELETE CASCADE,
FOREIGN KEY (id_recipe) REFERENCES recipe(id_recipe) ON DELETE CASCADE
);

INSERT INTO users(login, pwd) VALUES ('test@test.com',12345);

SELECT login, pwd FROM users;

INSERT INTO product (product_name, product_description, allergies, servings) VALUES 
('Chocotorta','Un clásico de la repostería argentina que no puede faltar. Capas de galletas de chocolate, bañadas en leche y combinadas con un cremoso relleno de queso crema y dulce de leche. Simple, deliciosa y perfecta para cualquier ocasión. ¡Un postre que siempre conquista!',
'gluten, lácteos, huevo, frutos secos y soja','4, 8, 12'),
('Key Lime Pie','Un postre refrescante y cremoso con una base crujiente de galleta, un relleno suave y ácido de lima key, y una capa de merengue o crema batida. Perfecto para los amantes de los sabores cítricos.',
'gluten, lácteos, huevo y frutos secos','4, 8, 12'),
('Pavlova Pistachos y Frutos Rojos','Una delicada y esponjosa base de merengue crocante por fuera y suave por dentro, coronada con una crema suave, pistachos troceados y una mezcla de frutos rojos frescos. Un postre ligero y elegante, perfecto para cualquier ocasión especial.',
'frutos secos, lácteos y huevo','2, 6, 10');



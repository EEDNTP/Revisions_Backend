-- CREATE : ajouter des données dans la base
-- INSERT INTO (...) VALUES (...)

-- Créer un auteur
INSERT INTO authors(lastname, firstname, email) VALUES ('Martin', 'Pierre', 'pierre@martin.fr');
INSERT INTO authors(lastname, firstname, email) VALUES ('Antunes', 'Kevin', 'kevin@antunes.fr');
INSERT INTO authors(lastname, firstname, email) VALUES ('Quernel', 'Morvin', 'morvin@quernel.fr');
INSERT INTO authors(lastname, firstname, email) VALUES ('Nisharapov', 'Adilet', 'adilet@nisharapov.fr');

INSERT INTO categories(name, description) VALUES ('Economie', 'Toutes les informations économiques');

INSERT INTO posts(title, content, authors_id) VALUES ('Ceci est un exemple', 'Ceci est le contenu de notre exemple', 2);

INSERT INTO posts_categories(posts_id, categories_id) VALUES (1, 1);

-- READ : récupérer des données
-- SELECT ... FROM ...
-- Lister tous les auteurs
SELECT * FROM authors;

-- Lister l'id et l'email de tous les auteurs
SELECT id, email FROM authors;

-- Lister tous les auteurs dans l'ordre alphabétique du nom de famille
SELECT * FROM authors ORDER BY lastname ASC;

-- Lister les auteurs dont l'id est supérieur à 2
SELECT * FROM authors WHERE id > 2;

-- Lister les auteurs dont l'id est supérieur à 2 dans l'ordre alphabétique du nom de famille
SELECT * FROM authors WHERE id > 2 ORDER BY lastname ASC;

-- Récupérer le 1er auteur dans l'ordre alphabétique
SELECT * FROM authors ORDER BY lastname ASC LIMIT 1;

-- UPDATE
-- UPDATE... SET... WHERE...
-- Mettre à jour l'email du 1er auteur
UPDATE authors SET email = 'nouvel@email.fr' WHERE id = 1;

-- Mettre à jour le nom et l'email du 1er auteur
UPDATE authors SET email = 'nouvel@email2.fr', lastname = 'Durand' WHERE id = 1;


-- DELETE
-- DELETE FROM... WHERE...
-- Supprimer l'auteur qui a l'id 1
DELETE FROM authors WHERE id = 1;

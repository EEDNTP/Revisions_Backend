-- Sélectionner des données provenant de plusieurs tables en relation
-- Je veux tous les auteurs (nom, prénom) qui ont écrit un article au moins
SELECT authors.lastname, authors.firstname
FROM authors
INNER JOIN posts
ON authors.id = posts.authors_id;

-- Compter le nombre de posts par auteur (même 0) et l'afficher avec le nom et le prénom
SELECT authors.lastname, authors.firstname, COUNT(posts.id)
FROM authors
LEFT JOIN posts ON authors.id = posts.authors_id
GROUP BY authors.id;
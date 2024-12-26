CREATE DATABASE prac2;

USE prac2;


CREATE TABLE Users (
    email VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    accountId INT UNIQUE NOT NULL
);

CREATE TABLE News (
    newsId INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    body TEXT,
    dateTime DATETIME NOT NULL
);


INSERT INTO News (title, body, dateTime) VALUES
('Insolita navidad en la UOC', 'Estudiante uruguayo de la UOC quemo el asado por realizar tarea del curso de ciber seguridad durante la jornada de navidad. La familia muy disgustada le corto el internet.', '2024-12-25 20:00:00'),
('Trucos tecnologicos', 'Cuando el PC no funcione, desnchufe y vuelva a conectar. Asi, al inciar el PC, vera que el equipo funcionara aun mejor que antes.', '2022-10-12 21:00:00'),
('Consejos de salud', 'Mientra codifica en la notebook, no coma dulces, ni salados. Tampoco amargos, ni acidos. Sencillamente no coma. Esto mejorara su estado fisico, reduciendo el peso. Como plus, vera que esto le permite concentrarse mas.', '2023-10-13 22:00:00'),
('Resumen deportivo', 'Confirmado, Nvidia le gano a Intel 1 a 0.', '2024-11-14 23:00:00'),
('Noticias de la UOC', 'La UOC ha decidido realizar un reconocimiento a aquellos estudiantes que en codearon durante navidad.', '2024-09-15 00:00:00');
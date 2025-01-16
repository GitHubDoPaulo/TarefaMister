CREATE TABLE lojas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contato VARCHAR(50) NOT NULL,
    logo VARCHAR(255) NOT NULL
);

CREATE TABLE endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idLoja INT NOT NULL,
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(255),
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    FOREIGN KEY (idLoja) REFERENCES lojas(id) ON DELETE CASCADE
);

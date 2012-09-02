DROP TABLE IF EXISTS nota;
DROP TABLE IF EXISTS aluno;
DROP TABLE IF EXISTS prazo;
DROP TABLE IF EXISTS turma;
DROP TABLE IF EXISTS teste;
DROP TABLE IF EXISTS exercicio;

CREATE TABLE turma (
	id_turma INT(10) PRIMARY KEY AUTO_INCREMENT,
	nome_turma VARCHAR(200) NOT NULL
) ENGINE=INNODB;

CREATE TABLE aluno (
	id_aluno INT(10) PRIMARY KEY AUTO_INCREMENT,
	nome_aluno VARCHAR(200) NOT NULL,
	id_turma INT(10) NOT NULL,
	INDEX (id_turma),
	FOREIGN KEY (id_turma) REFERENCES turma (id_turma)
) ENGINE=INNODB;

CREATE TABLE exercicio (
	id_exercicio INT(10) PRIMARY KEY AUTO_INCREMENT,
	numero_aula INT(4) NOT NULL,
	numero_exercicio INT(4) NOT NULL,
	precondicoes VARCHAR(2000), -- NOTA: Usar ; entre cada statement
	UNIQUE (numero_aula, numero_exercicio)
) ENGINE=INNODB;

CREATE TABLE prazo (
	id_exercicio INT(10) NOT NULL,
	id_turma INT(10) NOT NULL,
	prazo Datetime,
	INDEX (id_exercicio), INDEX(id_turma),
	FOREIGN KEY (id_exercicio) REFERENCES exercicio (id_exercicio),
	FOREIGN KEY (id_turma) REFERENCES turma (id_turma),
	PRIMARY KEY (id_exercicio, id_turma)
) ENGINE=INNODB;

CREATE TABLE teste (
	id_teste INT(10) PRIMARY KEY AUTO_INCREMENT,
	id_exercicio INT(10) NOT NULL,
	condicao VARCHAR(200) NOT NULL,
	ordem INT(4),
	dica VARCHAR(200),
	INDEX(id_exercicio),
	FOREIGN KEY (id_exercicio) REFERENCES exercicio (id_exercicio)
) ENGINE=INNODB;

CREATE TABLE nota (
	id_nota INT(10) PRIMARY KEY AUTO_INCREMENT,
	id_aluno INT(10) NOT NULL,
	id_exercicio INT(10) NOT NULL,
	data Datetime NOT NULL,
	nota INT(3) NOT NULL,
	texto VARCHAR(2000) NOT NULL,
	INDEX (id_exercicio), INDEX (id_aluno),
	FOREIGN KEY (id_exercicio) REFERENCES exercicio (id_exercicio),
	FOREIGN KEY (id_aluno) REFERENCES aluno (id_aluno)
) ENGINE=INNODB;
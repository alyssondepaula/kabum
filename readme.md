
# Área administrativa em PHP

Sistema desenvolvido com a finalidade de desafio para a Kabum.




## Techs utilizadas

**Servidor:**  [Apache](https://www.apache.org/).

**Linguagem de programação:**  [PHP](https://www.php.net/).

**Banco de dados:**  [MYSQL](https://www.mysql.com/).

**SGBD:**  [DBEAVER](https://dbeaver.io/).

**Gerenciador de dependências:**  [Composer](https://getcomposer.org/).

**Demais:**  [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML), [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS), [JavaScript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript).

# Implementação:

- Habilitar o `.htaccess` no seu servidor caso use o servidor [APACHE](https://www.apache.org/) siga os passos:

- - Carregar no Apache o módulo `mod_rewrite`:

```bash
sudo a2enmod rewrite
```

- - Editar o arquivo `/etc/apache2/apache2.conf`: alterar a diretiva “AllowOverride” que por padrão vem setada como “None“, vamos alterar para “All“

```
<Directory /var/www/html/>
	Options Indexes FollowSymLinks
	AllowOverride All
	Require all granted
</Directory>
```
- -  Reiniciar o servidor Apache

```bash
sudo service apache2 restart
```

- Realizar a criação do banco de dados [MYSQL](https://www.mysql.com/)

- Atualizar as variáveis de conexão: `HOST`,`DB`,`USER`,`PASS` presentes no caminho [`./src/Infra/MysqlPdo/Connection`](https://github.com/alyssondepaula/kabum/blob/main/src/Infra/MysqlPdo/Connection.php) de acordo com o seu banco.

- No seu gerenciador de preferência como por exemplo o [DBEAVER](https://dbeaver.io/) executar os seguintes comandos sql:

- - Criação de tabelas (Migrations)
- - - Tabela de usúarios:
```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- - - Tabela de Clientes:
```sql
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- - - Tabela de Clientes:
```sql
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `isDefault` tinyint(1) DEFAULT 0,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- - - Criação de chaves estrangeiras:
```sql
ALTER TABLE clients
ADD userId int(11) NOT NULL;

ALTER TABLE addresses
ADD clientId int(11) NOT NULL;

ALTER TABLE clients
ADD FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE;

ALTER TABLE addresses
ADD FOREIGN KEY (clientId) REFERENCES clients(id) ON DELETE CASCADE;
```

- - Criação de dados (Seeds) -> `Opcional`:  Caso opter por esse seed, você deve executa-lo em logo após a Migrations.

```sql
INSERT INTO users (name, email, password)
VALUES ('Admin', 'admin@admin.com', 'admin');

INSERT INTO clients (name, birthDate, cpf, rg, phone, userId)
VALUES ('client', '1994-06-22', 11111111111, 11222333, 99988776655, 1);

INSERT INTO addresses (street , `number` , zip , complement , city ,state , clientId, isDefault)
VALUES ('rua da ajuda', 2, 36220000, 'casa', 'campolide', 'MG', 1, 1);
```


- Fazer a instalação do [Composer](https://getcomposer.org/download/), com ele vamos poder ter acesso ao autoload das classes presentes.

- Ao finalizar a instalação do [Composer](https://getcomposer.org/download/) executar na raiz do projeto:

```bash
composer install
```
Pronto! Após instalação você terá uma pasta `vendor` na raiz, você agora pode acessar o projeto usando seu ip local `localhost`.
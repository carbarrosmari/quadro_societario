# Quadro Societário

Pequeno sistema para gerir dados de empresas e seu quadro de sócios.

### Tecnologias utilizadas

- Linguagem PHP
- Framework Symfony
- ORM Doctrine
- Front: Twig e Bootstrap
- Banco de dados: PostgreSQL

### Funcionalidades básicas

- Autenticação (Login, Cadastro e CRUD de usuários)
- Cadastro de empresas (CRUD)
- Cadastro de sócios das empresas (CRUD)

### Instruções para execução do projeto

```bash
# Clone esse repositório
git clone

# Execute os container
docker-compose up -d

# Execute as migrations
php bin/console doctrine:migrations:migrate

# Execute o servidor do projeto
php -S 0.0.0.0:8123 -t public
```
### Documentation





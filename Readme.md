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
git clone git@github.com:carbarrosmari/quadro_societario.git

# Acesse a branch dev
git checkout dev

# Execute os containers
docker-compose up -d

# Execute as migrations
php bin/console doctrine:migrations:migrate

# Execute o servidor do projeto
php -S 0.0.0.0:8123 -t public
```

## Instruções de teste

**Listar empresas**

`GET: /companies`

**Criar empresa**

`POST: /company/create`

**Atualizar empresa**

`PUT: /company/{company_id}/update`

**Excluir empresa**

`DELETE: /company/{company_id}/delete`

**Listar sócios**

`GET: /company/{company_id}/partners`

**Criar sócio**

`POST: /company/{company_id}/partner/create`

**Atualizar sócio**

`PUT: /partner/{partner_id}/update`

**Excluir sócio**

`DELETE: /company/{company_id}/partner/{partner_id}/delete`

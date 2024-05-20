# Documentation
# Documentação de Rotas da API

Este documento descreve as rotas disponíveis no sistema para gerenciamento de sócios de uma empresa.

## Rotas de Gerenciamento de Empresas

### Listar Empresas

**Rota**: `/api/companies`

**Método HTTP**: `GET`

**Descrição**: Retorna a lista de todas as empresas cadastradas no sistema.

**Exemplo de Requisição**:
```http
GET /api/companies
```
**Resposta**

A rota retorna um JSON contendo a lista de empresas cadastradas no sistema.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "corporateName": "Empresa A",
        "address": "Rua da Empresa A, 123",
        "phone": "1234567890",
        "email": "empresa_a@example.com"
    },
    {
        "id": 2,
        "corporateName": "Empresa B",
        "address": "Rua da Empresa B, 456",
        "phone": "9876543210",
        "email": "empresa_b@example.com"
    },
    ...
]
```

### Lista uma empresa especifica

**Rota**: `/api/company/{company_id}`

**Método HTTP**: `GET`

**Descrição**: Retorna os detalhes de uma empresa específica com base no ID fornecido.

**Exemplo de Requisição**:
```http
GET /api/company/1
```
**Resposta**

A rota retorna um JSON contendo os detalhes da empresa.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "corporateName": "Empresa A",
        "address": "Rua da Empresa A, 123",
        "phone": "1234567890",
        "email": "empresa_a@example.com"
    }
]
```

### Criar uma Nova Empresa

**Rota**: `/api/company/create`

**Método HTTP**: `POST`

**Descrição**: Cria uma nova empresa com base nos dados fornecidos.

**Exemplo de Requisição**:
```http
POST /api/company/1
```
**Resposta**

A rota retorna um JSON contendo os detalhes da empresa criada.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "corporateName": "Empresa A",
        "address": "Rua da Empresa A, 123",
        "phone": "1234567890",
        "email": "empresa_a@example.com"
    }
]
```

### Atualizar Dados de uma Empresa

**Rota**: `/api/company/{company_id}/update`

**Método HTTP**: `PUT`

**Descrição**:  Atualiza os dados de uma empresa específica com base no ID fornecido

**Exemplo de Requisição**:
```http
PUT /api/company/1/update
```

**Resposta**
A rota retorna um JSON contendo os dados atualizados da empresa.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "corporateName": "Empresa Atualizada",
        "address": "Rua da Empresa A, 456",
        "phone": "1234567890",
        "email": "empresa_a@example.com"
    }
]
```

### Excluir uma Empresa

**Rota**: `/api/company/{company_id}/delete`

**Método HTTP**: `DELETE`

**Descrição**: Exclui uma empresa específica com base no ID fornecido.

**Exemplo de Requisição**:
```http
DELETE /api/company/1/delete
```

## Rota de Gerenciamento de Sócios

### Listar Todos os Sócios de uma Empresa

**Rota**: `/api/company/{company_id}/partners`

**Método HTTP**: `GET`

**Descrição**: Retorna a lista de todos os sócios de uma empresa específica com base no ID fornecido.

**Exemplo de Requisição**:
```http
GET /api/company/1/partners
```
**Resposta**

A rota retorna um JSON contendo os detalhes dos sócios.

**Exemplo de resposta**

```

[
    {
        "id": 1,
        "name": "João da Silva",
        "email": "joao@example.com",
        "cpf": "123.456.789-10",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    },
    {
        "id": 2,
        "name": "Maria Oliveira",
        "email": "maria@example.com",
        "cpf": "987.654.321-00",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    },
    {
        "id": 3,
        "name": "Pedro Santos",
        "email": "pedro@example.com",
        "cpf": "456.789.123-45",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    }
]
```

### Listar um Sócio Específico de uma Empresa

**Rota**: `/api/company/partner/{partner_id}`

**Método HTTP**: `GET`

**Descrição**: Retorna os detalhes de um sócio específico de uma empresa com base nos IDs fornecidos.

**Exemplo de Requisição**:
```http
GET /api/company/partner/1
```
**Resposta**

A rota retorna um JSON contendo os detalhes de um sócio de uma empresa.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "name": "João da Silva",
        "email": "joao@example.com",
        "cpf": "123.456.789-10",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    },
]
```

### Criar um Novo Sócio para uma Empresa

**Rota**: `/api/company/{company_id}/partner/create`

**Método HTTP**: `POST`

**Descrição**:  Cria um novo sócio para uma empresa específica com base nos dados fornecidos.

**Exemplo de Requisição**:
```http
POST /api/company/1/partner/create
```
**Resposta**
A rota retorna um JSON contendo os dados do sócio criado.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "name": "João da Silva",
        "email": "joao@example.com",
        "cpf": "123.456.789-10",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    },
]
```

### Atualizar Dados de um Sócio de uma Empresa

**Rota**: `/api/company/{company_id}/partner/{partner_id}/update`

**Método HTTP**: `PUT`

**Descrição**:  Atualiza os dados de um sócio específico de uma empresa com base nos IDs fornecidos.

**Exemplo de Requisição**:
```http
PUT /api/company/1/partner/1/update
```
**Resposta**
A rota retorna um JSON contendo os dados do sócio atualizados.

**Exemplo de resposta**

```
[
    {
        "id": 1,
        "name": "João da Silva Santos Atualizado",
        "email": "joao@example.com",
        "cpf": "123.456.789-10",
        "company": {
            "id": 1,
            "corporateName": "Empresa A",
            "address": "Rua da Empresa A, 123",
            "phone": "1234567890",
            "email": "empresa_a@example.com"
        }
    },
]
```

### Excluir um Sócio de uma Empresa

**Rota**: `/api/company/partner/{partner_id}/delete`

**Método HTTP**: `DELETE`

**Descrição**: Exclui um sócio específico de uma empresa com base no ID fornecido.

**Exemplo de Requisição**:
```http
DELETE /api/company/partner/1/delete
```
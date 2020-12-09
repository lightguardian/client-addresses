# CRUD de clientes

> CRUD criado no modelo API REST afim de guardar o endereço de clientes.

### Tecnologias/Frameworks 
---
- <a href="https://laravel.com/docs/7.x/" target="_blank">Laravel versão 7</a>


### API/CRUD
---

- Criado um controlador para cada rota especificada: GET, POST, PUT, DELETE;
- Caso a operação ocorra com sucesso, será retornado um JSON com o objeto inserido;
- A API retornará **"erro interno"** caso haja um erro no banco de dados;
- Dependendo do erro retornará o status_code apropriado, tentei tratar o máximo possível;

### Template JSON para consulta API
---

#### Cliente

{
  "id": 1,
  "trade_name": "Nome fantasia",
  "legal_name": "Lucas Eduardo Aurélio",
  "cnpj": "12345678901234"

}

#### Endereço
{
	"client_id":1,
	"road":"Logradouro",
	"neighborhood":"Bairro",
	"house_number":"404 B",
	"cep":"12345678"
}

### Rotas
---

##### Clientes

URL   |  Tipo
:--------- | ------:
/clientes | Get
/clientes/{id} | Get
/clientes | Post
/clientes/{id} | Put
/clientes/{id} | Delete

##### Endereços

URL   |  Tipo
:--------- | ------:
/clientes/{id}/enderecos | Get
/clientes/{id}/enderecos/{id2} | Get
/clientes/{id}/enderecos | Post
/clientes/{id}/enderecos/{id2} | Put
/clientes/{id}/enderecos/{id2} | Delete

### Semente
---

-Para popular as tabelas:
    0. composer dump-autoload
    0. php artisan db:seed 
        > Para popular todas as tabelas;
    0. php artisan db:seed --class=ClientSeeder
        > Para popoular a tabela de Clientes
    0. php artisan db:seed --class=AddressSeedercomprimento devido a relação de colunas


- Criei também uma função recursiva chamada *randomNumericString()*, passa-se um inteiro para ela e ela retorna um string numérico com o comprimento(length) passado.        










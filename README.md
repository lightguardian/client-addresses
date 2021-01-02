# CRUD de clientes

> CRUD criado no modelo API REST afim de guardar o endereço de clientes.

- <a href="https://laravel.com/docs/7.x/" target="_blank">Laravel versão 7</a>


### API/CRUD


- É necessário criar o banco de dados e configurar o arquivo **app/.env**;
- Criado um controlador para as rotas: GET, POST, PUT, DELETE;
- Caso a requisição ocorra com sucesso, será retornado um JSON com o objeto inserido;
- Retornará o status_code apropriado conforme a requisição;

### Template JSON para consulta API

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

- Para popular as tabelas:

    1. **composer dump-autoload**
    1. **php artisan db:seed** 

        > Para popular todas as tabelas;

    1. **php artisan db:seed --class=ClientSeeder**

        > Para popoular a tabela de Clientes

    1. **php artisan db:seed --class=AddressSeeder**

	
- randomNumericString(int $length):	
	Retorna um string numérico do tamanho do $length passado, útil para gerar CPF, CEPS ou CNPJS aleatórios.        










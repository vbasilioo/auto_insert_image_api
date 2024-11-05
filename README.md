
<a id="readme-top"></a>

[![LinkedIn][linkedin-shield]][linkedin-url]

<br />
<div align="center">
  <a href="https://github.com/vbasilio/auto_insert_image_api">
    <img src="https://www.upload.ee/image/17349608/logo.png" alt="Logo" width="260" height="100">
  </a>

  <h3 align="center">AUTO Insert Image API</h3>

  <p align="center">
    API desenvolvida com Laravel 11, PHP 8.2, Pest para testes e Docker.
    <br />
    <a href="https://github.com/vbasilio/auto_insert_image_api"><strong>Explore a documentação »</strong></a>
  </p>
</div>

<details>
  <summary>Conteúdos</summary>
  <ol>
    <li><a href="#sobre-o-projeto">Sobre o projeto</a></li>
    <li><a href="#tecnologias-utilizadas">Tecnologias Utilizadas</a></li>
    <li><a href="#início">Início</a></li>
    <li><a href="#uso">Uso</a></li>
    <li><a href="#documentação-das-rotas">Documentação das Rotas</a></li>
    <li><a href="#testes-automatizados">Testes Automatizados</a></li>
    <li><a href="#contato">Contato</a></li>
  </ol>
</details>

## Sobre o Projeto

[![Product Screenshot][product-screenshot]](https://example.com)

API para gestão de imagens utilizando Laravel 11 e Docker, com testes automatizados configurados em Pest para alta cobertura. Esta API permite consumir imagens da The Cat API, salvá-las em um banco de dados e listá-las de forma paginada.

### Tecnologias Utilizadas

* [![Laravel][Laravel.com]][Laravel-url]
* [![PHP][PHP-badge]][PHP-url]
* [![Docker][Docker-badge]][Docker-url]
* [![Pest][Pest-badge]][Pest-url]

## Início

Clone este repositório e inicie o ambiente utilizando Docker.

### Pré-requisitos

Instale o Docker para garantir compatibilidade.

### Instalação

1. Clone o repositório
   ```sh
   git clone https://github.com/vbasilio/auto_insert_image_api.git
   ```
2. Configure as variáveis de ambiente no arquivo `.env`
3. Suba o ambiente Docker
   ```sh
   docker-compose up -d
   ```

## Uso

A API possui dois endpoints principais para gerenciar imagens de gatos. Consulte a documentação de cada rota abaixo.

## Documentação das Rotas

### Rota: `POST /add-photo`

Adiciona uma nova foto de gato ao banco de dados, obtida da The Cat API.

- **Método:** `POST`
- **Endpoint:** `/add-photo`
- **Descrição:** Esta rota faz uma requisição à The Cat API para obter uma única foto de gato. Após receber a imagem, verifica se o ID já existe no banco de dados. Caso o ID já esteja presente, busca outra imagem. Caso contrário, a imagem é salva.
- **Resposta de Sucesso:** `201 Created` com a informação da imagem adicionada.
- **Erro:** `409 Conflict` se a imagem já existe.

**Exemplo de uso:**
```bash
curl -X POST http://localhost:8000/api/cats/add-photo
```

### Rota: `GET /index`

Lista todas as fotos de gatos armazenadas no banco de dados, com paginação.

- **Método:** `GET`
- **Endpoint:** `/index`
- **Descrição:** Esta rota retorna uma lista paginada de todas as fotos de gatos presentes no banco de dados.
- **Parâmetros de Query Opcionais:**
  - `page`: Número da página desejada (exemplo: `?page=2`).
- **Resposta de Sucesso:** `200 OK` com uma lista paginada das fotos.

**Exemplo de uso:**
```bash
curl http://localhost:8000/images/index?page=2&per_page=9
```

## Testes Automatizados

Testes automatizados foram implementados utilizando o framework Pest, proporcionando uma cobertura ampla e verificações de qualidade no código da API. Esses testes garantem que os endpoints principais e funcionalidades críticas funcionem conforme esperado, minimizando riscos de regressão. A execução dos testes pode ser realizada com o comando:

```sh
./vendor/bin/pest
```

Os testes implementados incluem:

- **ImageServiceTest**: Verifica a funcionalidade de paginação das imagens e a resposta correta quando não há imagens.
- **TheCatServiceTest**: Testa a função de cadastro de imagens únicas e a persistência das mesmas no banco de dados.

[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/vbasilio/auto_insert_image_api/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/vbasilio/auto_insert_image_api/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/vbasilio/auto_insert_image_api/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/vbasilio/auto_insert_image_api/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/vbasilio/auto_insert_image_api/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/vinícius-basílio/
[product-screenshot]: images/screenshot.png
[PHP-badge]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.php.net/
[Docker-badge]: https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white
[Docker-url]: https://www.docker.com/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Pest-badge]: https://img.shields.io/badge/Pest-1E1E24?style=for-the-badge&logo=pestphp&logoColor=white
[Pest-url]: https://pestphp.com/

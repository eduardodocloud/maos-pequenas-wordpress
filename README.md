# Lar Mãos Pequenas — Tema WordPress

Tema WordPress customizado para o **Lar Assistencial Mãos Pequenas**, lar de acolhimento institucional de crianças e adolescentes localizado em Diadema/SP.

- 🌐 Site: [larmaospequenas.org.br](https://larmaospequenas.org.br/)
- 📧 Contato institucional: larmaospequenas@gmail.com
- 🏛️ CNPJ: 07.679.226/0001-00
- 📜 Utilidade Pública Municipal: 2877/09

---

## Estrutura

```
maos-pequenas-theme/
├── assets/
│   ├── css/main.css       # Estilos complementares
│   ├── images/            # Logo e ícones
│   └── js/main.js         # Slider, formulários AJAX, contadores
├── inc/                   # Includes auxiliares
├── template-parts/        # Partes reutilizáveis
├── front-page.php         # Home (hero slider + MVV + números + campanhas + apoio + parceiros + blog)
├── page-quem-somos.php
├── page-doacoes.php       # 3 caminhos: Dinheiro/Mantenedor/Suprimentos
├── page-seja-voluntario.php
├── page-parceiros.php
├── page-dados-aos-doadores.php  # Transparência (PDFs)
├── page-contato.php
├── page-como-acolhemos.php
├── header.php · footer.php
├── functions.php          # Customizer + handlers AJAX (contato/voluntário/parceiro)
├── style.css · theme.json
└── setup-wordpress.sh     # Script de instalação automática (WordPress + BD + páginas)
```

## Tecnologia

- WordPress (Classic + suporte a blocos via `theme.json`)
- PHP 7.4+ (testado com 8.2)
- Fontes: Nunito + Open Sans (Google Fonts)
- Sem dependências JS externas (vanilla JS)
- Sem framework CSS (variáveis CSS nativas)

## Instalação local

```bash
# Opção A — manual: apenas copiar o tema para um WordPress existente
cp -r maos-pequenas-theme /caminho/wp-content/themes/

# Opção B — automática: cria tudo do zero (WordPress + BD + páginas + posts + PDFs)
cd maos-pequenas-theme && bash setup-wordpress.sh
```

O script `setup-wordpress.sh` baixa o WordPress PT-BR, cria o banco MariaDB, instala o WordPress, copia o tema, cria as 8 páginas com os templates corretos, importa os PDFs de transparência (Estatuto + Balancetes — busca em `~/Desktop/site/`) e inicia um servidor PHP em `http://localhost:8080`.

**Requisitos:**
- PHP 7.4+ (recomendado 8.2)
- MariaDB ou MySQL
- WP-CLI (`wp` no PATH ou `~/Sites/wp-cli.phar`)

## Customizer — campos disponíveis

| Campo | Default |
|---|---|
| `mp_whatsapp` | (11) 4047-2289 |
| `mp_tel_1/2/3` | telefones reais |
| `mp_email` | larmaospequenas@gmail.com |
| `mp_endereco` | Estrada Nova Ipê, 440 — Diadema/SP |
| `mp_horario` | Seg-Sex, 9h-17h |
| `mp_cnpj` | 07.679.226/0001-00 |
| `mp_util_publica` | 2877/09 |
| `mp_doare_url` | URL da plataforma Doare |
| `mp_hero_titulo_1/2` | Títulos dos 2 banners da home |
| `mp_hero_texto_1/2` | Subtítulos dos 2 banners |

## Páginas criadas pelo setup

1. **Home** (`/`) — front-page.php
2. **Quem Somos** (`/quem-somos/`)
3. **Doações** (`/doacoes/`) — com âncoras `#dinheiro`, `#mantenedor`, `#suprimentos`
4. **Seja Voluntário** (`/seja-voluntario/`) — formulário completo + regras de visitação
5. **Parceiros** (`/parceiros/`) — grid de logos + formulário de cadastro
6. **Dados aos Doadores** (`/dados-aos-doadores/`) — Estatuto + Ata + Balancetes
7. **Blog** (`/blog/`)
8. **Contato** (`/contato/`)

## Licença

Uso restrito ao Lar Assistencial Mãos Pequenas.

---

🤝 Desenvolvido por [Comunicação Encantada](https://comunicacaoencantada.com.br)

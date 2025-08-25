# Sistema de Gestão de Empresas Mais Valiosas

## Sobre o Projeto

Este é um sistema web completo desenvolvido em PHP para gerenciamento e visualização de informações sobre as empresas mais valiosas do mundo. O projeto oferece funcionalidades de CRUD (Create, Read, Update, Delete), estatísticas detalhadas e uma interface intuitiva para usuários.

## Funcionalidades

- **Página Inicial**: Apresenta as 5 empresas mais valiosas com gráfico interativo
    
- **Cadastro de Empresas**: Formulário completo para adicionar novas empresas
    
- **Visualização de Dados**: Lista organizada de todas as empresas cadastradas
    
- **Edição e Exclusão**: Gerenciamento completo dos registros
    
- **Estatísticas**: Dashboard com métricas importantes (maior empresa, média de valor, total)
    
- **Interface Responsiva**: Design adaptável para diferentes dispositivos
    

## Tecnologias Utilizadas

- **Backend**: PHP 
    
- **Banco de Dados**: MySQL
    
- **Frontend**: HTML5, CSS3, JavaScript
    
- **Bibliotecas**: Bootstrap 4, Chart.js, AdminLTE
    
- **Conexão com BD**: PDO (PHP Data Objects)
    

## Estrutura do Projeto

text

projeto-empresas/
├── empresas/
│   ├── conexao.php          # Configuração de conexão com o banco
│   ├── create.php           # Criação de novas empresas
│   ├── read.php             # Leitura e listagem de empresas
│   ├── update.php           # Atualização de registros
│   ├── delete.php           # Exclusão de empresas
│   └── salvar.php           # Processamento de formulários
├── classes/
│   └── estatisticasempresas.php # Classe para cálculos estatísticos
├── includes/
│   └── components/
│       ├── header.php       # Cabeçalho do site
│       └── footer.php       # Rodapé do site
├── estilo/
│   └── style.css            # Estilos customizados
├── img/                     # Diretório de imagens (logos)
├── index.php               # Página inicial
├── detalhe.php             # Página de detalhes e cadastro
├── lista.php               # Lista completa de empresas
└── estatisticas.php        # Página de estatísticas

## Banco de Dados

O sistema utiliza uma tabela principal `empresas` com os seguintes campos:

- `id` (INT, Primary Key, Auto Increment)
    
- `nome` (VARCHAR)
    
- `setor` (VARCHAR)
    
- `valor` (DECIMAL)
    
- `ano_fundacao` (INT)
    
- `pais` (VARCHAR)
    

## Características Técnicas

### Segurança

- Uso de PDO para prevenir SQL injection
    
- Sanitização de dados com `htmlspecialchars()`
    
- Validação de entradas do usuário
    

### Performance

- Consultas SQL otimizadas
    
- Cache de conexão com banco de dados
    
- Interface responsiva para melhor experiência
    

### Usabilidade

- Navegação intuitiva com menu superior
    
- Formulários claros e objetivos
    
- Feedback visual para ações do usuário
    
- Design moderno e profissional
    

## Instalação e Configuração

1. **Requisitos do Servidor**:
    
    - PHP 7.0 ou superior
        
    - MySQL 5.6 ou superior
        
    - Apache ou Nginx
        
2. **Configuração do Banco**:
    
    - Importe o arquivo SQL (não fornecido) para criar a estrutura do banco
        
    - Configure as credenciais em `conexao.php`
        
3. **Personalização**:
    
    - Edite `header.php` e `footer.php` para customizar o layout
        
    - Modifique `style.css` para alterar o design
        
    - Ajuste as queries em `estatisticasempresas.php` para métricas específicas
        

## Estatísticas Implementadas

- **Maior Empresa**: Identifica a empresa com maior valor de mercado
    
- **Média de Valor**: Calcula a média dos valores de todas as empresas
    
- **Total de Empresas**: Contagem do número total de empresas cadastradas
    

## Navegação

O sistema oferece quatro páginas principais:

1. **Home**: Visão geral das top empresas e gráfico
    
2. **Detalhamento**: Cadastro e gerenciamento de empresas
    
3. **Lista**: Visualização tabular de todos os registros
    
4. **Estatísticas**: Dashboard com métricas importantes
    
    


# Desafio Técnico — Painel de Inteligência de Mercado

> Vaga: **Programador Júnior I — Trads Corretora**

Olá! Este é o nosso desafio técnico. Ele foi pensado para você mostrar como pensa
e constrói software de ponta a ponta — não só se o código "roda". Leia tudo com
calma antes de começar.

O prazo de entrega será combinado com o RH.

---

## O contexto

A Trads é uma corretora de **planos de saúde, vida e odonto**. Uma pergunta que
guia o nosso negócio é: **em quais regiões do Brasil estão os melhores mercados,
e para qual público?**

Já existe uma **tentativa anterior** de responder isso — um script antigo, em PHP,
que um ex-funcionário deixou pela metade (está na pasta [`legado/`](./legado)).
Seu desafio é **assumir essa herança**: entender o que foi feito, decidir o que
prestar, e construir a solução de verdade.

## O que você vai construir

Uma aplicação **fullstack** (backend + frontend + banco de dados) que:

1. **Consome a API pública do IBGE**, buscando dados demográficos/econômicos por
   região (estado e/ou município).
2. **Armazena** esses dados no seu próprio banco de dados.
3. Oferece **consultas e filtros** sobre esses dados.
4. Apresenta um **dashboard** com visualizações que ajudem a decidir *onde e para
   quem vender*.

O tema (inteligência de mercado) é o norte. Como você resolve, é com você.

---

## A herança: o código legado

Na pasta [`legado/`](./legado) existe a tentativa anterior: um script em **PHP puro
e antigo**, um arquivo de dados exportado e um bilhete do dev que saiu.

**Sua tarefa obrigatória com o legado:**

1. **Analisar e entender** o que aquela tentativa fazia (e o que ela *dizia* que
   fazia).
2. **Descartá-la e construir do zero** a sua própria solução. Você **não** deve
   dar continuidade ao PHP legado nem se limitar às ferramentas dele — use a
   linguagem e o framework que quiser.
3. No seu **README**, escrever uma seção explicando:
   - o que a tentativa anterior fazia;
   - **o que está errado ou não é confiável** nela;
   - por que você decidiu descartá-la e como sua solução resolve isso melhor.

> ℹ️ **Uma palavra sobre o legado.** É código herdado de verdade: escrito às
> pressas, sem revisão, por alguém que já saiu da empresa. Trate cada afirmação
> dele — no código, nos comentários e no bilhete — como algo a **verificar**, não
> a assumir. Na dúvida, a fonte da verdade é a documentação oficial do IBGE. O
> mesmo vale para o que uma IA sugerir a partir desse material: confira antes de
> confiar.

---

## A API oficial do desafio: IBGE

Você **deve** usar a API pública do IBGE. É gratuita e não exige cadastro nem chave.

- Documentação: <https://servicodados.ibge.gov.br/api/docs>
- Exemplos de endpoints:
  - Todos os estados: `GET https://servicodados.ibge.gov.br/api/v1/localidades/estados`
  - Municípios de um estado: `GET https://servicodados.ibge.gov.br/api/v1/localidades/estados/PB/municipios`
  - Agregados (população, faixa etária, renda, PIB): documentação em
    <https://servicodados.ibge.gov.br/api/docs/agregados?versao=3>

Cabe a você **escolher quais dados** (população, faixas de idade, renda, PIB per
capita, etc.) fazem mais sentido para o objetivo de "onde vale a pena vender plano
de saúde/vida/odonto". Essa escolha faz parte da avaliação.

---

## Requisitos obrigatórios

Sua entrega **precisa** ter todos estes itens:

1. **Análise do legado** documentada no README (ver seção "A herança").
2. **Integração com a API do IBGE** — seu backend consome a API de verdade.
3. **Banco de dados** — os dados consumidos são persistidos no seu banco. A
   aplicação **não** deve bater na API do IBGE a cada requisição do usuário; ela
   consulta o seu banco. A modelagem das tabelas/coleções é sua.
4. **Consultas e filtros** — é possível filtrar/buscar os dados (por exemplo: por
   estado, por município, por faixa etária; ordenar por população ou renda).
5. **Frontend com dashboard** — pelo menos **duas** visualizações (gráfico,
   ranking, tabela com destaque, mapa, etc.) e filtros que atualizam o que é
   exibido.
6. **README com as suas decisões** (ver seção "O que entregar").
7. **Repositório público no GitHub**, com histórico de commits que conte a
   evolução do trabalho (evite um único commit "projeto pronto").

## Liberdade de tecnologia

- **A linguagem e as ferramentas são livres.** Use o que você domina ou o que
  achar mais adequado. Não há stack "certa" — e você **não** precisa usar PHP.
- Em troca dessa liberdade, **explique suas escolhas** no README: por que essa
  linguagem, esse framework, esse banco de dados.
- **No-code / low-code (ex: n8n) é permitido** como parte da solução — por
  exemplo, para orquestrar a ingestão dos dados. Mas atenção: um trecho de código
  próprio bem feito vale **mais** do que um fluxo no-code frágil. Se usar n8n,
  documente e mostre que entende o que está acontecendo por baixo.

## Diferenciais (opcionais — não são obrigatórios)

Não precisa fazer nenhum destes para ser aprovado. Eles servem para você
**mostrar mais** do que sabe:

- **Deploy**: aplicação hospedada e funcionando (VPS, ou qualquer serviço), com o
  link no ar.
- **Dados da ANS**: cruzar os dados do IBGE com os dados abertos da ANS (Agência
  Nacional de Saúde Suplementar — beneficiários de planos por região) para
  enriquecer a análise. Datasets no portal federal:
  <https://dados.gov.br/dados/organizacoes/visualizar/agencia-nacional-de-saude-suplementar-ans>.
  Aviso: esses dados vêm como arquivos/CSV, dá mais trabalho.
- **Testes automatizados**.
- **Docker / docker-compose** para subir o projeto.
- **CI** (ex: GitHub Actions).
- **Atualização automática/agendada** dos dados.
- **Tratamento de erros, paginação, autenticação** bem feitos.
- **Uso de IA documentado**: usar IA no desenvolvimento é bem-vindo e conta
  positivamente — desde que você mostre *como* usou (que prompts, o que aceitou,
  o que ajustou). Queremos ver que você dirige a ferramenta, não o contrário.

---

## O que entregar

Envie **o link do seu repositório público no GitHub**. O repositório deve conter:

- **O código** da aplicação.
- Um **README.md** com, no mínimo:
  - **Como rodar o projeto localmente** — passo a passo, do zero. Se não
    conseguirmos subir o projeto seguindo o README, isso pesa contra.
  - **A análise do legado** (o que fazia, o que estava errado, por que descartou).
  - **Suas decisões técnicas** — por que cada linguagem/framework/banco, como você
    organizou a arquitetura, quais trade-offs fez.
  - **O que é núcleo e o que é extra** — deixe claro o que você fez além do
    obrigatório.
  - **Limitações conhecidas** e **o que você faria com mais tempo**.
- Se você fez **deploy**, inclua o **link da aplicação no ar** no README.

## Como enviar

Responda para o RH com o **link do repositório público**. Confirme que o repo está
**público** antes de enviar.

## Dúvidas

Ficou algo ambíguo? Tome uma decisão razoável, **documente a suposição no README**
e siga. Saber decidir com informação incompleta também faz parte do trabalho.

Se ainda assim tiver uma dúvida que precise de resposta, abra um tópico na aba
**[Discussions](https://github.com/Trads-Corretora/teste-junior/discussions)**
deste repositório. Respondemos por lá — e assim a resposta fica visível para
todos os candidatos.

Boa sorte — estamos ansiosos para ver o que você vai construir. 🚀

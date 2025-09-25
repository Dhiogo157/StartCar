<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>StartCar - Aluguel Inteligente</title>
    <link rel="stylesheet" href="estilos/index.css" />
</head>

<body>

    <header>
        <div class="container-cabecalho">
            <h1 class="logo">StartCar</h1>
            <nav class="nav">
                <a href="back/login.php">Login</a>
                <a href="back/cadastro.php">Cadastrar</a>
                <a href="back/contato.php">Contato</a>
            </nav>
        </div>
    </header>

    <main>
    <section class="veiculos">

        <a href="../veiculos/compacto.php">
            <div class="veiculo-card">
                <img src="imagens/Dolphin.webp" alt="Compacto Elétrico" />
                <h2>Compacto Elétrico</h2>
                <p>Carro urbano de pequenas dimensões, com autonomia para uso diário e design moderno e eficiente.</p>
            </div>
        </a>

        <a href="../veiculos/sedan.php">
            <div class="veiculo-card">
                <img src="imagens/Seal.png" alt="Sedan Elétrico" />
                <h2>Sedan Elétrico</h2>
                <p>Carro espaçoso e confortável, ideal para viagens e uso urbano, com boa autonomia e tecnologias avançadas.</p>
            </div>
        </a>

        <a href="../veiculos/suv.php">
            <div class="veiculo-card">
                <img src="imagens/Yuan.jpg" alt="SUV Elétrico" />
                <h2>SUV Elétrico</h2>
                <p>SUV espaçoso e confortável, ideal tanto para longas viagens quanto para o dia a dia, garantindo uma experiência premium e sustentável.</p>
            </div>
        </a>

    </section>
</main>

    <footer>
        <p>&copy; 2025 StartCar. Todos os direitos reservados.</p>
    </footer>

</body>

</html>

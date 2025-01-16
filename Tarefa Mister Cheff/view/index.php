<?php 
    include_once '../model/loja.class.php';
    $lojas = Loja::getAll();
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lojas</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700|Lato:400,700|Montserrat:400,700&display=swap">
        <link rel="stylesheet" href="../css/estilo.css">
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Página inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastroLoja.php">Cadastro de lojas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="box">
                <h3>Lista de Lojas</h3>
                <ol class="list-group list-group-numbered">
                    <?php foreach($lojas as $loja) { ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
    <div class="ms-2 me-auto">
        <div class="fw-bold"><?php echo $loja->getNome(); ?></div>
        <small>CNPJ: <?php echo $loja->getCnpj(); ?></small><br>
        <small>Email: <?php echo $loja->getEmail(); ?></small><br>
        <small>Contato: <?php echo $loja->getContato(); ?></small><br>
        <small>Endereço: <?php echo $loja->getRua() . ', ' . $loja->getNumero() . ', ' . $loja->getBairro() . ' - ' . $loja->getCidade() . ' - ' . $loja->getEstado(); ?></small><br>
        <small>CEP: <?php echo $loja->getCep(); ?></small><br>
        <small>Complemento: <?php echo $loja->getComplemento(); ?></small><br>
    </div>
    
    <!-- Flexbox para centralizar a logo -->
    <div class="d-flex justify-content-center align-items-center" style="flex: 1;">
        <img src="../img/<?php echo $loja->getLogo(); ?>" alt="Sem logo" style="max-width: 100px; height: auto;">
    </div>
    
    <button class="btn btn-outline-danger delete" data-id="<?php echo $loja->getId(); ?>">Excluir</button>
</li>


                    <?php } ?>
                </ol>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.querySelectorAll(".delete").forEach(function (link) {
                link.addEventListener("click", function (event) {
                    event.preventDefault();
                    const lojaId = this.getAttribute("data-id");

                    Swal.fire({
                        title: 'Deletar loja?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../controller/loja.php?acao=deletar&id=' + lojaId;
                        }
                    });
                });
            });
        </script>
    </body>
</html>

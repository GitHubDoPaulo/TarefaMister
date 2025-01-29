<?php 
    include_once '../model/loja.class.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de empresas</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700|Lato:400,700|Montserrat:400,700&display=swap">

        <link rel="stylesheet" href="../css/estilo.css">
       
    </head>
    <body style="background-color: #e66f00">
        <nav class="navbar navbar-expand-lg navbar-custom" style="background-color:white">
            <div class="container-fluid">
                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../view/index.php">Página inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/cadastroLoja.php">Cadastro de lojas</a>
                        </li>
                    </ul>
                    <img src="../img/Mistercheff.png" style="height: 55px; width: 110px; margin-right: 70x" >
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="box">
                <h3>Cadastrar loja</h3>
                <form
                    action="../controller/loja.php?acao=cadastrar"
                    method="post"
                    enctype="multipart/form-data"
                    id="meuFormulario">

                    <div class="row">
                        <div class="col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Nome da loja"
                                name="nome"
                                aria-label="nome"
                                required="required">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                name="cnpj"
                                class="form-control"
                                placeholder="CNPJ"
                                aria-label="cnpj"
                                required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                aria-label="email"
                                required="required">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Contato (telefone/celular)"
                                name="contato"
                                aria-label="contato"
                                required="required">
                        </div>
                        <div class="row">
                        ENDEREÇO:
                        <div class="row">

                    </div>

                    <div class="row">
                        <div class="col">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="CEP"
                                name="cep"
                                aria-label="cep"
                                required="required">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                name="rua"
                                class="form-control"
                                placeholder="Rua"
                                id="rua"
                                required="required">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                name="numero"
                                class="form-control"
                                placeholder="Número"
                                id="numero"
                                required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input
                                type="text"
                                name="complemento"
                                class="form-control"
                                placeholder="Complemento (opcional)"
                                id="complemento">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                name="bairro"
                                class="form-control"
                                placeholder="Bairro"
                                id="bairro"
                                required="required">
                        </div>
                        <div class="col">
                            <input
                                type="text"
                                name="cidade"
                                class="form-control"
                                placeholder="Cidade"
                                id="cidade"
                                required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input
                                type="text"
                                name="estado"
                                class="form-control"
                                placeholder="Estado"
                                id="estado"
                                required="required">
                        </div>
                    </div>

                    <div class="custom-file">
                        <input
                            type="file"
                            class="form-control"
                            id="logo"
                            name="logo"
                            accept="image/*"
                            style="display: none;">
                        <label class="custom-file-label" id="logoLabel" for="logo">Escolher logo da loja</label>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button style="background-color: #399200" class="btn btn-primary" type="submit" value="Cadastrar">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.getElementById("logo").addEventListener("change", function(event) {
    var fileName = event.target.files[0].name;
    var label = document.getElementById("logoLabel");
    label.textContent = fileName;
});
            function alertSuc() {
                Swal.fire(
                    {title: 'Loja registrada com sucesso!', icon: 'success', confirmButtonText: 'OK'}
                )
                window.location.href = '../view/index.php';

            };

            <?php
                if(isset($_SESSION['confirmar']) && $_SESSION['confirmar']){
                    echo '<script> alertSuc(); </script>';
                    $_SESSION['confirmar'] = false;
                }
            ?>
 
        </script>

<script>
    document.querySelector('input[name="numero"]').addEventListener("input", function() {
        let numero = this.value.replace(/\D/g, ''); 
        this.value = numero; 
    });

    document.querySelector('input[name="estado"]').addEventListener("input", function() {
        let estado = this.value.replace(/[^A-Za-z\s]/g, ''); 
        this.value = estado.toUpperCase(); 
    });

    function formatarCNPJ(cnpj) {
        cnpj = cnpj.replace(/\D/g, ''); 
        if (cnpj.length <= 2) {
            return cnpj.replace(/(\d{2})/, "$1");
        }
        if (cnpj.length <= 5) {
            return cnpj.replace(/(\d{2})(\d{3})/, "$1.$2");
        }
        if (cnpj.length <= 8) {
            return cnpj.replace(/(\d{2})(\d{3})(\d{3})/, "$1.$2.$3");
        }
        if (cnpj.length <= 12) {
            return cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})/, "$1.$2.$3/$4");
        }
        return cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    }

    function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, ''); // Remove qualquer caractere não numérico

    // Se o telefone tiver menos de 2 caracteres, apenas exibe o DDD
    if (telefone.length <= 2) {
        return telefone.replace(/(\d{2})/, "$1");
    }

    // Se o telefone tiver entre 3 e 7 caracteres, formate como xx xxxxx
    if (telefone.length <= 7) {
        return telefone.replace(/(\d{2})(\d{5})/, "$1 $2");
    }

    // Se o telefone tiver mais de 7 caracteres, formate como xx xxxxx xxxx
    return telefone.replace(/(\d{2})(\d{5})(\d{4})/, "$1 $2 $3");
}

document.querySelector('input').addEventListener('input', function(e) {
    let telefone = e.target.value;
    telefone = formatarTelefone(telefone);

    // Mantém o valor formatado
    e.target.value = telefone;
});






    function formatarCEP(cep) {
        cep = cep.replace(/\D/g, ''); 
        if (cep.length <= 5) {
            return cep.replace(/(\d{5})/, "$1-");
        }
        return cep.replace(/(\d{5})(\d{3})/, "$1-$2");
    }

    document.querySelector('input[name="cnpj"]').addEventListener("input", function() {
        let cnpj = this.value.replace(/\D/g, ''); 
        if (cnpj.length > 14) {
            cnpj = cnpj.substring(0, 14); 
        }
        this.value = formatarCNPJ(cnpj);
        if (cnpj.length === 14) {
            this.setCustomValidity(""); 
        } else {
            this.setCustomValidity("CNPJ deve ter exatamente 14 caracteres.");
        }
    });

    document.querySelector('input[name="contato"]').addEventListener("input", function() {
        let telefone = this.value.replace(/\D/g, ''); 
        if (telefone.length > 11) {
            telefone = telefone.substring(0, 11); 
        }
        this.value = formatarTelefone(telefone);
    });

    document.querySelector('input[name="cep"]').addEventListener("input", function() {
        let cep = this.value.replace(/\D/g, ''); 
        if (cep.length > 8) {
            cep = cep.substring(0, 8); 
        }
        this.value = formatarCEP(cep);
    });

    document.getElementById("meuFormulario").addEventListener("submit", function(event) {
        const cnpj = document.querySelector('input[name="cnpj"]').value.replace(/\D/g, '');
        const telefone = document.querySelector('input[name="contato"]').value.replace(/\D/g, '');
        const cep = document.querySelector('input[name="cep"]').value.replace(/\D/g, '');
        const numeroRua = document.querySelector('input[name="numero"]').value;
        const estado = document.querySelector('input[name="estado"]').value;

        if (cnpj.length !== 14) {
            event.preventDefault();
            alert("O CNPJ deve ter exatamente 14 caracteres.");
            return;
        }

        if (telefone.length !== 11) {
            event.preventDefault();
            alert("O telefone deve ter exatamente 11 caracteres.");
            return;
        }

        if (cep.length !== 8) {
            event.preventDefault();
            alert("O CEP deve ter exatamente 8 caracteres.");
            return;
        }

        if (!/^\d+$/.test(numeroRua)) {
            event.preventDefault();
            alert("O número da rua deve conter apenas números.");
            return;
        }

        if (!/^[A-Za-z\s]+$/.test(estado)) {
            event.preventDefault();
            alert("O estado deve conter apenas letras.");
            return;
        }
    });
</script>



    </body>
</html>

<?php
session_start();
$acao = $_GET['acao'];

include_once '../model/loja.class.php';
include_once '../view/cadastroLoja.php';



    if ($acao == 'cadastrar'){
        $loja = new Loja();
        $loja->setNome($_POST['nome']);
        $loja->setCnpj($_POST['cnpj']);
        $loja->setEmail($_POST['email']);
        $loja->setContato($_POST['contato']);
        $loja->setCep($_POST['cep']);
        $loja->setRua($_POST['rua']);
        $loja->setNumero($_POST['numero']);
        $loja->setComplemento($_POST['complemento']);
        $loja->setBairro($_POST['bairro']);
        $loja->setCidade($_POST['cidade']);
        $loja->setEstado($_POST['estado']);

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
            $nomeArquivo = $_FILES['logo']['name'];
            $caminhoTemp = $_FILES['logo']['tmp_name'];
            $diretorioDestino = '../img/';
            
            // Verifique se a pasta de destino existe e tem permissões adequadas
            if (!is_dir($diretorioDestino)) {
                mkdir($diretorioDestino, 0777, true);
            }

            // Mover o arquivo para a pasta de destino
            $caminhoFinal = $diretorioDestino . basename($nomeArquivo);
            if (move_uploaded_file($caminhoTemp, $caminhoFinal)) {
                echo "Arquivo enviado com sucesso!";
            } else {
                echo "Falha no envio do arquivo.";
            }
        } else {
            echo "Insira uma imagem.";
        }
        $loja->setLogo($caminhoFinal);
        
       
        $resultado = $loja->save();

        if ($resultado === false) {
            echo '<script>alert("Erro ao salvar loja.");</script>';
            echo '<script>window.history.back();</script>';
        } else {
            $_SESSION['confirmar'] = true;
            echo '<script>location.href="../view/cadastroLoja.php";</script>';
        }
    }
     else if($acao == 'deletar'){
        Loja::deletar($_REQUEST['id']);
        echo '<script>location.href="../view/index.php";</script>';       
    } 
?>
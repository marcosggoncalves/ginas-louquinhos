<?php	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?=base_url('public/vendor/main.min.js') ?>"></script>
	<script src="<?=base_url('public/vendor/FileSaver.min.js') ?>"></script>
	<script src="<?=base_url('public/vendor/jszip-utils.js') ?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/termo.js')?>"></script>
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div id="messagem" title="Deseja excluir atleta?">
			<p>Atleta será excluido do banco de dados.</p>
		</div>
		<div class="container">
			<div class="container-titulo">
				<h1>Atletas (<b><?=$total ?></b> - atletas)</h1>
			</div>
			<?php if($this->session->flashdata('messagem')): ?>
				<div class="erros">
					<p><?=$this->session->flashdata('messagem') ?></p>
				</div>
			<?php endif;  ?>
			<details>
				<summary>Filtrar atletas</summary>
				<div class="container-filter">
					<form  action="<?=base_url('filtro/pesquisa');?>" method="post">
						<div class="container-input">
							<div>
								<select name="tipo_pesquisa">
									<option>Selecionar pesquisa</option>
									<option>Horário inicio</option>
									<option>Periodo</option>
									<option>Dias da semana</option>
									<option>Professor(a)</option>
									<option>Data nascimento</option>
									<option>Sexo</option>
									<option>Unidade</option>
									<option>Atleta</option>
									<option value="Escola">Escola</option>
								</select>
							</div>
							<div>
								<input type="text" name="pesquisa" placeholder="Exemplo de pesquisa: Data de nascimento 1999-02-12, Sexo: Masculino ou Feminino e Unidade">
							</div>
							<input type="submit" value="Filtrar" >
						</div>
					</form>
				</div>
			</details>
			<?php  foreach ($atletas as $atleta):?>
				<div>
					<button class="accordion"><?=$atleta->nome_atleta?></button>
					<div class="panel">
					  <ul>
					  	<li>Unidade: <?=$atleta->polo_unidade?></li>
					  	<li>Nome completo: <?=$atleta->nome_atleta?></li>
						<li>RG: <?=$atleta->rg_atleta?></li>
						<li>CPF: <?=$atleta->cpf_atleta?> </li>
						<li>Data Nascimento: <?=date('d/m/Y', strtotime($atleta->data_nascimento_atleta));?> </li>
						<li>Sexo: <?=$atleta->sexo_atleta?> </li>
						<li>Nome responsável: <?=$atleta->responsavel?> </li>
						<li>CPF responsável: <?=$atleta->cpf_responsavel?> </li>
						<li>E-mail responsável:<?=$atleta->email_responsavel?> </li>
						<li>Parentesco: <?=$atleta->parentesco_responsavel?> </li>
						<li>RG responsável: <?=$atleta->rg_responsavel?></li> 
						<li>Contato: <?=$atleta->cel_responsavel?></li>
						<li>Data efetuado em: <?=date('d/m/Y', strtotime($atleta->data_cadastro));?></li>
						<li>Instituição de ensino: <?=$atleta->nome_instituicao_ensino?></li>  
						<li>Professor(a) turma: <?=$atleta->nome_professor?></li>
						<li>Autorizo a sua participação nas aulas de Ginástica Artística do Projeto Ginas louquinhos nos <b>dias:</b> <?=$atleta->dias_semanais?> <b>Horário</b> <?=$atleta->horario_inicio?> às  <?=$atleta->horario_final?> no periodo <?=$atleta->turno?>.</li>
						<li class="btns">
							<a onclick="excluir('<?=base_url("atleta/deletar/$atleta->id_aluno_atleta")?>')">Excluir Atleta</a>
							<a href="<?=base_url("atleta/editar/$atleta->id_aluno_atleta");?>">Alterar dados</a>
							<a onclick='print_termo(<?=json_encode($atleta)?>)'>Imprimir termo</a>
						</li>
					 </ul>
					</div>
				</div>
			<?php endforeach ?>
			<div class="container-btns">
				<div class="pagination">
					<?php if(!empty($links)): ?>
					<p><?=$links; ?></p>
					<?php endif; ?>	
				</div>
				<div class="btn-container">
					<a href="<?=base_url('atleta/cadastro')?>">Cadastrar atleta</a>
					<a href="<?=base_url('painel/relatorio-geral') ?>"> Relatório geral</a>
					<a href="<?=base_url('painel/relatorios') ?>">Relatórios - registros</a>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>

</body>
</html>
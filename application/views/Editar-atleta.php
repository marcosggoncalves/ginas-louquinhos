<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar - Ginas Louquinhos</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?=base_url('public/img/índice.png');?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href='<?=base_url('public/css/style.css');?>'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include('public/componentes/validar_login.inc.php');?>
</head>
<body>
	<?php include('public/componentes/header.inc.php');?>
	<main>
		<div class="container">
			<div class="titulação-form">
				<h1>TERMO DE AUTORIZAÇÃO, RESPONSABILIDADES E CESSÃO DE DIREITOS DO ALUNO / ATLETA</h1>
			</div>
			<form method="post" action="<?=base_url('atleta/editar/salvar/'.$atleta[0]->id_aluno_atleta.'');?>">
				<div class="container-divisão-form">
					<legend>Dados Cadastrais do Aluno-atleta</legend>
					<div class="container-input">
						<label for="nome_atleta">Nome:</label>
						<input type="text" name="nome_atleta" id="nome_atleta" value="<?=$atleta[0]->nome_atleta ?>">
					</div>
					<div class="container-input">
						<label for="rg_atleta">RG:</label>
						<input type="text" name="rg_atleta" id="rg_atleta" value="<?=$atleta[0]->rg_atleta ?>">
					</div>
					<div class="container-input">
						<label for="cpf_atleta">CPF:</label>
						<input type="text" maxlength="15" name="cpf_atleta" id="cpf_atleta" value="<?=$atleta[0]->cpf_atleta ?>">
					</div>
					<div class="container-input">
						<label for="data_nascimento_atleta">Data nascimento:</label>
						<input type="date" name="data_nascimento_atleta" id="data_nascimento_atleta" value="<?=$atleta[0]->data_nascimento_atleta ?>">
					</div>
					<div class="container-input">
						<label for="sexo_atleta">Sexo:</label>
						<select name="sexo_atleta" id="sexo_atleta">
							<option value="<?=$atleta[0]->sexo_atleta ?>"><?=$atleta[0]->sexo_atleta ?></option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>
					</div>
					<div class="container-input">
						<label for="id_instituicao_ensino">Instituição de ensino:</label>
						<select name="id_instituicao_ensino" id="id_instituicao_ensino">
							<option value="<?=$atleta[0]->id_instituicao_ensino ?>"><?=$atleta[0]->nome_instituicao_ensino ?></option>
							<?php foreach ($instituicao_ensino as $ensino):?>

								<option value="<?=$ensino->id_instituicao_ensino?>"><?=$ensino->nome_instituicao_ensino?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="container-divisão-form">
					<legend>Dados Cadastrais do Responsável Legal</legend>
					<div class="container-input">
						<label for="Responsavel">Responsável</label>
						<input type="text" name="Responsavel" id="Responsavel" value="<?=$atleta[0]->responsavel ?>">
					</div>
					<div class="container-input">
						<label for="rg_responsavel">RG:</label>
						<input type="text" name="rg_responsavel" id="rg_responsavel" value="<?=$atleta[0]->rg_responsavel ?>">
					</div>
					<div class="container-input">
						<label for="parentesco_responsavel">Parentesco:</label>
						<input type="text" name="parentesco_responsavel" id="parentesco_responsavel" value="<?=$atleta[0]->parentesco_responsavel ?>"  >
					</div>
					<div class="container-input">
						<label for="cpf_responsavel">CPF:</label>
						<input type="text" name="cpf_responsavel" maxlength="15" id="cpf_responsavel" value="<?=$atleta[0]->cpf_responsavel ?>" >
					</div>
					<div class="container-input">
						<label for="email_responsavel">Email:</label>
						<input type="email" name="email_responsavel" id="email_responsavel" value="<?=$atleta[0]->email_responsavel ?>" required>
					</div>
					<div class="container-input">
						<label for="cel_responsavel">Cel:</label>
						<input type="text" name="cel_responsavel" id="cel_responsavel" value="<?=$atleta[0]->cel_responsavel ?>">
					</div>
				</div>
				<div class="container-divisão-form">
					<p>Autorizo a sua participação nas aulas de Ginástica Artística do Projeto Ginaslouquinhos nos:</p>
					<div class="container-divisão-form">
						<label>Dias/Horário:</label>
						<div class="container-input">
							<select name="id_turma">
								<option value="<?=$atleta[0]->id_turma ?>">Turma atual: (Professor:(<?=$atleta[0]->nome_professor?>) - Dias: (<?=$atleta[0]->dias_semanais?>)  Unidade:(<?=$atleta[0]->polo_unidade?>)
										Horário: (<?=$atleta[0]->horario_inicio?> às <?=$atleta[0]->horario_final?>) - Periodo: (<?=$atleta[0]->turno?>))</option>
								<?php foreach ($turmas as $turma):?>
									<option value="<?=$turma->id_turma ?>">Professor:(<?=$turma->nome_professor?>) -  Dias:(<?=$turma->dias_semanais?>) - Unidade:(<?=$turma->polo_unidade?>)
										Horário: (<?=$turma->horario_inicio?> às <?=$turma->horario_final?>) - Periodo: (<?=$turma->turno?>)</option>
							    <?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="container-input">
					<input type="submit" value="Editar atleta">
				</div>
			</form>
		</div>
	</main>
	<script type="text/javascript" src="<?=base_url('public/js/card.js')?>"></script>

</body>
</html>
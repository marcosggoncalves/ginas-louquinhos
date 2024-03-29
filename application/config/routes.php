<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$route['default_controller'] = 'login';
	$route['entrar'] = 'login/entrar';
	$route['suporte'] = 'suporte';
	$route['sair'] = 'login/sair';
	$route['instituicoes'] = 'instituicao';
	$route['instituicao/cadastrar'] = 'instituicao/Cadastro_instituicao';
	$route['instituicao/editar/(:any)'] = 'instituicao/editar_instituicao/$1';
	$route['instituicao/editar/salvar/(:any)'] = 'instituicao/editar_salvar_instituicao/$1';
	$route['instituicao/cadastrar/salvar'] = 'instituicao/salvar_instituicao';
	$route['instituicao/deletar/(:any)'] = 'instituicao/deletar_instituicao/$1';
	$route['usuarios/cadastrar'] = 'usuarios/Cadastrar_usuario';
	$route['usuarios/deletar/(:any)'] = 'usuarios/deletar_atleta/$1';
	$route['usuarios/cadastrar/salvar'] = 'usuarios/salvar_usuario';
	$route['painel'] = 'painel';
	$route['painel/(:num)'] = 'painel';
	$route['unidades'] = 'polos';
	$route['unidades/cadastrar'] = 'polos/Cadastro_polo_unidade';
	$route['unidades/cadastrar/salvar'] = 'polos/salvar_polo_unidade';
	$route['unidades/deletar/(:any)'] = 'polos/deletar_polo_unidade/$1';
	$route['unidades/editar/(:any)'] ='polos/editar_polo_unidade/$1';
	$route['unidades/editar/salvar/(:any)'] ='polos/editar_polo_unidade_salvar/$1';
	$route['filtro/pesquisa'] = 'painel/filtro';
	$route['filtro/pesquisa/relatorio'] = 'painel/filtro_relatorios';
	$route['filtro/pesquisa/relatorio/idade'] = 'painel/filtro_relatorio_idade';
	$route['atleta/cadastro'] = 'cadastro';
	$route['atleta/cadastro/salvar'] = 'cadastro/salvar_atleta';
	$route['atleta/deletar/(:any)'] ='cadastro/deletar_atleta/$1';
	$route['atleta/editar/(:any)'] ='cadastro/editar_atleta/$1';
	$route['atleta/editar/salvar/(:any)'] ='cadastro/editar_salvar_atleta/$1';
	$route['painel/relatorios'] = 'painel/Relatorios';
	$route['painel/relatorio-geral'] = 'painel/relatorio_geral';
	$route['professores'] = 'professores';
	$route['professores/cadastrar'] = 'professores/Cadastro_professor';
	$route['professores/cadastrar/salvar'] = 'professores/salvar_professor';
	$route['professores/deletar/(:any)'] = 'professores/deletar_professor/$1';
	$route['professores/editar/(:any)'] ='professores/editar_professor/$1';
	$route['professores/editar/salvar/(:any)'] ='professores/editar_salvar_professor/$1';
	$route['turmas'] = 'turmas';
	$route['turmas/cadastro'] = 'turmas/Cadastro_turma';
	$route['turmas/cadastro/salvar'] = 'turmas/salvar_turma';
	$route['turmas/deletar/(:any)'] ='turmas/deletar_turma/$1';
	$route['turmas/editar/(:any)'] ='turmas/editar_turma/$1';
	$route['turmas/editar/salvar/(:any)'] ='turmas/editar_turma_salvar/$1';
	$route['turmas/pesquisa'] = 'turmas/filtro_turma';
	$route['turmas/lista-alunos/(:any)'] = 'turmas/lista_turmas/$1';
	$route['turmas/relatorio/aluno/(:any)'] = 'turmas/alunos_turma/$1';
	$route['turmas/ficha-chamada/(:any)'] = 'turmas/chamada_gerar/$1';
	$route['turmas/ficha/(:any)'] = 'turmas/chamada_aluno/$1';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;
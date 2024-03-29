<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	public function index()
	{
		$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
		$polos_unidades = $this->Dao_polos->polos_unidades();
		$turmas = $this->Dao_atleta->turmas();
		$data = array('turmas'=>$turmas,'instituicao_ensino'=>$instituicao_ensino,'polos_unidades'=>$polos_unidades);
		$this->load->view('Cadastro-atleta',$data);
	}
	public function deletar_atleta($id)
	{
		$consulta = $this->Dao_atleta->deletar_atleta($id);
		$this->session->set_flashdata('messagem', 'Atleta deletado com sucesso.');
		redirect('/painel');
	}
	public function editar_atleta($id)
	{
		$consulta = $this->Dao_atleta->editar_atleta($id);
		$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
		$polos_unidades = $this->Dao_polos->polos_unidades();
		$turmas = $this->Dao_atleta->turmas();
		$data = array('atleta'=>$consulta,'turmas'=>$turmas,'instituicao_ensino'=>$instituicao_ensino,'polos_unidades'=>$polos_unidades);
		$this->load->view('Editar-atleta',$data);
	}
	public function editar_salvar_atleta($id)
	{
		if($this->input->post('id_turma') == ''){
			$this->session->set_flashdata('messagem', 'Selecione uma turma, para fazer alteração dos dados');
			redirect('/painel');
		}else{
			$consulta = $this->Dao_turmas->editar_turma($this->input->post('id_turma'));

			if($consulta[0]->quantidade_vagas == null){
				$this->Dao_atleta->update_atleta($this->input->post(),$id);
				$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
				redirect('/painel');
			}elseif(qtd_alteta_turma($this->input->post('id_turma')) >= $consulta[0]->quantidade_vagas){
				$this->session->set_flashdata('messagem', 'Turma lotada, por favor selecione outra.');
				redirect('/painel');
			}else{
				$this->Dao_atleta->update_atleta($this->input->post(),$id);
				$this->session->set_flashdata('messagem', 'Informações alteradas com sucesso.');
				redirect('/painel');
			}
		}
	}
	public function salvar_atleta()
	{
			$this->form_validation->set_rules('nome_atleta','Nome completo','required');
			$this->form_validation->set_rules('rg_atleta','RG','required');
			$this->form_validation->set_rules('cpf_atleta','CPF','required|min_length[8]');
			$this->form_validation->set_rules('data_nascimento_atleta','Data nascimento','required');
			$this->form_validation->set_rules('responsavel','Nome responsável','required');
  			$this->form_validation->set_rules('sexo_atleta', 'Sexo atleta','required');
  			$this->form_validation->set_rules('id_instituicao_ensino', 'Instituição de ensino','required');
			$this->form_validation->set_rules('cpf_responsavel','CPF responsável','required|min_length[8]');
			$this->form_validation->set_rules('email_responsavel','E-mail responsável','required');
			$this->form_validation->set_rules('parentesco_responsavel' ,'parentesco responsável','required');
			$this->form_validation->set_rules('rg_responsavel','RG responsável','required');
			$this->form_validation->set_rules('cel_responsavel','Celular responsável','required');
			$this->form_validation->set_rules('id_turma','Selecione a turma para participação','required');
			$this->form_validation->set_rules('data_cadastro','Data cadastro','required');
			
			if($this->form_validation->run() == FALSE){
				$instituicao_ensino = $this->Dao_atleta->Todos_instituicao_ensino(); 
				$polos_unidades = $this->Dao_polos->polos_unidades();
				$turmas = $this->Dao_atleta->turmas();
				$data = array('turmas'=>$turmas,'instituicao_ensino'=>$instituicao_ensino,'polos_unidades'=>$polos_unidades);
				$this->load->view('Cadastro-atleta',$data);
			}else{
				$turma_qtd = $this->Dao_atleta->turma($this->input->post('id_turma'));
				if(qtd_alteta_turma($this->input->post('id_turma')) == $turma_qtd[0]->quantidade_vagas){
					$this->session->set_flashdata('messagem', 'Não foi possivel cadastrar atleta nessa turma, atletas suportados é de:'.$turma_qtd[0]->quantidade_vagas);
					redirect('/atleta/cadastro');
				}else{
					$this->Dao_atleta->salvar_atleta($this->input->post());
					$this->session->set_flashdata('messagem', 'Atleta registrado com sucesso.');
					redirect('/atleta/cadastro');
				}
			}
	}
}

<?php 

$hierarquia = array(
	array(
		'nome_cargo'=>'CEO',
		'subordinados'=>array(
			//Inicio: Diretor Comercial
			array(
				  'nome_cargo'=>'Diretor Comercial',
				  'subordinados'=>array(
				  	//Inicio Gerente de Vendas
				  	array(
				  		'nome_cargo'=>'Gerente de Vendas'
				  	)
				  	//Termino: Gerente de Vendas
				)
			),
			//Termino: Diretor Comercial
			//Inicio: Diretor Financeiro
			array(
				'nome_cargo'=>'Diretor Financeiro',
				'subordinados'=>array(
					//Inicio Gerente de Contas a Pagar
					array(
						'nome_cargo'=>'Gerente de Contas a Pagar',
						'subordinados'=>array(
							//Inicio: Supervisor de pagamentos
							array(
							'nome_cargo'=>'Supervisor de Pagamentos'
							)
							//Termino: Supervisor de Pagamentos
						)
					),
					//Termino: gerente de contas a pagar
					//Inicio: Gerente de compras
					array(
						'nome_cargo'=>'Gerente de compras',
						'subordinados'=>array(
							//Inicio: Supervisor de Suporte
							array(
								'nome_cargo'=>'Supervisor´de suprimentos'
							)
							//Termino: Supervisor de Suprimentos
						)
					)
					//Termino: Gerente de Compras
				)
			)
			//Termino: Diretor Financeiro
		)
	)

);

echo "<pre>";
var_dump($hierarquia);
echo "</pre>";
?>
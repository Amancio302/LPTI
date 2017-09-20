<?php defined('BASEPATH') or exit('No direct script access allowed');

class Importacao extends CI_Controller {

	public function csv() {
		header('Content-Type: application/excel');
		header('Content-Disposition: attachment; filename="sampley.csv"');	
	}
	
	public function excel($id) {
		$html = "<table>
						<tr>
        				<td><b>Matricula</b></td>        
        				<td></td>        
       				<td><b>Nome</b></td>
       				<td></td>
       				<td><b>Situacao</b></td>
       				<td></td>
       				<td><b>Turma</b></td>
       				<td></td>        
    			    </tr>					 
					 <tr>
        				<td></td>        
        				<td>;</td>        
       				<td></td>
       				<td>;</td>
       				<td>1</td>
       				<td>;</td>
       				<td>".$id."</td>
       				<td>;</td>        
    			    </tr>
    			    </table>";

		// Configurações header para forçar o download
		header ('Content-type: application/x-msexcel');
		header ('Content-Disposition: attachment; filename="nome_arquivo.xls"' );

		echo $html;	
	}
}

<?php
$filename="ListagemdeAlunos.csv";
	if(file_exists($filename)){
		$file = fopen($filename,"r");
		$headers = explode (";",srt_replace("\n","", fgets($file)));
		$data = array();
		
		while($row = fgets($file)){
			$rowdata = explode(";",srt_replace("\n","", $row));
			$linha = array();
			
			for ($i = 0; $i<$count($headers);$i++){
				$linha[$headers[$i]] = $rowdata[$i];				
			}
			array_push($data,$linha);
	} 
	echo json_encode($data);
	
	fclose($file);
?>

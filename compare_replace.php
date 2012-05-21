<?php 

if ($dataRecord['compare_'.$i] == '='){
	if ($dataRecord['field_'.$i] == 'Collector'){
		$compareSymbol[$i] = "LIKE '%";
		$where[$i] = 'WHERE';
		$persen[$i] = "%'";
		
	}else{ 
		$compareSymbol[$i] = '=';
		$where[$i] = 'WHERE';
		$persen[$i] = '';
	}
}
if ($dataRecord['compare_'.$i] == '<>'){ 
	if ($dataRecord['field_'.$i] == 'Collector'){
		$compareSymbol[$i] = "NOT LIKE '%";
		$where[$i] = 'WHERE';
		$persen[$i] = "%'";
		
	}else{ 
		$compareSymbol[$i] = '!=';
		$where[$i] = 'WHERE';
		$persen[$i] = '';
	}
}
if ($dataRecord['compare_'.$i] == 'is null'){
			
	$compareSymbol[$i] = ' = null';
	$where[$i] = 'WHERE';
	$persen[$i] = '';
}
if ($dataRecord['compare_'.$i] == 'is not null'){
			
	$compareSymbol[$i] = '';
	$where[$i] = 'ORDER BY';
	$persen[$i] = '';
}



?>

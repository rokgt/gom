<?php
$i=1;
$file= fopen("19.txt", "a");//파일 오픈
while ($i<=19){
	$o=1;
	
	while($o<=9){
		$p=$i*$o;
	// echo "{$i}X{$o}={$p}\n";
	fputs($file,"{$i}X{$o}={$p}\n");//파일에 작성
	$o++;}
	$i++;
	
}
fclose($file);//파일 닫음
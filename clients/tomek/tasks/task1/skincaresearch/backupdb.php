<?php
function mail_attachment ($from , $to, $subject, $message, $attachment){
$fileatt = $attachment; // Path to the file
$fileatt_type = "application/octet-stream"; // File Type
$start= strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the attachment

$email_from = $from; // Who the email is from
$email_subject = $subject; // The Subject of the email
$email_txt = $message; // Message that the email has in it

$email_to = $to; // Who the email is to

$headers = "From: ".$email_from."
";
//$headers = "From: ".$email_from;

$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);
$msg_txt="";

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers .= "Bcc: ";
$headers .= "
MIME-Version: 1.0
" .
"Content-Type: multipart/mixed;
" .
" boundary=\"{$mime_boundary}\"";

$email_txt .= $msg_txt;

$email_message .= "This is a multi-part message in MIME format.

" .
"--{$mime_boundary}
" .
"Content-Type:text/html; charset=\"iso-8859-1\"
" .
"Content-Transfer-Encoding: 7bit

" .
$email_txt . "

";

$data = chunk_split(base64_encode($data));

$email_message .= "--{$mime_boundary}
" .
"Content-Type: {$fileatt_type};
" .
" name=\"{$fileatt_name}\"
" .
"Content-Transfer-Encoding: base64

" .
$data . "

" .
"--{$mime_boundary}--
";

$ok = mail($email_to, $email_subject, $email_message, $headers);

if($ok)
{
}

else
{
// print "<b>Sorry Could not send</b>";
}
}

$webroot = $_SERVER['DOCUMENT_ROOT'].'/';
//chdir($webroot.'/cmsAdmin/');
 
ini_set('memory_limit','726M');
ini_set('max_execution_time', 3200);
backup_tables('localhost','trustgua_wpuser','r6uuPGW3Uu','trustgua_wp');


/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	$return.='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";'.";\n\n";
	//cycle through
	foreach($tables as $table)
	{
		
		$return.= 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
	
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		$return .= 'LOCK TABLES `'.$table.'` WRITE;'.";\n\n";
		for ($i = 0; $i < $num_fields; $i++) 
		{
			
			while($row = mysql_fetch_row($result))
			{
				
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
			

		}
		$return .= 'UNLOCK TABLES'.";\n\n";
		$return.="\n\n\n";
	}
	
	//save file
	//$handle = fopen($webroot.'/cmsAdmin/backups/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	$filename = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
	
	$handle = fopen($webroot.$filename,'w+');
	fwrite($handle,$return);
	fclose($handle);
	
	$tmp_zip = tempnam ("tmp", "tempname") . ".zip";
	shell_exec("zip -rv {$tmp_zip} /mnt/stor9-wc2-dfw1/494298/www.oneims.com/web/content/cmsAdmin/backups/{$filename}");
	copy($tmp_zip,$webroot.$filename.'.zip');
	//sleep(20);
	//mail_attachment ('support@oneims.com' , 'dbbackup@oneims.info', 'DB Backup', 'Backup: OneIms DB', $webroot.$filename.'.zip');
}
?>
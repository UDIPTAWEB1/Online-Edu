<?php include('connect.php');?>
<?php include('u_session.php');?>
<?php
	function safe_valu($vkeyname)
	{
		if (isset($_GET[$vkeyname])) { return $_GET[$vkeyname]; }
		if (isset($_POST[$vkeyname])) { return $_POST[$vkeyname]; }
		return "";
	}
	
	function rand_numb()
	{
		$o = "";
		for ($x = 0; $x < 6; $x += 1) { $o .= rand(0, 9); }
		return $o;
	}
	
	function remo_file($pathname)
	{
		if (!is_file($pathname)) { return 0; }
		$fmodtime = filectime($pathname);
		$lastfmod = intval((time() - $fmodtime) / (60 * 60));
		if ($lastfmod >= 48) { unlink($pathname); return 1; }
		return 0;
	}
	
	date_default_timezone_set(date_default_timezone_get());
	srand(microtime() * 1000000);
	$WEB_EOL = "<br/>";
	$writedir = "documents/";
	
	$scptmode = safe_valu("mode");
	$pinncode = preg_replace("/[^0-9]/i", "", safe_valu("pinc"));
	$password = safe_valu("pass");
	$aeskhash = hash("SHA256", $password, true);
	
	if ($scptmode == "e")
	{
		$aesinitv = openssl_random_pseudo_bytes(16);
		if (($_FILES["file"]["error"] < 1) && ($_FILES["file"]["size"] < 4096000))
		{
			while (1)
			{
				$pinncode = rand_numb();
				$filename = ($writedir.$pinncode);
				mysqli_query($con,"INSERT INTO `file` (`fname`,`fpath`) VALUES ('$pinncode', '$filename')");
				if (!file_exists($filename)) { break; }
				if (remo_file($filename) == 1) { break; }
			}
			$fsrcobjc = fopen($_FILES["file"]["tmp_name"], "rb");
			$fdstobjc = fopen($filename, "wb");
			if (($fsrcobjc !== false) && ($fdstobjc !== false))
			{
				fwrite($fdstobjc, "".$_FILES["file"]["name"].""); # filename as string (unknown length)
				fwrite($fdstobjc, "\1"); # non-printable separator (1 byte)
				fwrite($fdstobjc, "".$_FILES["file"]["size"].""); # filesize in bytes (unknown length)
				fwrite($fdstobjc, "\1"); # non-printable separator (1 byte)
				$emessage = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $aeskhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
				fwrite($fdstobjc, $emessage); # encrypted magic string (16 bytes)
				fwrite($fdstobjc, $aesinitv); # initialization vector (16 bytes)
				while (!feof($fsrcobjc))
				{
					$fsrcdata = fread($fsrcobjc, 16);
					$emessage = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $aeskhash, $fsrcdata, MCRYPT_MODE_CBC, $aesinitv);
					fwrite($fdstobjc, $emessage);
					$aesinitv = $emessage;
				}
				fclose($fdstobjc);
				fclose($fsrcobjc);
				chmod($filename, 0770);
			}
		}
	}
	
	if ($scptmode == "d")
	{
		$filelist = scandir($writedir);
		foreach ($filelist as $fileitem)
		{
			$itemname = ($writedir."/".$fileitem);
			if (remo_file($itemname) == 1) { continue; }
			if ($fileitem != $pinncode) { continue; }
			$fsrcobjc = fopen($itemname, "rb");
			if ($fsrcobjc !== false)
			{
				$filename = ""; $filechar = "";
				while ($filechar != "\1") { $filename .= $filechar; $filechar = fread($fsrcobjc, 1); }
				$filesize = ""; $filechar = "";
				while ($filechar != "\1") { $filesize .= $filechar; $filechar = fread($fsrcobjc, 1); }
				$filesize = intval($filesize);
				$magicode = fread($fsrcobjc, 16);
				$aesinitv = fread($fsrcobjc, 16);
				$dmessage = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $aeskhash, $magicode, MCRYPT_MODE_CBC, $aesinitv);
				if (rtrim($dmessage) == "magicstring")
				{
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename="'.$filename.'"');
					header('Content-Length: '.$filesize);
					$tempinit = $aesinitv;
					while ($filesize > 0)
					{
						$aesinitv = $tempinit;
						$fsrcdata = fread($fsrcobjc, 16);
						$tempinit = $fsrcdata;
						$dmessage = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $aeskhash, $fsrcdata, MCRYPT_MODE_CBC, $aesinitv);
						$templeng = 16; if ($filesize < 16) { $templeng = $filesize; }
						print(substr($dmessage, 0, $templeng));
						$filesize -= 16;
					}
					fclose($fsrcobjc);
					exit(0);
				}
				fclose($fsrcobjc);
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$did=$_GET['did'];
$src=mysqli_query($con,"SELECT * FROM `document` WHERE `did`='$did'");
$row=mysqli_fetch_array($src);
?>
<form method="post" action="user_download.php">
            
				<input type="hidden" name="mode" value="d" />
				<table class="minwide bubble blue" id="download">
					<tr>
						<td colspan="3">
							<center><b>Download A File</b></center>
						</td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td align="right" style="width:1%;">
							<label for="pinc">File Name:</label>
						</td>
						<td align="left">
							<input type="text" name="pinc" size="8" value="<?php echo $row['filename'] ; ?>" />
						</td>
						<td align="left" style="width:1%;">&nbsp;
							
						</td>
					</tr>
					<tr>
						<td align="right" style="width:1%;">
							<label for="pass">Password:</label>
						</td>
						<td align="left">
							<input type="password" name="pass" style="width:100%;" />
						</td>
						<td align="left" style="width:1%;">
							<input type="submit" name="submit" value="Download" onclick="dcolse()" />
						</td>
					</tr>
				</table>
			</form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

<table width="480" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#f5f5f5" style="border:8px solid #000000; padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:22px; border-radius:0.5em;">
  <tr>
   <td colspan="3" align="center" style="height:10px; line-height:10px; font-size:1px;">&nbsp;</td>
  </tr> 

  <tr>
    <td colspan="3" bgcolor="#000000" height="50" align="center" valign="middle" style="color:#FFF; font-size:21px; text-decoration:none">Trabalhe Conosco</td>
  </tr>
  
  <tr>
   <td colspan="3" align="center" style="height:10px; line-height:10px; font-size:1px;">&nbsp;</td>
  </tr> 

  <tr>
    <td width="200" valign="top"><b>Nome:</b></td>
    <td width="8">&nbsp;</td>
    <td width="272" valign="top"><?php echo $nome ?></td>
  </tr>

  <tr>
    <td width="200" valign="top"><b>Email:</b></td>
    <td width="8">&nbsp;</td>
    <td width="272" valign="top"><?php echo $email ?></td>
  </tr>

  <tr>
    <td width="200" valign="top"><b>Cargo:</b></td>
    <td width="8">&nbsp;</td>
    <td width="272" valign="top"><a href="<?php echo get_edit_post_link($cargo) ?>" target="_blank"><?php echo get_the_title( $cargo ) ?></a></td>
  </tr>

  <tr>
    <td width="200" valign="top"><b>Link Currículo:</b></td>
    <td width="8">&nbsp;</td>
    <td width="272" valign="top"><a href="<?php echo $file ?>"><?php echo $file ?></a></td>
  </tr>
  
  <tr>
   <td colspan="3" align="center" style="height:20px; line-height:20px; font-size:1px;">&nbsp;</td>
  </tr> 
  
  <tr>
    <td bgcolor="#000000" height="50" colspan="3" valign="middle" align="center"><a href="<?php echo site_url(); ?>" style="color:#FFF; font-size:26px; text-decoration:none"><?php echo wp_title() ?></a></td>
  </tr>

</table>

</body>
</html>
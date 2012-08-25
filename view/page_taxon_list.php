
<html>
<head>

<script language ="javascript">
function post_value(){
opener.document.frm_determination.Publication.value = document.frm.c_name.value;
self.close();
}
</script>

<title>Taxon List</title>
</head>


<body>

<form name="frm" method=post action=''>
<table border=0 cellpadding=0 cellspacing=0 width=250>


<tr><td align="center">Family Name<input type="text" name="c_name" size=12 value=test> <input type=button value='Submit' onclick="post_value();">
</td></tr>
</table></form>

var xmlhttp = createRequestObject();
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}


function DinamisTable(combobox,id)
{
    var kode = combobox.value;
	var id = id.value;
	var table = document.getElementById('table_'+id).name;
        var id_table = document.getElementById('table_'+id).id;
	//alert(id_table);


	if (!kode) return;
    xmlhttp.open('get', 'load_data.php?kode='+kode+'&table='+table+'&id_table='+id_table, true); //panggil file get field.php
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("fieldSelect_"+id).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}


function DinamisField(combobox,id)
{
    var kode = combobox.value;
	var id = id.value;
        var field = document.getElementById('fieldSelect_'+id).name;
        var id_field = document.getElementById('fieldSelect_'+id).id;
	//alert(kode);
	if (!kode) return;
    	xmlhttp.open('get', 'controller/function_select.php?kode='+kode+'&field='+field+'&id_field='+id_field, true);
	xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("compareSelect_"+id).innerHTML = xmlhttp.responseText;

        }
        return false;
    }
    xmlhttp.send(null);
}


function DinamisCompare(combobox,id)
{
    var kode = combobox.value;
	var id = id.value;
		var table = document.getElementById('table_'+id).value;
		var field = document.getElementById('fieldSelect_'+id).value;
                var compare = document.getElementById('compareSelect_'+id).name;
                var id_compare = document.getElementById('compareSelect_'+id).id;


	//alert (compare);
    if (!kode) return;
    xmlhttp.open('get', 'controller/function_select.php?kode='+kode+'&table='+table+'&field='+field+'&compare='+compare+'&id_compare='+id_compare, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("dataSelect_"+id).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function DinamisData(combobox,id)
{
    var data = combobox.value;
	var id = id.value;
		var table = document.getElementById('table_'+id).value;
		var field = document.getElementById('fieldSelect_'+id).value;
		var compare = document.getElementById('compareSelect_'+id).value;
		var data_nama = document.getElementById('dataSelect_'+id).nama;
                var id_data = document.getElementById('dataSelect_'+id).id;
	//alert(data);
	if (!data) return;
	xmlhttp.open('get', 'controller/function_select.php?data='+data+'&table='+table+'&field='+field+'&compare='+compare+'&id_data='+id_data, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("dataAwal").innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);

}

function DinamisFamily(combobox)
{
    var kode = combobox.value;
	//var id = id.value;
        var family = document.getElementById('family').name;

	alert(kode);

	if (!kode) return;
    xmlhttp.open('get', 'controller/function_select.php?kode='+kode+'&family='+family, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("genus").innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function DinamisGenus(combobox)
{
    var kode = combobox.value;
	//var id = id.value;
        var family = document.getElementById('family').name;
	var genus = document.getElementById('genus').name;
	alert(kode);

	if (!kode) return;
    xmlhttp.open('get', 'controller/function_select.php?kode='+kode+'&family='+family+'&genus='+genus, true); //panggil file get field.php
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("species").innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function DinamisSpecies(combobox)
{
    var kode = combobox.value;
	//var id = id.value;
        var family = document.getElementById('family').name;
	var genus = document.getElementById('genus').name;
        var species = document.getElementById('species').name;
	alert(kode);

	if (!kode) return;
    xmlhttp.open('get', 'controller/function_select.php?kode='+kode+'&family='+family+'&genus='+genus+'&species='+species, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("author").innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function addRecord(combobox)
{
    var add = combobox.value;
	//var id = id.value;

	alert(add);

	document.getElementByID("tes");//.innerHTML= add;

	if (!add) return;

}

function cekData()
{
//var specimen_id = specimen_identifier.value;

if (!cek(document.specimen.specimen_identifier.value)){
alert("data masih kosong, silahkan diisi dulu");
window.location.href="../index.php?page=specimen";
}

}

function cek(teks)
{
return(teks.length>0);
}
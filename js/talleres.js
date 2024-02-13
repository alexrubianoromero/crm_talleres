function verTalleres()
{
    // alert('ver talleres');
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_crm_resultados").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=showClients"
    );
}
function nuevoSeguimiento(idTaller)
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalSeguimiento").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=newFollow"
            +"&idTaller="+idTaller  
    );

}

function seguimientos(){

}
function preguntarNuevo()
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=askNew"
    );
}

function grabarInfoTaller()
{
      var validacion = validarInfo();
      if(validacion){
        var nombre = document.getElementById("txtNombre").value ;
        var telefono = document.getElementById("txtTelefono").value ;
        var direccion = document.getElementById("txtDireccion").value ;
        var dueno = document.getElementById("txtDueno").value ;
        var contacto = document.getElementById("txtContacto").value ;
        var tipo = document.getElementById("txtTipo").value ;
        var ciudad = document.getElementById("txtCiudad").value ;
        var idSectorNegocio = document.getElementById("idSectorNegocioValue").value ;
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("option=saveClient"
                +"&nombre="+nombre  
                +"&telefono="+telefono  
                +"&direccion="+direccion  
                +"&dueno="+dueno  
                +"&contacto="+contacto  
                +"&tipo="+tipo  
                +"&ciudad="+ciudad  
                +"&idSectorNegocio="+idSectorNegocio  
            );
  }
}

function validarInfo()
{
   if($("#txtNombre").val() == '')
   {
    alert('Digitar el nombre');
    $("#txtNombre").focus();
    return 0;
   }

   if($("#txtTelefono").val() == '')
   {
    alert('Digitar el telefono');
    $("#txtTelefono").focus();
    return 0;
   }

   if($("#txtDireccion").val() == '')
   {
    alert('Digitar el direccion');
    $("#txtDireccion").focus();
    return 0;
   }

   if($("#txtContacto").val() == '')
   {
    alert('Digitar el Contacto');
    $("#txtContacto").focus();
    return 0;
   }
   if($("#idSectorNegocioValue").val() == '-1')
   {
    alert('Escoja el sector ');
    $("#idSectorNegocioValue").focus();
    return 0;
   }
   if($("#txtTipo").val() == '')
   {
    alert('Digitar el Tipo');
    $("#txtTipo").focus();
    return 0;
   }

   return 1;

}


function grabarSeguimiento(idTaller)
{
    var valida = validarInfoSeguimiento();
    if(valida){
        var seguimiento = document.getElementById("txtSeguimiento").value ;
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("cuerpoModalSeguimiento").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("option=saveFollow"
                +"&idTaller="+idTaller  
                +"&seguimiento="+seguimiento  
            );
    }    
}

function validarInfoSeguimiento()
{
    if($("#txtSeguimiento").val() == '')
   {
    alert('Digitar Seguimiento');
    $("#txtSeguimiento").focus();
    return 0;
   }

   return 1;
} 
function pantallaSeguimientos(idTaller)
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalSeguimiento").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=showFollows"
            +"&idTaller="+idTaller  
        );
}
function showInfoCLiente(idTaller)
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalInfoCliente").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=showInfoClient"
            +"&idTaller="+idTaller  
            );
    }
    
    function showClientsFilter()
    {
        var ciudad = document.getElementById("idCiudad").value ;
        // alert(ciudad);
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_crm_resultados").innerHTML = this.responseText;
            }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
        "option=showClientsFilter"
        +"&ciudad="+ciudad  
        );
    }
    
    
function actualizarInfoTaller()
{
    var idTaller = document.getElementById("idTaller").value ;
    var nombre = document.getElementById("txtNombre").value ;
    var telefono = document.getElementById("txtTelefono").value ;
    var direccion = document.getElementById("txtDireccion").value ;
    var dueno = document.getElementById("txtDueno").value ;
    var contacto = document.getElementById("txtContacto").value ;
    var tipo = document.getElementById("txtTipo").value ;
    var ciudad = document.getElementById("txtCiudad").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send(
            "option=actualizarTaller"
            +"&idTaller="+idTaller  
            +"&nombre="+nombre  
            +"&telefono="+telefono  
            +"&direccion="+direccion  
            +"&dueno="+dueno  
            +"&contacto="+contacto  
            +"&tipo="+tipo  
            +"&ciudad="+ciudad  
            );
            
        }
function verificarCredenciales()
{
    var user = document.getElementById("user").value ;
    var password = document.getElementById("password").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_logueo_inicial").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
    "option=verificarCredenciales"
    +"&user="+user  
    +"&password="+password  
    );
}
function buscarTallerPorNombre()
{
    var nombre = document.getElementById("nombreABuscarDueno").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_crm_resultados").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
    "option=buscarTallerPorNombre"
    +"&nombre="+nombre  
    );
}
function buscarTallerPorNombreContacto()
{
    var nombre = document.getElementById("nombreABuscarContacto").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_crm_resultados").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
    "option=buscarTallerPorNombreContacto"
    +"&nombre="+nombre  
    );
}
function buscarTallerPorNombreTaller()
{
    var nombre = document.getElementById("nombreABuscarTaller").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_crm_resultados").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
    "option=buscarTallerPorNombreTaller"
    +"&nombre="+nombre  
    );
}
function buscarSectorNegocio()
{
    var idSector = document.getElementById("idSectorNegocio").value ;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("div_crm_resultados").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(
    "option=buscarSectorNegocio"
    +"&idSector="+idSector  
    );
}
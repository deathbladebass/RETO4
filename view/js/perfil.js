$(document).on("ready", function () {
    var input = "";
    var savedFileBase64;
    var filename = "";
    var id = localStorage.getItem("PHPSESSID");

    $.ajax({
        method: "get",
        url: "http://uno.fpz1920.com/Reto4/controller/cUsuarioInfo.php",
        dataType: "JSON",
        data: { "PHPSESSID": id },
        success: function (result) {
            console.log(result);
            $("body").append(
                /*html*/ `
                <!-- Modal -->
                <div id="modalEditar" class="modal">
                    <div class="modal-content">
                        <h4>Editar Usuario</h4>
                        Nombre:<input type="text" id="editNombre" class="editInput" value="${result[0].nombre}"><br/><br/>
                        apellido: <input type="text" id="editApellido" class="editInput" value="${result[0].apellido}"><br/><br/>
                        nickname: <input type="text" id="editNick" class="editInput" value="${localStorage.getItem("usuario")}"><br/><br/>
                        <img id="cartelUpdate" src="" alt="">
			            <input type="file" id="fitxUpdate" /><br/>
		                </label> <button class="btn btn-primary" type="button" id="uploadUpdate">Preview</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="save" class="btn btn-primary">Save changes</button>
                    </div>
                </div>`
            )
            $('body >   .container').append(
               /*html*/ `
   <div class="row">
   <div class="col s9 m6">
     <div class="card">
       <div class="card-image">
         <img id="fotoPerfil" src="http://uno.fpz1920.com/Reto4/imagenes/${result[0].imagen}">
       </div>
       <div class="card-content">
         <ul><li><span>Usuario: ${result[0].nombre} "${localStorage.getItem("usuario")}" ${result[0].apellido}</span></li>
         <br/>  
         <li><span>Email:${result[0].email}</span></li></ul>
       </div>
       <div class="card-action">
         <a class="blue darken-4 btn modal-trigger" href="#modalEditar">Editar Usuario</a>
       </div>
     </div>
   </div>
 </div>`
            );
            //Hace que el dropdown de opciones se despliegue
            document.addEventListener('DOMContentLoaded', function () {
                var elems = document.querySelectorAll('.dropdown-trigger');
                var instances = M.Dropdown.init(elems, options);
            });
            // Or with jQuery
            $('.dropdown-trigger').dropdown();

            $('.modal').modal();


            
            $(".editInput").on("click", function () {

                if ($(this).val() != "") {
                    input = $(this).val();
                };
                console.log(input);
            })
            $(".editInput").on("blur", function () {
                if ($(this).val() == "") {
                    $(this).val(input);
                }
                console.log($(this).val());
            });
            $("#fitxUpdate").change(function () {

                let file = $("#fitxUpdate").prop("files")[0];
                filename = file.name.toLowerCase();
                console.log(filename);

                if (!new RegExp("(.*?).(jpg|jpeg|png|gif)$").test(filename)) {
                    alert("Solo se aceptan imágenes JPG, PNG y GIF");
                }
                let reader = new FileReader();

                reader.onload = function (e) {

                    let fileBase64 = e.target.result;
                    console.log(fileBase64);
                    // Almacenar en variable global para uso posterior
                    savedFileBase64 = fileBase64;
                };
                reader.readAsDataURL(file);

            });
            $("#uploadUpdate").click(function () {
                // Código para previsualizar
                $("#cartelUpdate").attr("src", savedFileBase64);
            });
            $("#save").on("click", function () {
                nombre = $("#editNombre").val();
                nick = $("#editNick").val();
                apellido = $("#editApellido").val();


                $.ajax({
                    type: "Post",
                    url: "http://uno.fpz1920.com/Reto4/controller/cEditUsuario.php",
                    data: { "nombre": nombre, "apellido": apellido, "nickname": nick, "idUsuario": result[0].idUsuario, "imagen": filename, 'savedFileBase64': savedFileBase64 },
                    success: function () {
                        location.reload();
                    }, error: function (xhr) {
                        alert("An error occured: " + xhr.status + " " + xhr.statusText);
                    }
                });
            });
        }, error: function (xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });

});
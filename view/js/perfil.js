$(document).on("ready", function () {
    var input = "";
    var savedFileBase64;
    var filename="";

    $.ajax({
        method: "get",
        url: "../controller/cUsuarioInfo.php",
        dataType: "json",

        success: function (result) {
            console.log(result);
            $("body").append(
                /*html*/ `
                <!-- Modal -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Editar Usuario</h4>
                        Nombre:<input type="text" id="editNombre" class="editInput" value="${result.nombre}"><br/><br/>
                        apellido: <input type="text" id="editApellido" class="editInput" value="${result.apellido}"><br/><br/>
                        nickname: <input type="text" id="editNick" class="editInput" value="${result.usuario}"><br/><br/>
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
         <img src="img/${result.imagen}">
       </div>
       <div class="card-content">
         <ul><li><span>Usuario: ${result.nombre} "${result.usuario}" ${result.apellido}</span></li>
         <br/>  
         <li><span>Email:${result.email}</span></li></ul>
       </div>
       <div class="card-action">
         <a class="blue darken-4 btn modal-trigger" href="#modal1">Editar Usuario</a>
       </div>
     </div>
   </div>
 </div>`
            );
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
                    url: "../controller/cEditUsuario.php",
                    dataType: "text",
                    data: { "nombre": nombre, "apellido": apellido, "nickname": nick, "idUsuario": result.idUsuario ,"imagen":filename, 'savedFileBase64': savedFileBase64},
                    success: function (result) {
                        console.log(result);
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
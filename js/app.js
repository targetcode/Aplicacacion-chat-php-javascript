let nombre = document.getElementById('nombre');
let email = document.getElementById('email');
let avatar = document.getElementById('avatar');

let btnSub = document.querySelector("#btnSub");

if (btnSub) {

	eventListenet();

	function eventListenet() {

		btnSub.addEventListener("click", loginApp);

		document.addEventListener('DOMContentLoaded', load);
	}

	function load() {
		var elems = document.querySelectorAll('select');
		var instances = M.FormSelect.init(elems);
	}

	//Validar campos del dormulario
	function loginApp(e) {

		e.preventDefault();

		//Validar nombre
		if (nombre.value != '') {

			var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

			if (!expresion.test(nombre.value)) {

				M.toast({
					html: 'No se permiten caráteres especiales!'
				})

				return false;
			}
		} else {
			M.toast({
				html: 'Ingrese un nombre!'
			})
			return false;
		}

		//Validar email
		if (email.value != '') {

			var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

			if (!expresion.test(email.value)) {

				M.toast({
					html: 'Por favor ingrese un email válido!'
				})

				return false;
			}
		} else {
			M.toast({
				html: 'Ingrese un email!'
			})
			return false;
		}

		//Generamos ajax para ingresar 
		var ajax = new XMLHttpRequest();
		var method = "POST";
		var URL = "ajax/users.php";
		ajax.onreadystatechange = function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
				var response = ajax.responseText;

				if (response == 'ok') {

					window.location.reload();
				} else if (response == 'error') {

					M.toast({
						html: 'Error no se puedo ingresar al chat!'
					})
				}
			}
		};
		ajax.open(method, URL, true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.send("nombre=" + nombre.value + "& email=" + email.value + "& avatar=" + avatar.value);


	}
}

/*=================================================
=            ENVIAR MENSAJE A FIREBASE            =
=================================================*/

var enviarMensaje = document.getElementById('enviarMensaje').addEventListener('click', function() {
	let userid = document.getElementById('userid').value;
	let nombre_user = document.getElementById('nombre_user').value;
	let avatar_user = document.getElementById('avatar_user').value;
	let fecha = document.getElementById('fecha').value;
	let mensaje = document.getElementById('mensaje').value;

	var databaseNameUser = firebase.database().ref('users/messages');

	var newMessageRef = databaseNameUser.push();

	newMessageRef.set({
			"userid": userid,
			"name": nombre_user,
			"avatar": avatar_user,
			"mensagge": mensaje,
			"date": fecha
		})
		.then(function() {
			M.toast({
				html: 'Mensaje enviado!'
			})

		})
		.catch(function(error) {
			M.toast({
				html: 'El mensaje no se puedo enviar!'
			})

		});

	// prevent form from submitting
	document.getElementById('formchat').reset();
	return false;

})


//CARGAR LOS MENSAJES 
firebase.database().ref("users/messages").on("child_added", function(tc_data) {
	// console.log("tc_data", tc_data.val());
	var html = "";

	html = ` <div id='message-${tc_data.key}' class="mensagge-user">
			<ul>
                <li>
                  <img src="../images/avatar/${tc_data.val().avatar}" width="50">
                  <span class="title-user">${tc_data.val().name}: <time>${tc_data.val().date}</time></span>
                </li>
                <li id="mensagge">
                    <p>${tc_data.val().mensagge}</p>
                </li>`;

	if (tc_data.val().userid == document.getElementById('userid').value) {
		html += "<li><button data-id='" + tc_data.key + "' onclick='deleteMessage(this);' class='btn red'>";
		html += "Eliminar";
		html += "</button></li>";
	}

	html += '</ul> </div>';

	document.getElementById("mensagges_all").innerHTML += html;
});

//FUNCION PARA ELIMINAR EL MENSAJE SEGÚN LA ID
function deleteMessage(self) {
	// get message ID
	var messageId = self.getAttribute("data-id");

	// delete message
	firebase.database().ref("users/messages").child(messageId).remove();
}

// attach listener for delete message
firebase.database().ref("users/messages").on("child_removed", function(tc_data) {
	// remove message node
	document.getElementById("message-" + tc_data.key).innerHTML = "Este mensaje fue eliminado";
});
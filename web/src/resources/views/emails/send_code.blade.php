<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>SIGA UC</title>
	</head>
	<body>
		<div style="width: 100%">
			<div style="width: 100%; margin:0 auto;">
<!--				<img src="{{ env('APP_URL') }}/assets/img/logo-uc-azul.png" style="width:200px"> -->
						<img src="https://intranet.college.uc.cl/assets/img/logo-uc-2.gif" style="width:200px">



			</div>

			<div>
				<h3 class="mt-3">Inicio de sesión en SIGA UC.</h3>

				<p>
					Este es su código de acceso para ingresar a SIGA UC. Introdúzcalo en la ventana del navegador para iniciar sesión en la plataforma.
				</p>


				<div style="background: #f0f0f0; width:150px;font-size:150%;padding: 1.5em;font-weight: bold; letter-spacing: 2px;">
					{{ $user->auth_two_factor }}
				</div>

				<p>
					Si usted no ha solicitado este código, hacer caso omiso de este mensaje.
				</p>


				<p>
					Enviado de forma automática por SIGA UC.
				</p>
			</div>
		</div>
	</body>
</html>
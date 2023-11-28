
<?php

if(!isset($_SESSION['user_id'])) Core::redir("./");



if(isset($_GET["opt"]) && $_GET["opt"] == "all"){
	$listaUsuarios = UserData::getUsersbyKind();

	
?>
<div class="content-inner container-fluid pb-0" id="page_layout">
	<div class="d-flex justify-content-between align-items-center">
		<div class="d-flex flex-column">
			<h3>Usuarios</h3>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-primary pull-right" href="./?view=users&opt=add"><i class="bi-persons"> </i>
			 Nuevo</a>

			 <a class="btn btn-danger pull-right mx-2" href="./?view=users&opt=delete"><i class="bi-persons"> </i>
                    Eliminar</a>

		</div>
		<?php
			if(count($listaUsuarios)>0){
		?>
			<div class="bd-example table-responsive">
		        <table class="table table-striped">
		            <thead>
		            <tr>
		                <th scope="col">#</th>
		                <th scope="col">Nombre</th>
		                <th scope="col">Username</th>
		                <th scope="col">Email</th>
		            </tr>
		            </thead>
		            <tbody>
		            <?php
		            	foreach ($listaUsuarios as $key => $row) {
		            ?>
		            		<tr>
		            			<td><?php echo $row->id; ?></td>
		            			<td><?php echo $row->nombre; ?></td>
		            			<td><?php echo $row->username; ?></td>
		            			<td><?php echo $row->email; ?></td>
		            		</tr>

		            <?php
		            	}

		            ?>	
		            
		            </tbody>
		        </table>
		    </div>
    
			<?php

		}else{
			?>
				<div class="alert alert-warning d-flex align-items-center" role="alert">
		            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
		                <use xlink:href="#exclamation-triangle-fill" />
		            </svg>
		            <div>
		                Sin registros !!
		            </div>
		        </div>
			<?php

		}
		?>



	</div>


</div>

<?php

}elseif(isset($_GET["opt"]) && $_GET["opt"] == "add"){
?>
<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="col-xl-12 col-lg-12">
   <div class="card">
      <div class="card-header d-flex justify-content-between">
         <div class="header-title">
            <h4 class="card-title">Nuevo usuario </h4>
         </div>
      </div>
      <div class="card-body">
         <div class="new-user-info">
            <form method="post" action="./?action=users&opt=add">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label" for="fname">Nombre:</label>
                     <input type="text" class="form-control" name="nombre" id="fname" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="lname">Last Name:</label>
                     <input type="text" class="form-control" id="lname"  name="apellido" placeholder="Last Name">
                  </div>
                  
                  <div class="form-group col-md-12">
                     <label class="form-label" for="email">Email:</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                  
               </div>
               <hr>
               <h5 class="mb-3">Security</h5>
               <div class="row">
                  <div class="form-group col-md-12">
                     <label class="form-label" for="uname">User Name:</label>
                     <input type="text" class="form-control" id="uname" name="username" placeholder="User Name">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="pass">Password:</label>
                     <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label" for="rpass">Repeat Password:</label>
                     <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                  </div>
               </div>
               
               <button type="submit" class="btn btn-primary">Agregar usuario</button>
            </form>
         </div>
      </div>
   </div>
</div>
</div>

<?php

}elseif(isset($_GET["opt"]) && $_GET["opt"] == "delete"){
?>


    <!-- Agrega esta sección para mostrar la lista de usuarios -->
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Eliminar usuarios</h4>
                </div>
            </div>
            <div class="card-body">
                <form id="deleteForm" method="post" action="./?action=users&opt=delete" onsubmit="return confirmDelete();">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Reemplaza esta parte con tu lógica para obtener la lista de usuarios desde la base de datos
                            $listaUsuarios = UserData::getUsersbyKind();

                            if (count($listaUsuarios) > 0) {
                                foreach ($listaUsuarios as $user) {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox' name='usuariosEliminar[]' value='{$user->id}'></td>";
                                    echo "<td>{$user->nombre}</td>";
                                    echo "<td>{$user->username}</td>";
                                    echo "<td>{$user->email}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay usuarios para mostrar</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if (count($listaUsuarios) > 0) {
                    ?>
                        <button type="submit" class="btn btn-danger">Eliminar usuarios seleccionados</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            var checkboxes = document.getElementsByName('usuariosEliminar[]');
            var selectedUsers = [];

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedUsers.push(checkboxes[i].value);
                }
            }

            if (selectedUsers.length > 0) {
                var confirmation = confirm("¿Seguro que quieres eliminar al usuario con ID=" + selectedUsers.join(', ') + "?");

                return confirmation;
            } else {
                alert("Por favor, selecciona al menos un usuario para eliminar.");
                return false;
            }
        }
    </script>

    <?php
}
?>
<main class="container mt-5 overflow-hidden">
       <h2 class="titulo-gral">LISTADO DE USUARIOS</h2>
       <section class="mt-5 overflow-auto">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        
                        <th scope="col">Usuario</th>
                       
                        </tr>
                    </thead>
                    
                    <tbody>
<?php foreach($usuarios as $usuario){?>
                        <tr>
                            <th scope="row"><?php echo $usuario['id'];?></th>
                            
                            <td><?php echo $usuario['usuario'];?></td>
                           
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $usuario['id'];?>">Eliminar</a></td>
                            
                        </tr>
<?php }?>
                    </tbody>
            </table>

        </section>

    </main>
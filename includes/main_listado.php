<main class="container mt-5 overflow-hidden">
       <h2 class="titulo-gral mt-5">CONOCE TODOS NUESTROS ORADORES</h2>
       <section class="mt-5 overflow-auto">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tema</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php #leemos proyectos 1 por 1
                        foreach($oradores as $orador){ 
                    ?>
                        <tr>
                            <th scope="row"><?php echo $orador['id_orador'];?></th>
                            <td> <img class="img-fluid img-thumbnail" style="object-fit:cover;" width="150" height="150" src="<?php echo BASE_URL; ?>assets/upload/<?php echo $orador['imagen'];?>" alt="<?php echo $orador['nombre'];?>">  </td>
                            <td><?php echo $orador['nombre'];?></td>
                            <td><?php echo $orador['apellido'];?></td>
                            <td><?php echo $orador['mail'];?></td>
                            <td><?php echo $orador['tema'];?></td>
                        </tr>
                    
                    <?php #leemos proyectos 1 por 1
                      }
                    ?>
                    </tbody>
            </table>

       </section>

    </main>
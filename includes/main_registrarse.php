<main class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <h1 class="text-center">Registrarse</h1>
            <div class="col-6">
                <form action="insertar_usuario.php" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario">
                
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                <input type="hidden" name="origen" value="<?php echo $origen?>">
                    <input type="submit" class="btn btn-success text-center" value="Registrarse">
                    
                </form>
               
            </div>
            
        </div>
</main>
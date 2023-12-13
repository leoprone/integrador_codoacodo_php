<main class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <h2 class="text-center">LogIn</h2>
            <div class="col-6">
                <form action="login.php?variable=si" method="post">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario">
                
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <!-- input que mostrará el origen del envío..........  -->
                    <input type="hidden" name="origen" value="<?php echo $origen?>">
                    
                    <input type="submit" class="btn btn-success text-center" value="LogIn">
                    
                </form>
                <a href="<?php echo BASE_URL; ?>includes/registrarse.php">Si no tenes user, registráte</a>
   
            </div>
            
        </div>
</main>
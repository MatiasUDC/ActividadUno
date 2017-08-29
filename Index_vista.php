
<!DOCTYPE html>
<html>

    <?php require 'Cabecera.php'; ?>
  

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Actividad Uno</a>
            </div>
        </nav>

        <!-- Portfolio Grid Section -->
        <section id="portfolio">
            <div class="container centrar">
                <div class="row">
                    <div>
                        <?php if (!empty(($error))): ?>
                            <div class="alert alert-warning">Se Produjeron Los siguientes errores</div>
                            <?php foreach ($error as $valor): ?>
                                <div class ="alert alert-warning"><?php echo $valor; ?></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h2 class="text-center"><?php echo $resultado["personaje"]; ?></h2>
                            <hr class="star-primary">    
                            <div>
                                <?php if ($resultado["vive"] == 0): ?>
                                    <div class="portfolio-item">
                                        <a class="portfolio-link" href="#portfolioModal5" data-toggle="modal">
                                            <div class="caption">
                                                <div class="caption-content">
                                                    <i class="fa fa-search-plus fa-3x"></i>
                                                </div>
                                            </div>
                                            <img align="center" class="img-fluid" src="img/vivo.jpg" alt="">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($resultado["vive"] == 1): ?>
                                    <div class="portfolio-item" >
                                        <a class="portfolio-link" href="#portfolioModal6" data-toggle="modal">
                                            <div class="caption">
                                                <div class="caption-content">
                                                    <i class="fa fa-search-plus fa-3x"></i>
                                                </div>
                                            </div>
                                            <img class="img-fluid" src="img/muerto.jpg" alt="">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if (empty(($ciudades))): ?>
                                    <div class="alert alert-warning">No hay Cuidades Registradas</div>
                                <?php else: ?>    
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                        <?php foreach ($ciudades as $value): ?>
                                            <option><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>    
                            </div>
                        <?php endif; ?>       
                    </div>

                </div>
            </div>
        </section>
        <?php require 'Footer.php';?>
        
        <?php require 'Modal.php'; ?>





    </body>

</html>
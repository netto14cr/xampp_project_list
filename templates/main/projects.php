
        <!-- Sidebar and Navbar Omitted -->

        <!-- Content Wrapper. Contains page content -->
        
            <br>
            <section class="content">
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of projects</h3>
                        </div>

                        <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Projects</th>
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ruta = "C:/xampp/htdocs";
                                $proyectos = scandir($ruta);
                                $index = 0;
                        
                                foreach ($proyectos as $proyecto) {
                                    // Filtrar directorios no deseados como .github y otros
                                    $excludedDirs = ['.', '..', '.github', 'Xampp'];
                                
                                    if (!in_array($proyecto, $excludedDirs) && is_dir($ruta . "/" . $proyecto)) {
                                        $index++;
                                        // Construir la URL completa del proyecto usando $_SERVER['HTTP_HOST']
                                        $proyectoUrl = "http://" . $_SERVER['HTTP_HOST'] . "/" . $proyecto;
                                        ?>
                                        <tr>
                                            <td style="text-align: center"><?php echo $index; ?></td>
                                                <td style="text-align: left">
                                            <a href="<?php echo $proyectoUrl; ?>" target="_blank"><?php echo ucfirst($proyecto); ?> </a></td>
                                            <td style="text-align: center">
                                            <a href="<?php echo $proyectoUrl; ?>" target="_blank"><i class="fas fa-eye me-1"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        
        <!-- /.content-wrapper -->

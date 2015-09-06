 <div id="menu" class="col-md-3 hidden-sm hidden-xs">
                <a href="#"><img src="Tittle-Categoria.png" class="img-responsive img-thumbnail"></a>
                <div class="list-group">
                    <?php
                    $result = $class->listarCategoriaQTD();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $categoria = $row['nome'];
                        $qtd = $row['qtd'];
                        ?>
                    <a href="ofertascat.php?categoria=<?php echo $id;?>" class="list-group-item"><?php echo $categoria; ?><span class="badge"><?php echo $qtd; ?></span></a>
                    <?php } ?>
                </div>
</div>
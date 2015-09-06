<?php 
                   
                    $classPromocao = new Funcoes();
                    $resu = $classPromocao->listarOferta();


                    while ($row = mysqli_fetch_assoc($resu)) {
                    $id= $row['id'];
                    $id_cliente = $row['id_cliente'];
                    $valorantigo = (float) $row['valorantigo'];
                    $valor = (float) $row['valor'];
                    $desconto = $row['desconto'];
                    $qtd = $row['qtd'];
                    $descricao = $row['descricao'];
                    $promocao = $row['promocao'];
                    $date = new DateTime($row['datainicial']);
                    $datainicial = $date->format('d.m.Y');
                    $date = new DateTime($row['datafinal']);
                    $datafinal = $date->format('d.m.Y');
                    $principal = $row['principal'];
                    $ativo = $row['ativo'];
                    $imagem1 = $row['foto1'];
                    $imagem2 = $row['foto2'];
                    $imagem3 = $row['foto3'];
                    $mapa = $row['mapa'];
                    
                    
                    ?>
                    <div class="col-sm-4 col-lg-4 col-md-4" style="position: relative;  min-height: 1px;  padding-right: 0px; padding-left: 0px;">
                        <div class="thumbnail" style="height: 450px;width: ">
                            <img src="<?php echo'imagem/fotos/'.$imagem1;?>"
                                 alt="" class="img-rounded">
                            <div class="caption">
                                <h4 >
                                    <a href="ofertaexibida.php?oferta=<?php echo $id;?>" style="color: #885521"><?php echo $promocao;?></a>
                                </h4>
                                <p>
                            </div> 
                            <div class="row" style="margin-left: 0px; margin-right: 0px" >
                                <div class="col-xs-6" style="background-color: #e8b530">
                                    <p style="color: #885521;text-align:center;font-size: 11px;height: 10px ;">R$ <?php echo number_format($valorantigo, 2, ',', '.');?></p>
                                    <p style="color: #885521;text-align:center;font-size: 16px;font-weight: bold; ">R$ <?php echo number_format($valor, 2, ',', '.');?></p>
                                </div>
                                <div class="col-xs-6" style="background-color: #885521"> 
                                    <p style="color: #e8b530;text-align:center;font-size: 11px;height: 10px ;">Restam</p>
                                    <p style="color: #e8b530;text-align:center; font-size: 16px;font-weight: bold;"><?php echo $qtd;?></p>
                                </div>

                                <div class="col-xs-6" style="background-color: #885521">
                                    <p style="color: #e8b530;text-align:center;font-size: 11px;height: 10px ;">Desconto de</p>
                                    <p style="color: #e8b530;text-align:center;font-size: 18px;font-weight: bold;"><?php echo $desconto;?>%</p>
                                </div>
                                <div class="col-xs-6" style="background-color: #e8b530"> 
                                    <p style="color: #885521;text-align:center;font-size: 11px;height: 10px ;">Finaliza em </p>
                                    <p style="color: #885521;text-align:center; font-size: 18px;font-weight: bold;">2 dias</p>
                                </div>

                            </div>
                            <p>
                            <div class="row" style="margin-left: 0px; margin-right: 0px;width: auto;">
                                <div class="ratings" style="text-align: center">
                                    <button type="button" class="btn btn-primary" style="width:100%"><?php echo utf8_decode("PEGAR CUPOM GRÁTIS");?></button>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 0px; margin-right: 0px;width: auto;">
                                <p style="text-align: center;font-size: 11px;"><?php echo utf8_decode("Validade até ".$datafinal);?></p>
                            </div>

                        </div>
                    </div>
                    <?php };?>
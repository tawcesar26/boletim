<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>


               
  


            <table class="table table-hover table-bordered  table-striped">

                 <tr>
                    <th colspan="7">Dados do Aluno</th>
                 </tr>

                 <tr>
                      <td colspan="7">  
                    <p> Nome:   </p><br>
                    <p> Curso: </p><br>
                    <p> Email: </p>
                    </tr>
                </td>

                <tr>
                    <th>Disciplina</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Média</th>
                    <th>Situação</th>

                </tr>

                <?php foreach($listaBoletim as $lista){ ?>
                   <tr>   
                    <td><?php echo $lista->nome_disciplina ?></td>
                    <td><?php echo $lista->nota1  ?></td>
                    <td><?php echo $lista->nota2  ?></td>
                    <td><?php echo $lista->nota3  ?></td>
                    <td><?php echo $lista->nota4  ?></td>
                    <td><?php echo $lista->media  ?></td>
                    <td><?php echo ( $lista->media >= 7 ? "Aprovado" : "Reprovado" ); ?></td>
                </tr>  


            <?php } ?>

        </table>

</body>
</html>
           
